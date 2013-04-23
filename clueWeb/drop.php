<?php 
include_once 'functions.php';
session_start();
if (!isset($_SESSION['user']))
	die("<br /><br />You must be logged in to view this page");
$user = $_SESSION['user'];

if (isset($_POST['view']))
	$view = sanitizeString($_POST['view']);

		$query = "DELETE FROM clueBuddy WHERE (username1='$user' AND username2='$view') OR (username2='$user' AND username1='$view')";
		queryMysql($query);
		echo "Buddy Dropped";
		$query = "INSERT INTO messages (username1,username2,msg) VALUES ('$user','$view','dropped from buddies')";
		queryMysql($query);
			
		header("Location:main.php?view=$view");
?>