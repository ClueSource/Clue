<?php 
include_once 'functions.php';
session_start();
$error = $user = $pass = "";

if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	
	if ($user == "" || $pass == "")
	{
		$error = "Not all fields were entered<br />";
		echo $error;
	}
	else
	{
		$query = "SELECT username,password FROM clueUsers
				  WHERE username='$user' AND password='$pass'";

		if (mysql_num_rows(queryMysql($query)) == 0)
		{
			$error = "Username/Password invalid<br />";
			echo $error;
		}
		else
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;	
			$query = "UPDATE clueUsers SET devstatus = '1' WHERE username = '$user'";	
			queryMysql($query);
			header("Location:main.php?view=$user");
		}
	}
}
?>