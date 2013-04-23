<?php
	require_once './databaseConstants.php';

 
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
            $result = mysql_query("SELECT * FROM  `mobile` ORDER BY  `slno` DESC LIMIT 0 , 1");
            $row=mysql_fetch_array($result);
         
            $lat=$row['latitude'];
            $lon=$row['longitude'];
            $alt=$row['altitude'];
            $spd=$row['speed'];
            $time=$row['time'];
            //echo $alt;
            echo "var value=[".$lat.",".$lon.",".$alt.",".$spd.",".$time."];";
          ?>

 
<?php
	// 5. Close connection
	mysql_close($connection);
?>