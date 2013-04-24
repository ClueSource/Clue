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
          	$view = $_GET['name'];

				$result = mysql_query("SELECT * FROM  current WHERE username = '$view'");
            $row=mysql_fetch_row($result);
         
            $lat=$row[1];
            $lon=$row[2];
            $alt=$row[3];
            $spd=$row[4];
            $time=$row[5];
            echo <<<_END
            var value=["$lat","$lon","$alt","$spd","$time"]
_END;
            
          ?>

 
<?php
	// 5. Close connection
	mysql_close($connection);
?>