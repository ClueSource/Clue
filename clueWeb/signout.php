<?php 
include_once 'functions.php';
session_start();
if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	destroySession();
	$query = "UPDATE clueUsers SET devstatus = '0' WHERE username = '$user'";	
	queryMysql($query);
	header("Location:main.php?view=null");
}
else echo "You are not logged in";
?>