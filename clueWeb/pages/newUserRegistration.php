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
          
          
	 $username=$_POST['inputUsername'];
         $name=$_POST['inputName'];
         $password=$_POST['inputPassword'];
         $email=$_POST['inputEmail'];
         $mobile=$_POST['mobileNumber'];
         
         $type=$_POST['type'];
         $interest=$_POST['interest'];
         
          mysql_query("create table $username(slno int primary key auto_increment , latitude varchar(20), longitude varchar(20), altitude varchar(20), speed varchar(20), time varchar(20) );");
          
          mysql_query("INSERT INTO `current`(`slno`, `username`, `latitude`, `longitude`, `altitude`, `speed`, `time`) VALUES (null,'$username',0,0,0,0,0)");
 
          mysql_query("INSERT INTO `users`(`slno`, `username`, `name`, `password`, `email`, `mobileno`, `interest`, `devstatus`, `usertype`) VALUES (null,'$username','$name','$password','$email','$mobile','$interest','1','$type')");
          /*$result = mysql_query("SELECT * FROM  `mobile` ORDER BY  `slno` DESC LIMIT 0 , 1");
            $row=mysql_fetch_array($result);
         
            $lat=$row['latitude'];
            $lon=$row['longitude'];
            $alt=$row['altitude'];
            $spd=$row['speed'];
            $time=$row['time'];
            //echo $alt;
            echo "var value=[".$lat.",".$lon.",".$alt.",".$spd.",".$time."];";*/
         setcookie("username", $username,time()+3600,"/");
         header("Location:./userPage.php");
          ?>
<html>
    <body>
        <?php echo ("Hello". $username) ?>
    </body>
</html>

 
<?php
	// 5. Close connection
	mysql_close($connection);
?>