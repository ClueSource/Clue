<?php

include_once 'functions.php';
session_start();

if (isset($_SESSION['user']))
	$user = $_SESSION['user'];
else 
	die("Cannot show the page");
$users = array();
$query = "SELECT username FROM clueUsers";
$result = queryMysql($query);
$num    = mysql_num_rows($result); 
	for ($j = 0 ; $j < $num ; ++$j)
		{
			$row = mysql_fetch_row($result);
			$users[$j] = $row[0];
		}
		if (sizeof($users))
		{
			echo "<br /><br /><b>Clue Users</b><ul>";
			foreach($users as $friend)
			{
				$query = "SELECT name FROM clueUsers WHERE username='$friend'";
				$result = queryMysql($query);
				$row = mysql_fetch_row($result);
				//if($row[0]) $stat = 'online';
				//else $stat = 'offline';*/
				echo "<li><a href='main.php?view=$friend'>$row[0]</li>";//</a> - - - - - - $stat </li>";
				
			}			
			echo "</ul>";
		}
?>