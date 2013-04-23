<?php
	  
/*	define("DB_HOST", "localhost");
  	define("DB_USERNAME", "root");
  	define("DB_PASSWORD", "");
  	define("DB_NAME", "sensorData");
	*/
	define("DB_HOST", "sql112.0fees.net");
  	define("DB_USERNAME", "fees0_12215311");
  	define("DB_PASSWORD", "password");
  	define("DB_NAME", "fees0_12215311_sensorData");
	
	
/*
	 define("DB_HOST", "localhost");
	  define("DB_USERNAME", "njavalli");
	  define("DB_PASSWORD", "D7u0efAf7r");
	  define("DB_NAME", "njavalli_mainSite");
	  
	  date_default_timezone_set('Asia/Kolkata');
*/
 
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


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Clue: The Open Source Tracking System</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <link href="../style/bootstrap.css" rel="stylesheet">
    <link href="../style/bootstrap-responsive.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">


  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
<!--         <div class="pull-right">-->
	    <a class="brand" href="http://www.Clue-os.org/index.html">Clue!	</a>
<!--	  </div>-->
          <div class="nav-collapse">
            <ul class="nav">
              <li class=""><a href="http://www.Clue-os.org/start.html">Get started</a></li>
              <li class=""><a href="http://www.Clue-os.org/hardware.html">Hardware</a></li>
              <li class=""><a href="http://www.Clue-os.org/download.html">Download</a></li>
              <li class=""><a href="http://www.Clue-os.org/community.html">Community</a></li>
              <li class=""><a href="http://www.Clue-os.org/license.html">License</a></li>
              <li class=""><a href="http://www.Clue-os.org/support.html">Resources</a></li>
              <li class=""><a href="http://www.Clue-os.org/contact.html">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="pagecontainer">

<div class="container">

  <section id="about">
    <div class="page-header">
      <h1>Data from Database</h1>
    </div>
    <div class="well">
      <div class="row-fluid">
	
	<div class="span4" style="overflow:hidden;" >
    	<ol>
		<?php
			$result = mysql_query("SELECT * FROM data ");
			while($row=mysql_fetch_array($result)){
				echo("<li>".$row['data']."</li>");
			}
		?>
        </ol>
	</div>
    <div class="span8">
    	<table class="table table-striped table-hover table-bordered">
        	<tr>
            	<td>Sl No.</td>
                <td>Device ID</td>
                <td>Latitude</td>
                <td>Longitude</td>
                <td>Altitude</td>
                <td>Speed</td>
                <td>Time</td>
            </tr>
            <?php
			$result = mysql_query("SELECT * FROM mobile ");
			while($row=mysql_fetch_array($result)){
				echo("<tr><td>".$row['slno']."</td>"."<td>".$row['devid']."</td>"."<td>".$row['latitude']."</td>"."<td>".$row['longitude']."</td>"."<td>".$row['altitude']."</td>"."<td>".$row['speed']."</td>"."<td>".$row['time']."</td>"."</tr>");
			}
			?>
        </table>
    </div>
      </div>
    </div>



  </section>



  
</div>

</div>

 <!-- /container -->

    <footer >
	<div class="container">
	  <div class="row">
	    <div class="span12">
	      <div id="copyrightext">
		© Copyright 2012, the Clue project and its
		contributors.<br>Code hosted
		by <a href="https://github.com/Clue-os">Github</a>. Website
		hosted
		by <a href="http://thingsquare.com/">Thingsquare</a>.
	      </div>
	    </div>
	  </div>

	

	  
	</div>
      </footer>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript">
      $("[rel=tooltip]").tooltip();
      $("[rel=popover]").popover();
      $(".carousel").carousel({
      interval: 4000
      });
    </script>

</body>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>