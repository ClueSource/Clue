<?php 
include_once 'functions.php';
session_start();
if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
//$user = $_SESSION['user'];
$view= $_POST['view'];

	$query = "SELECT * FROM clueUsers WHERE username='$view'";
	$result = queryMysql($query);
	$row  = mysql_fetch_row($result);
	$name = $row[1];
	$email = $row[3];
	$phone= $row[4];
	$interest = $row[5];
	//$val = $row[8];
	
echo <<<_END
	<table>
		<tr><td>Name</td><td>$name</td></tr>
		<tr><td>Interests</td><td>$interest</td></tr>
		<tr><td>Email</td><td>$email</td></tr>
		<tr><td>Phone</td><td>$phone</td></tr>
	</table>
_END;

?>