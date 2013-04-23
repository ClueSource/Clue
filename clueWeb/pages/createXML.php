<?php
	require_once './databaseConstants.php';

 
	// 1. Create a database connection
	$connection = mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	if (!$connection)
	{
		die("Database connection failed: " . mysql_error());
	}
	
	// 2. Select a database to use 
	$db_select = mysql_select_db(DB_NAME,$connection);
	if (!$db_select)
	{
		die("Database selection failed: " . mysql_error());
	}
?>

          <?php
          
          
	
        
         
        $query=mysql_query("select * from users")or die(mysql_error()); 
        $xml="<clueUsers>\n\t\t";
        $count=1;
        while($data=mysql_fetch_array($query))
        {

            $xml .="<user>\n\t\t";
            $xml .= "<slno>".$count++."</slnof>\n\t\t";
            $xml .= "<username>".$data['username']."</username>\n\t\t";
            $xml .= "<password>".$data['password']."</password>\n\t\t";
            $xml .= "<name>".$data['name']."</name>\n\t\t";
            $xml .= "<email>".$data['email']."</email>\n\t\t";
            $xml.="</user>\n\t";
           
        }
        $xml.="</clueUsers>\n\r";
        $xmlobj=new SimpleXMLElement($xml);
        $xmlobj->asXML("users.xml");
        echo 'users.xml created';
         
          ?>


 
<?php
	// 5. Close connection
	mysql_close($connection);
?>