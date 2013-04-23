<?php

include_once 'functions.php';
session_start();

if (isset($_SESSION['user']))
	$user = $_SESSION['user'];
else 
	die("Cannot show the page");
$followers = array();
$followers2 = array();
$query = "SELECT username2 FROM clueBuddy WHERE username1='$user' AND status='1'";
$result = queryMysql($query);
$num    = mysql_num_rows($result); 
	for ($j = 0 ; $j < $num ; ++$j)
		{
			$row = mysql_fetch_row($result);
			$followers[$j] = $row[0];
		}
$query = "SELECT username1 FROM clueBuddy WHERE username2='$user' AND status='1'";
$result = queryMysql($query);
$num    = mysql_num_rows($result);
for ($j = 0 ; $j < $num ; ++$j)
		{
			$row = mysql_fetch_row($result);
			$followers2[$j] = $row[0];
		}	
		$friends   = FALSE;
		if (sizeof($followers))
		{
			echo "<br /><br /><b>My Buddies</b><ul>";
			foreach($followers as $friend)
			{
				$query = "SELECT name,devstatus FROM clueUsers WHERE username='$friend'";
				$result = queryMysql($query);
				$row = mysql_fetch_row($result);
				if($row[1]) $stat = 'online';
				else $stat = 'offline';
				echo "<li><a href='main.php?view=$friend'>$row[0]</a> - - - - - - $stat </li>";
				
			}			
			echo "</ul>";
			$friends = TRUE;
		}
		if (sizeof($followers2))
		{
			echo "<ul>";
			foreach($followers2 as $friend)
			{
				$query = "SELECT name,devstatus FROM clueUsers WHERE username='$friend'";
				$result = queryMysql($query);
				$row = mysql_fetch_row($result);
				if($row[1]) $stat = 'online';
				else $stat = 'offline';
				echo "<li><a href='main.php?view=$friend'>$row[0]</a> - - - - - - $stat </li>";
				
			}			
			echo "</ul>";
			$friends = TRUE;
		}
		if(!$friends) {
			echo "No Buddies yet";
		}
?>