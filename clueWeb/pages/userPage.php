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
    
    <link href="./../style/bootstrap.css" rel="stylesheet">
    <link href="./../style/bootstrap-responsive.css" rel="stylesheet">
    <link href="./../style/style.css" rel="stylesheet">
    <script type="text/javascript">
        var username=null;
        function init()
        {
            getCookie();
            loadXMLDoc();
        }
    function getCookie()
        {
        var c_name='username',i,x,y,ARRcookies=document.cookie.split(";");
        for (i=0;i<ARRcookies.length;i++)
        {
          x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
          y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
          x=x.replace(/^\s+|\s+$/g,"");
          if (x==c_name)
            {
                username=y;
            }
          }
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
             returnValue=xmlhttp.responseText;
            //alert(returnValue);
             document.getElementById("displayArea").innerHTML="Welcome "+returnValue;
            }
          }
          xmlhttp.open("POST","./getName.php",true);
          xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          xmlhttp.send("user="+username);
        }
        function addFriend(){
        		usernamefr= document.getElementById("appendedInputButton1").value;
        		loadajax1();
        	}
        	function loadajax1()
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
             returnValue=xmlhttp.responseText;
            alert("Friend request send");
             //document.getElementById("appendedInputButton2").innerHTML="Friend request send";
            }
          }
          xmlhttp.open("POST","./addFriend.php",true);
          xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          xmlhttp.send("friend="+usernamefr);
        }
        function addDevice(){
        		devname= document.getElementById("appendedInputButton2").value;
        		loadajax2();
        	}
        	function loadajax2()
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
             returnValue=xmlhttp.responseText;
            alert("Device added successfully");
             //document.getElementById("displayArea").innerHTML="Welcome "+returnValue;
            }
          }
          xmlhttp.open("POST","./addDevice.php",true);
          xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          xmlhttp.send("devname="+devname);
        }
    </script>

  </head>

  <body onload="init()">

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar "></span>
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
    <div class="page-header">
         <div class="pull-right" style="padding-top: 20px;">
                <a href="./signout.php" class="dropdown-toggle btn btn-info" >
                   Logout
                </a>
         </div>
       <div class="pull-right" style="padding-top: 20px;">
           &nbsp;&nbsp;
         </div>
        <div class="dropdown pull-right" style="padding-top: 20px; padding-left: 100px;">
        
        			<?php
                     if (!isset($_COOKIE['username']))
								die("<br /><br />You need to login to view this page");		
							$user = $_COOKIE['username'];
							$result = mysql_query("SELECT username1,msg FROM messages WHERE username2='$user'");
							$num    = mysql_num_rows($result);
echo <<<_END
                <a class="dropdown-toggle btn btn-info" id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
                    <span style="color: yellow;">$num</span> Notifications
                </a>
                 <div  class="dropdown-menu span3" role="menu" aria-labelledby="dLabel">  
