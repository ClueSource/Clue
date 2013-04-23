
<?php
include_once 'functions.php'
session_start();

	$user = $_SESSION['user']; 
	 $devid=$_POST['devid'];
	 $lat=$_POST['lat'];
	 $lon=$_POST['lon'];
	 $alt=$_POST['alt'];
	 $spd=$_POST['spd'];
	 $time=$_POST['time'];
	 
echo <<<_END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding to database</title>
</head>

<body>
_END;
		
		$result=mysql_query("INSERT INTO $user
				VALUES ('','$devid','$lat','$lon','$alt','$spd','$time')",$connection);

?>
