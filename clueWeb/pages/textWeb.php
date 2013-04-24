<?php
	
	define("DB_HOST", "sql112.0fees.net");
  	define("DB_USERNAME", "fees0_12215311");
  	define("DB_PASSWORD", "password");
  	define("DB_NAME", "fees0_12215311_sensorData");
	
	/*  
	
	define("DB_HOST", "localhost");
  	define("DB_USERNAME", "root");
  	define("DB_PASSWORD", "");
  	define("DB_NAME", "sensorData");
	
	  define("DB_HOST", "localhost");
	  define("DB_USERNAME", "njavalli");
	  define("DB_PASSWORD", "D7u0efAf7r");
	  define("DB_NAME", "njavalli_mainSite");
	*/  
	  date_default_timezone_set('Asia/Kolkata');

 
	// 1. Create a database connection
	$connection = mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	if (!$connection)
	{
		die("Database connection failed: " . mysql_error());
	}
	
	// 2. Select a database to use 
	$db_select = mysql_select_db(DB_NAME,$connection);
	if (!$db_select)
	{
		die("Database selection failed: " . mysql_error());
	}
?>
<?php
	$val = $_REQUEST['txtweb-message'];
	parse_str($val,$out);
	$devid = $out['user'];
	$lat = $out['lat'];
	$lon = $out['lon'];
	$alt = $out['alt'];
	$spd = $out['spd'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding to database</title>
<meta name='txtweb-appkey' content='9e053bdd-6768-4bf1-8302-55300059fdb2' />
</head>

<body>

<?php 
		
		mysql_query("INSERT INTO $devid (latitude, longitude, altitude, speed) VALUES ('$lat','$lon','$alt','$spd')");
		mysql_query("UPDATE current SET latitude='$lat', longitude='$lon', altitude='$alt', speed='$spd' where username='$devid'");
		/*if ($result)
		{
			echo "<script type=\"text/javascript\">alert(\"Entry added successfully.\"); </script>";
		}
		else
		{
			echo "<script type=\"text/javascript\">alert(\"Failed to add entry! Try again.\"); </script>";
		}*/
?>
</body>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>