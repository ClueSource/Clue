
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
    error_reporting(E_ALL);
          
	$username=$_COOKIE['username'];
	$query = "UPDATE clueUsers SET devstatus = '0' WHERE username = '$username'";
	mysql_query($query);
	//$_SESSION=array();
	
	//if (session_id() != "" || isset($_COOKIE[session_name()]))
	  //  setcookie(session_name(), '', time()-2592000, '/');
		
	//session_destroy();
    setcookie($username,'', time()-2592000,'/');          
	
	mysql_close($connection);
	
	header("Location:../index.html");
?>