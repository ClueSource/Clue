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
                <a class="dropdown-toggle btn btn-info" id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
                   Logout
                </a>
         </div>
       <div class="pull-right" style="padding-top: 20px;">
           &nbsp;&nbsp;
         </div>
        <div class="dropdown pull-right" style="padding-top: 20px; padding-left: 100px;">
                <a class="dropdown-toggle btn btn-info" id="dLabel" role="button" data-toggle="dropdown" data-target="#" >
                    <span style="color: yellow;">4</span> Notifications
                </a>
                 <div  class="dropdown-menu span3" role="menu" aria-labelledby="dLabel">
                     <div class="well text-info alert-block alert-success fadein"  >
                         <a class="close" data-dismiss="alert" href="#">&times;</a>
                         Joseph has send you a friends request. <span class="btn btn-success btn-mini">Accept</span>
                     </div>  
                     <div class="well text-info alert-block alert-info fadein"  >
                         <a class="close" data-dismiss="alert" href="#">&times;</a>
                         Leo says: "Hey Dude, I am lost at California. Help me find out the way."
                     </div>  
                     <div class="well text-info alert-block alert-info fadein"  >
                         <a class="close" data-dismiss="alert" href="#">&times;</a>
                         College bus says:"The tyre is punctured on the way. Hold on at your bus stops. We will be late."
                     </div>  
                     <div class="well text-info alert-block alert-error fadein"  >
                         <a class="close" data-dismiss="alert" href="#">&times;</a>
                         Your trial Clue account will expire in 18 days.
                     </div>  
                     
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
                <li class="span2  alert-success  ">
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
                </li>
             </ul>
         </div> 
         <h4>Clue Devices:</h4>
         <ul class="thumbnails row-fluid">
               <br/>
                <li class="span2 alert-success ">
                    <a href="./map.php" class="thumbnail" style="text-decoration: none; color: black; text-align: center;">
                    <img data-src="holder.js/300x200" alt="">
                     <h4>Arduino</h4>
                    <p>Currently Online</p>
                    </a>
                </li>
         </ul>
	</div>
                        <!-- box beginning-->
	<div class="span3" style="background-color: white; -webkit-border-radius: 4px; -moz-border-radius: 4px; padding-left: 10px;" >
	  <h4>Add a friend</h4>
          <div class="input-append" >
              <input class="span9" id="appendedInputButton" placeholder="Enter the username" type="text">
              <button class="btn" type="button">Add</button>
          </div>
          <br/>
           <h4>Add a device</h4>
          <div class="input-append" >
              <input class="span9" id="appendedInputButton" placeholder="What would you name it?" type="text">
              <button class="btn" type="button">Add</button>
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

</body>
</html>
