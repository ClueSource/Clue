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
         $result = mysql_query("SELECT name FROM  clueUsers where username='$username'");
         $row=mysql_fetch_array($result);
         $pass=$row['name'];
         echo $pass;
        
         
          ?>


 
<?php
	// 5. Close connection
	mysql_close($connection);
?>