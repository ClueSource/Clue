<?php 
include_once 'functions.php';
session_start();

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$query = "SELECT name FROM clueUsers WHERE username='$user'";
	$result = queryMysql($query);
	$row = mysql_fetch_row($result);
	$Name = $row[0];
	$loggedin = TRUE;
	$view = $_GET['view'];
	if($view!=$user){
		$users = array();
		$query = "SELECT * FROM clueBuddy WHERE username1='$user' AND username2='$view' AND status='1'";
		$result = queryMysql($query);
		$num    = mysql_num_rows($result);
		if(!$num) {
			$query = "SELECT * FROM clueBuddy WHERE username2='$user' AND username1='$view' AND status='1'";
			$result = queryMysql($query);
			$num    = mysql_num_rows($result);
		}
		$query = "SELECT name FROM clueUsers WHERE username='$view'";
		$result = queryMysql($query);
		$row = mysql_fetch_row($result);
		$viewName = $row[0]; 
	}
	else
	{
		 $num=1; 
		 $viewName = $Name;
	}
}
else $loggedin = FALSE;

echo <<<_END
<!DOCTYPE html>
<html>
	<head>
		<title>CLUE!</title>
		<link rel="stylesheet" href="mycss.css" />
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHpXdaW3PD8c8O-yjsdZOp--2qboz7OQY&sensor=false"></script>
		<script src="myjs.js" ></script>
	</head>
_END;
if($loggedin && $num) 
	echo "<body id='cluebody' onload='init(\"$view\")'>";
else 
	echo "<body id='cluebody' >";
echo <<<_END
		<div id="container">
			<div id="mainheader">
				<div id="title">
					CLUE!
					<p style="font-size: medium " >GPS Services with IOT</p>			
				</div>
				<div id="reg_prof_ajax">
_END;
if($loggedin) 
{
	echo "Welcome <a href='main.php?view=$user'>$Name</a><br /><br />";
	echo	"<button class='ml-button-1' onclick='signout()'>Sign Out</button>";
	echo "&nbsp;<button class='ml-button-1' onclick='profileajax()'>Profile</button>";
	//echo "<a href='signout.php' class='ml-button-16'>SignOut</a>";
}
else 
{
	echo "<button class='ml-button-1' onclick='regajax()' >Register</button>";
}				
echo <<<_END
				</div>
			</div>
			<div id='mainbody'>
				<div id='info'>
_END;
if($loggedin) 
{
	echo "<div id='info_title'>";
	if($view==$user) {
		echo	"<button class='ml-button-1' onclick='mybuddy()' style='float:left'>My Buddies</button>";
		echo	"<button class='ml-button-1' onclick='notify()'>Notifications</button>";
		echo  "<button class='ml-button-1' onclick='otherbuddy()' style='float:left;margin-left:2%'>Clue Users</button>";
		
	}
	elseif($num) {
		echo	"<button class='ml-button-1' onclick='profile(\"$view\")' style='float:left;width: 200px'>$viewName's Profile</button>";
		echo	"<button class='ml-button-1' onclick='msg(\"$view\")'>Message</button>";	
	}
	else echo	"<button class='ml-button-1' onclick='profile(\"$view\")' style='float:left;width: 200px'>$viewName's Profile</button>";
	echo "</div><div id='info_body'>";
	if($view!=$user)
		echo "<br /><b>Welcome to $viewName's page</b>";
	else 
		echo "<br /><br /><br />Enjoy Clue Services by helping us.Please make your donations as soon as possible";
	echo "</div><div id='info_foot'>"; 
	if($view!=$user && !$num)
	{	
		$query = "SELECT * FROM clueBuddy WHERE username1='$user' AND username2='$view' AND status='0'";
		$result = queryMysql($query);
		$num1    = mysql_num_rows($result);
		if($num1)
			 echo		"<b>Buddy request confirmation awaiting</b>";
		else	 
			echo		"<button class='ml-button-1' onclick='add(\"$view\")' style='float:left'>Add</button>";
	}	
	elseif($view!=$user && $num) echo		"<button class='ml-button-1' onclick='drop(\"$view\")' style='float:left'>Drop</button>";
	echo "</div>";
}
else
{
echo <<<_END
					<br /><br />				
					<b>Clue Services</b><br /><br />
			
					<ol>
							<li>GPS services for my buddies<p></p>
							<ul>
								<li>Able to attach multiple devices like phones,tablets,arduinos,any gps-gsm based devices.</li>
								<li>Show their location on g-map.</li>
								<li>Show current speed,altitude etc.</li>
								<li>Add a new device or buddy.</li>
								<li>Track the device even if it is not active by sending an sms.</li>
							</ul>
							</li><p></p>
							<li>Understand your nearest strangers<p></p>
							<ul><li>	Show a list of devices in your nearest circle.</li>
								<li>Chat,sms or call them</li></ul>
							</li>
					</ol>
_END;
}
echo <<<_END
				</div>
				<div id='in_reg_ajax'>
					<div id='in_reg_title'>
_END;
if($loggedin){
	if($num) 			
		echo 	"$viewName's position";
	else echo "You are not his buddy to view the position";
}
else 
	echo  "<b>Sign In</b>";
	
	echo "</div>";
if($loggedin) {
	if($num) 
	{
		echo "<div id='in_reg_map'>";	
		echo "Map will be shown here";
		echo	"</div>";
	}
}
else 
{
echo <<<_END
							<br></br>
							<br></br>
							<form action='signin.php' method='post' >
								<table>
									<tr><td>Username</td><td><input type='text' name='user'/></td></tr>
									<tr><td>Password</td><td><input type='password' name='pass'/></td></tr>	
									<tr><td></td><td style='float:right'><input class='ml-button-1' type='submit' value='Signin' /></td></tr>
								</table> 			
							</form>
_END;
}		

if($loggedin && $num){
echo <<<_END
				<div id='in_reg_foot'>
					<div id='lati' >latitude</div>
					<div id='long' >longitude</div>
					<div id='alti' >altitude</div>
					<div id='time' >time</div>
					<div id='speed' >speed</div>
				</div>
_END;
}
echo <<<_END
			</div>
		</div>
	</body>
</html>
_END;
?>