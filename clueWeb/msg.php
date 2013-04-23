<?php 
include_once 'functions.php';
session_start();

if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
$user = $_SESSION['user'];

if (isset($_POST['view'])) $view = sanitizeString($_POST['view']);

if (isset($_POST['text']))
{
	$text = sanitizeString($_POST['text']);

	if ($text != "")
		queryMysql("INSERT INTO messages (username1,username2,msg) VALUES ('$user', '$view', '$text')");
	header("Location:main.php?view=$view");
}
	
	echo <<<_END
<form method='post' action='msg.php'><br /><br /><br /><br />
Type here to leave a message:<br /><br />
<textarea name='text' cols='40' rows='3'></textarea><br />
<input type='hidden' name='view' value='$view'/><br /><br />
<input class='ml-button-1' type='submit' value='Post Message' /></form>
_END;

?>