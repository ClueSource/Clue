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
	
	$user = $_COOKIE['username'];
		$friend = $_POST['devname'];
	$rel = 'device';
	//username checking for device need to be added :D
	
		$query = "INSERT INTO clueBuddy (username1,username2,relation,status) VALUES ('$user', '$friend','$rel','1')";
		mysql_query($query);
		mysql_query("CREATE TABLE $friend (sl INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,latitude VARCHAR(20),longitude VARCHAR(20),altitude VARCHAR(20),speed VARCHAR(20),timeStamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)");
      mysql_query("INSERT INTO current (username, latitude, longitude, altitude, speed) VALUES ('$friend',0,0,0,0)");
 		header("Location:./createXML.php?friend=$user");
	
		
	
	
?>