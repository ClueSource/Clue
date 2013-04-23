<?php //currently msg deletion not performed
include_once 'functions.php';
session_start();
if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
$user = $_SESSION['user'];

	$query = "SELECT username1,msg FROM messages WHERE username2='$user'";
	$result = queryMysql($query);
	$num    = mysql_num_rows($result); 
	if(!$num)
		echo "No new notifications";
	else 
	{
		echo "<ul>";
		for ($j = 0 ; $j < $num ; ++$j)
		{
			$row = mysql_fetch_row($result);
			$query = "SELECT name FROM clueUsers WHERE username='$row[0]'";
			$result2 = queryMysql($query);
			$row1 = mysql_fetch_row($result2);	
			echo "<li><b>$row1[0]</b> : $row[1]</li>";
		}
		echo "</ul>";
}
?>