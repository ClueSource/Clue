<?php 
include_once 'functions.php';
session_start();
if (!isset($_SESSION['user']))
	die("<br /><br />You must be logged in to view this page");
$user = $_SESSION['user'];

if (isset($_POST['view']))
	$view = sanitizeString($_POST['view']);

	$query = "SELECT * FROM clueBuddy WHERE username1 = '$view' AND username2 = '$user'";
	$rel = 'friend';
	if (!mysql_num_rows(queryMysql($query)))
	{
		$query = "INSERT INTO clueBuddy (username1,username2,relation) VALUES ('$user', '$view','$rel')";
		queryMysql($query);
		$query = "INSERT INTO messages (username1,username2,msg) VALUES ('$user', '$view','I send a buddy request.Please visit <a href=\"main.php?view=$user\">my page</a> and click Add for being buddies')";
		queryMysql($query);
		
	}
	else {
		
			$query = "UPDATE clueBuddy SET status='1' WHERE username1 = '$view' AND username2 = '$user'";
			queryMysql($query);	
	}
		
	header("Location:main.php?view=$view");	

?>