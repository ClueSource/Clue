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
	if(isset($_POST['friend']))
		$friend = $_POST['friend'];
	elseif(isset($_GET['friend']))
		 $friend = $_GET['friend'];
	
	$query = "SELECT * FROM clueBuddy WHERE username1 = '$friend' AND username2 = '$user'";
	$rel = 'friend';
	if (!mysql_num_rows(mysql_query($query)))
	{
		$query = "INSERT INTO clueBuddy (username1,username2,relation) VALUES ('$user', '$friend','$rel')";
		mysql_query($query);
		$query = "INSERT INTO messages (username1,username2,msg) VALUES ('$user', '$friend','I send a friend request.Click <a href=\"./addFriend.php?friend=$user\">Add</a>to accept')";
		mysql_query($query);
		
	}
	else {
		
			$query = "UPDATE clueBuddy SET status='1' WHERE username1 = '$friend' AND username2 = '$user'";
			mysql_query($query);
			header("Location:./createXML.php?friend=$friend");	
	}
	
?>