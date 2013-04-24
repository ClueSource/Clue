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
          
          
	
        $user = $_COOKIE['username'];
        $friendid = $_GET['friend'];
        $xml="<clueUsers>\n\t\t";
        $count=1;
        					$followers = array();
							$followers2 = array();
							$query = "SELECT username2 FROM clueBuddy WHERE username1='$user' AND status='1'";
							$result = mysql_query($query);
							$num    = mysql_num_rows($result); 
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$followers[$j] = $row[0];
							}
							$query = "SELECT username1 FROM clueBuddy WHERE username2='$user' AND status='1'";
							$result = mysql_query($query); 
							$num    = mysql_num_rows($result);
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$followers2[$j] = $row[0];
							}	
							if (sizeof($followers))
							{
								
								foreach($followers as $friend)
								{
									$query = "SELECT * FROM clueUsers WHERE username='$friend'";
									$result = mysql_query($query);
									$row = mysql_fetch_row($result);
									$xml .="<user>\n\t\t";
            					$xml .= "<slno>".$count++."</slno>\n\t\t";
            					$xml .= "<username>".$row[0]."</username>\n\t\t";
            					$xml .= "<name>".$row[1]."</name>\n\t\t";
            					$xml .= "<email>".$row[3]."</email>\n\t\t";
            					$xml .= "<phone>".$row[4]."</phone>\n\t\t";
            					$xml.="</user>\n\t";
				
								}			
							
							}
							if (sizeof($followers2))
							{
			
								foreach($followers2 as $friend)
								{
									$query = "SELECT * FROM clueUsers WHERE username='$friend'";
									$result = mysql_query($query);
									$row = mysql_fetch_row($result);
									$xml .="<user>\n\t\t";
            					$xml .= "<slno>".$count++."</slno>\n\t\t";
            					$xml .= "<username>".$row[0]."</username>\n\t\t";
            					$xml .= "<name>".$row[1]."</name>\n\t\t";
            					$xml .= "<email>".$row[3]."</email>\n\t\t";
            					$xml .= "<phone>".$row[4]."</phone>\n\t\t";
            					$xml.="</user>\n\t";
								}			
		
							}
				 
        $xml.="</clueUsers>\n\r";
        $xmlobj=new SimpleXMLElement($xml);
        $xmlobj->asXML($user.".xml");
        //echo 'users.xml created';
         
         
        $xml="<clueUsers>\n\t\t";
        $count=1;
        					$followers = array();
							$followers2 = array();
							$query = "SELECT username2 FROM clueBuddy WHERE username1='$friendid' AND status='1'";
							$result = mysql_query($query);
							$num    = mysql_num_rows($result); 
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$followers[$j] = $row[0];
							}
							$query = "SELECT username1 FROM clueBuddy WHERE username2='$friendid' AND status='1'";
							$result = mysql_query($query); 
							$num    = mysql_num_rows($result);
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$followers2[$j] = $row[0];
							}	
							if (sizeof($followers))
							{
								
								foreach($followers as $friend)
								{
									$query = "SELECT * FROM clueUsers WHERE username='$friend'";
									$result = mysql_query($query);
									$row = mysql_fetch_row($result);
									$xml .="<user>\n\t\t";
            					$xml .= "<slno>".$count++."</slno>\n\t\t";
            					$xml .= "<username>".$row[0]."</username>\n\t\t";
            					$xml .= "<name>".$row[1]."</name>\n\t\t";
            					$xml .= "<email>".$row[3]."</email>\n\t\t";
            					$xml .= "<phone>".$row[4]."</phone>\n\t\t";
            					$xml.="</user>\n\t";
				
								}			
							
							}
							if (sizeof($followers2))
							{
			
								foreach($followers2 as $friend)
								{
									$query = "SELECT * FROM clueUsers WHERE username='$friend'";
									$result = mysql_query($query);
									$row = mysql_fetch_row($result);
									$xml .="<user>\n\t\t";
            					$xml .= "<slno>".$count++."</slno>\n\t\t";
            					$xml .= "<username>".$row[0]."</username>\n\t\t";
            					$xml .= "<name>".$row[1]."</name>\n\t\t";
            					$xml .= "<email>".$row[3]."</email>\n\t\t";
            					$xml .= "<phone>".$row[4]."</phone>\n\t\t";
            					$xml.="</user>\n\t";
								}			
		
							}
				 
        $xml.="</clueUsers>\n\r";
        $xmlobj=new SimpleXMLElement($xml);
        $xmlobj->asXML($friendid.".xml");
        echo $friendid.".xml created"; 
        
        header("Location:./userPage.php");
          ?>


 
<?php
	// 5. Close connection
	mysql_close($connection);
?>