<?php

include_once 'functions.php';
session_start();
if (isset($_SESSION['user']))
{
	if (isset($_POST['view'])) $view = sanitizeString($_POST['view']);

				$query = "SELECT * FROM  $view ORDER BY  `sl` DESC LIMIT 0 , 1";//WHERE sl = MAX(sl)";
            $result = queryMysql($query);
            $row=mysql_fetch_row($result);
         
            $lat=$row[1];
            $lon=$row[2];
            
           
            echo <<<_END
            var value=["$lat","$lon","$alt","$spd","$time"]
_END;

}
else 
	die("Cannot show the page");
	
    
?>