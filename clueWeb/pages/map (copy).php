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
    
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB79jmml6X-4-uW700AmQA_5naNPIRfFfY&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
	var myLatlng = new google.maps.LatLng(9.57995, 76.62377);
        var myOptions = {
          center: myLatlng,
          zoom: 19,
          mapTypeId: google.maps.MapTypeId.SATELLITE
        };
		
        var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
			
		var contentString = '<div id="content" class="mapInfoWindowContent">'+
			'<h1 id="firstHeading" class="firstHeading">RIT</h1>'+
			'<div id="bodyContent">'+
				'<p>RIT<br>Kottayam 686001</p>'+
			'</div>'+
        '</div>';
        
		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: 'RIT'
		});
		
		google.maps.event.addListener(marker, 'click', function() {
		  infowindow.open(map,marker);
		});
		
		/*google.maps.event.addListener(map, 'rightclick', function(e) {
			console.log("e.latLng: " + e.latLng);
			var t = prompt("What's the name of this place?");
			if(!t){ return false; }
			console.log(t);
			new google.maps.Marker({
				position: e.latLng,
				map: map,
				title: t
			});
		});*/
		
      }
    </script>

  </head>

  <body onload="initialize()">

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
<!--         <div class="pull-right">-->
	    <a class="brand" href="#">Clue!	</a>
<!--	  </div>-->
          <div class="nav-collapse">
            <ul class="nav">
              <li class=""><a href="#">Get Started</a></li>
              <li class=""><a href="#">Hardware</a></li>
              <li class=""><a href="#">Download</a></li>
              <li class=""><a href="#">Resources</a></li>
              <li class=""><a href="#">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="pagecontainer">

<div class="container">

  <section id="about">
    <div class="page-header">
      <h1>Map</h1>
    </div>
    <div class="well">
      <div class="row-fluid">
          <div class="span12" id="map_canvas" style="height:500px;">
	  
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
		This is a free software. You can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation.<br>Code hosted
		by <a href="https://github.com/#">Github</a>. 
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