_END;
							if(!$num)
							{
echo <<<_END
							<div class="well text-info alert-block alert-error fadein"  >
                         <a class="close" data-dismiss="alert" href="#">&times;</a>
                         No new notifications
                     </div>
_END;
							}
							else 
							{
								
								for ($j = 0 ; $j < $num ; ++$j)
								{
									$row = mysql_fetch_row($result);
									$result2 = mysql_query("SELECT name FROM clueUsers WHERE username='$row[0]'");
									$row1 = mysql_fetch_row($result2);
echo <<<_END
									<div class="well text-info alert-block alert-info fadein"  >
                        		<a class="close" data-dismiss="alert" href="#">&times;</a>
                        	 	<b>$row1[0]</b> says : $row[1]
                     		</div>
_END;
								}
							}
							
                 
						?>
                 </div>
         </div>

      <h2 id="displayArea" style="text-align: left;" >Welcome</h2>
    </div>
    <div class="well row-fluid">
      <div class="row-fluid span12">
        <!-- box beginning-->
	<div class="span9 row-fluid" style="background-color: white; -webkit-border-radius: 4px; -moz-border-radius: 4px; padding-left: 10px;padding-right: 10px;" >

	 <h4>Clue Friends:</h4>
         <div name="displayAreaOfFriends" >
              <ul class="thumbnails row-fluid ">
               <br/>
               <div id="listItems"></div>
               <?php
                    /* if (!isset($_COOKIE['username']))
								die("<br /><br />You need to login to view this page");		
							$user = $_COOKIE['username'];*/
							$followers = array();
							$followers2 = array();
							$query = "SELECT username2 FROM clueBuddy WHERE username1='$user' AND status='1' AND relation<>'device'";
							$result = mysql_query($query);
							$num    = mysql_num_rows($result); 
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$followers[$j] = $row[0];
							}
							$query = "SELECT username1 FROM clueBuddy WHERE username2='$user' AND status='1' AND relation<>'device'";
							$result = mysql_query($query); 
							$num    = mysql_num_rows($result);
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$followers2[$j] = $row[0];
							}	
							$friends   = FALSE;
							if (sizeof($followers))
							{
								
								foreach($followers as $friend)
								{
									$query = "SELECT name,devstatus FROM clueUsers WHERE username='$friend'";
									$result = mysql_query($query);
									$row = mysql_fetch_row($result);
									if($row[1]) 
				{
echo <<<_END
					<li class="span2  alert-success  ">
                    <a href="./map.php?name=$friend" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>$row[0]</h4>
                    <p>Online</p>
                    </a>
                </li>
_END;
				}
				else {
echo <<<_END
					<li class="span2  alert-kajjah ">
                    <a href="./map.php?name=$friend" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>$row[0]</h4>
                     <p style="font-size: 13px; ">Offline</p>
                    </a>
                </li>
_END;
				}
				
								}			
							
								$friends = TRUE;
							}
		if (sizeof($followers2))
		{
			
			foreach($followers2 as $friend)
			{
				$query = "SELECT name,devstatus FROM clueUsers WHERE username='$friend'";
				$result = mysql_query($query);
				$row = mysql_fetch_row($result);
				if($row[1]) 
				{
echo <<<_END
					<li class="span2  alert-success  ">
                    <a href="./map.php?name=$friend" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>$row[0]</h4>
                    <p>Online</p>
                    </a>
                </li>
_END;
				}
				else {
echo <<<_END
					<li class="span2  alert-kajjah ">
                    <a href="./map.php?name=$friend" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>$row[0]</h4>
                     <p style="font-size: 13px; ">Offline</p>
                    </a>
                </li>
_END;
				}
				
				
			}			
		
			$friends = TRUE;
		}
		if(!$friends) {
			echo "No friends yet";
		}
							
                 
                /*<li class="span2  alert-success  ">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2  alert-kajjah ">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Kiran</h4>
                     <p style="font-size: 13px; ">Online 11 mins ago</p>
                    </a>
                </li>
                <li class="span2  alert-kajjah ">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Ajo</h4>
                    <p>Online 1 day ago</p>
                    </a>
                </li>
                <li class="span2 alert-success ">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Harry</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2 alert-success">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2 alert-success">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2 alert-success">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2 alert-success">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2 alert-success">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2 alert-success">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
                <li class="span2 alert-success">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Leo</h4>
                    <p>Currently Online</p>
                    </a>
                </li>*/
echo <<<_END
             </ul>
         </div> 
         <h4>Clue Devices:</h4>
         <ul class="thumbnails row-fluid">
               <br/>
_END;

							$followers3 = array();
							$query = "SELECT username2 FROM clueBuddy WHERE username1='$user' AND relation='device'";
							$result = mysql_query($query);
							$num    = mysql_num_rows($result); 
							for ($j = 0 ; $j < $num ; ++$j)
							{
								$row = mysql_fetch_row($result);
								$followers3[$j] = $row[0];
							}
							$friends   = FALSE;
							if (sizeof($followers3))
							{
								
								foreach($followers3 as $friend)
								{
						

					echo "<li class=\"span2  alert-success  \">";
               echo  "<a href='./map.php?name=$friend' class='thumbnail' style='text-decoration: none; color: black; text-align: center;'>";
echo <<<_END
                    <img data-src="holder.js/300x200" alt="">
                     <h4>$friend</h4>
                    <p>Active</p>
                    </a>
                </li>
_END;
		
				
								}			
							
								$friends = TRUE;
							}
							if(!$friends) {
								echo "No devices yet";
							}
?>
               <!-- <li class="span2 alert-success ">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Arduino</h4>
                    <p>Currently Online</p>
                    </a>
                </li>-->
         </ul>
	</div>
                        <!-- box beginning-->
	<div class="span3" style="background-color: white; -webkit-border-radius: 4px; -moz-border-radius: 4px; padding-left: 10px;" >
	  <h4>Add a friend</h4>
          <div class="input-append" >
              <input class="span9" id="appendedInputButton1" placeholder="Enter the username" type="text">
              <button class="btn" type="button" onclick="addFriend()">Add</button>
          </div>
          <br/>
           <h4>Add a device</h4>
          <div class="input-append" >
              <input class="span9" id="appendedInputButton2" placeholder="What would you name it?" type="text">
              <button class="btn" type="button" onclick="addDevice()">Add</button>
          </div>
           
          <br/>
          
	</div>
      </div>

    </div>

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


      </footer>
    <script src="./../js/jquery.js"></script>
    <script src="./../js/bootstrap.js"></script>
    <script type="text/javascript">
        $(".alert").alert();
      $("[rel=tooltip]").tooltip();
      $("[rel=popover]").popover();
      $(".carousel").carousel({
      interval: 4000
      });
    </script>
	<?php
	
		mysql_close($connection);
                 
	?> 
</body>
</html>
