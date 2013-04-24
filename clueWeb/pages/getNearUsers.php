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
          	$user = $_GET['username'];
				$xml="<clueUsers>\n\t\t";
        		$count=1;
        		
							
							$query = "SELECT * FROM current WHERE username='$user'";
							$result = mysql_query($query);
							
							$row = mysql_fetch_row($result); 
							$lat1 = $row[1];
							$lon1	= $row[2];
							
							$query = "SELECT * FROM current WHERE username<>'$user'";
							$result = mysql_query($query); 
							$num    = mysql_num_rows($result);
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$lat2 = $row[1];
								$lon2 = $row[2];
								
							
							
							 $R = 6371; // km
							$dLat = deg2rad($lat2-$lat1);
							$dLon = deg2rad($lon2-$lon1);
							$latt1 = deg2rad($lat1);
							$lat2 = deg2rad($lat2);

							$a = sin($dLat/2) * sin($dLat/2) + sin($dLon/2) * sin($dLon/2) * cos($latt1) * cos($lat2); 
							$c = 2 * atan2(sqrt($a), sqrt(1-$a));
							$d = $R * $c;						
							
							
							if ($d<1)
							{
									$xml .="<user>\n\t\t";
            					$xml .= "<slno>".$count++."</slno>\n\t\t";
            					$xml .= "<username>".$row[0]."</username>\n\t\t";
            					$xml .= "<latitude>".$row[1]."</latitude>\n\t\t";
            					$xml .= "<longitude>".$row[2]."</longitude>\n\t\t";
            					$xml.="</user>\n\t";
				
								}			
							
							}
									
		
						
				 
        $xml.="</clueUsers>\n\r";
        $xmlobj=new SimpleXMLElement($xml);
        $xmlobj->asXML($user."_near.xml");
        echo $user."_near.xml created";

            
          ?>

 
<?php
	// 5. Close connection
	mysql_close($connection);
?>