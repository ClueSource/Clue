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
          
          
	 $username=$_POST['user'];
         $password=$_POST['pass'];
         //echo ("Hello". $username.$password);
         if($username==null ||$password==null)
             echo 0;
         else
         {   
         $result = mysql_query("SELECT password FROM  clueUsers where username='$username'");
            
         $row=mysql_fetch_array($result);
         $pass=$row['password'];
         
         if(strcmp($pass,$password)==0)
			{                 
				echo 1;
				$result = mysql_query("UPDATE clueUsers set devstatus='1' where  username='$username'" );
			}
         else 
                 echo 0;
         }
         
          ?>


 
<?php
	// 5. Close connection
	mysql_close($connection);
?>