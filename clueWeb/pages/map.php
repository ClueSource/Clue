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
	$view = $_GET['name'];
	$query = "SELECT * FROM clueUsers WHERE username='$view'";
						$result = mysql_query($query);
						$row  = mysql_fetch_row($result);
						$name = $row[1];
						$email = $row[3];
						$phone= $row[4];
						$interest = $row[5];
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
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHpXdaW3PD8c8O-yjsdZOp--2qboz7OQY&sensor=false">
    </script>
    <script type="text/javascript">
      var marker = null;
      var map= null;
      var lat=null, lon=null, spd=null, alt=null, time=null;
      var flag=0;
      function init()
      {
        map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 19,
        mapTypeId: google.maps.MapTypeId.SATELLITE
        
      });
      flag=1;
      autoUpdate();
      }
      
        function loadXMLDoc()
        {
        var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
            eval(xmlhttp.responseText);
            
            lat=value[0];
            lon=value[1];
            alt=value[2];
            spd=value[3];
            time=value[4];
            }
          }
<?php
			
echo <<<_END
        xmlhttp.open("GET","genCoordinates.php?name=$view",true);
_END;
?>
        xmlhttp.send();
        }
        function setVal()
        {   
            document.getElementById("lati").innerHTML=lat;
            document.getElementById("long").innerHTML=lon;
            document.getElementById("alti").innerHTML=alt;
            document.getElementById("time").innerHTML=time;
            document.getElementById("speed").innerHTML=spd;
        }
      function autoUpdate() {
          
        loadXMLDoc();
        setVal();
        var newPoint = new google.maps.LatLng(lat, lon);

          if (marker) {
            // Marker already created - Move it
            marker.setPosition(newPoint);
          }
          else {
            // Marker does not exist - Create it
            marker = new google.maps.Marker({
              position: newPoint,
              map: map
            });
          }

          // Center the map on the new position
          map.setCenter(newPoint);
          if(flag)
          {
              setTimeout(autoUpdate, 10);
              flag=0;
          }
          else
            setTimeout(autoUpdate, 2000);
        };

    </script>

  </head>

  <body onload="init()">

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
<?php    
     echo "<h2>$name</h2>";
?>    
    </div>
    <div class="well ">
      <div class="row-fluid ">
          <div class="span4" style="background-color: white; -webkit-border-radius: 4px; -moz-border-radius: 4px; padding-left: 10px;padding-right: 10px;">
                <ul class="nav nav-tabs">
                    <li><a href="#loc" data-toggle="tab" style="background-color:#e9e7de ;">Location Details</a></li>
                    <li><a href="#profile" data-toggle="tab" style="background-color:#e9e7de ;" >Personal Profile</a></li>
                 
               </ul>   
                <div class="tab-content">
                 <div class="tab-pane active " id="loc" style="height:443px;" >
                     <table class="table table-hover" >
                        <tr>
                            <td>Latitude: </td><td><span id="lati"></span</td>
                        </tr>
                        <tr>
                            <td>Longitude: </td><td><span id="long"></span</td>
                        </tr>
                       
                        <tr>
                            <td>Altitude: </td><td><span id="alti"></span</td>
                        </tr> 
                        <tr>
                            <td>Speed: </td><td><span id="speed"></span</td>
                        </tr>
                        <tr>
                            <td>Time: </td><td><span id="time"></span</td>
                        </tr>
                    </table>
                 </div>
                 <div class="tab-pane" id="profile" style="height:443px;">
                    <table class="table table-hover" >
<?php
					
echo <<<_END
                        <tr>
                            <td>Name: </td><td>$name</td>
                        </tr>
                        <tr>
                            <td>Email: </td><td>$email</td>
                        </tr>
                        <tr>
                            <td>Mobile No: </td><td>$phone</td>
                        </tr>
                        <tr>
                            <td>Topics of interest: </td><td>$interest</td>
                        </tr>
_END;
?>
                    </table>
                 </div>
               </div>
          </div>
        <div class="span8" id="map_canvas" style="height:500px;" >
	  
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
        
        $(function () {
    $('#myTab a:last').tab('show');
  });
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
