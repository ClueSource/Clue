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
      <h1 style="text-align: left;">Registration</h1>
    </div>
    <div class="well">
        <div class="row-fluid">
          <div class="span8 offset2" style="background-color: white; -webkit-border-radius: 4px; -moz-border-radius: 4px;" >
             <br/>
              <div class='offset2'>
             <form class="form-horizontal" method="post" action="newUserRegistration.php">
              <div class="control-group">
                <label class="control-label" for="inputEmail">Username</label>
                <div class="controls">
                  <input type="text" name="inputUsername" id="inputUsername" placeholder="Username">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputName">Name</label>
                <div class="controls">
                  <input type="text"  name="inputName" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                  <input type="password" name="inputPassword" id="inputPassword" placeholder="Password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">Retype Password</label>
                <div class="controls">
                  <input type="password" name="inputPasswordRetype" id="inputPasswordRetype" placeholder="Retype Password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input type="text" name="inputEmail" id="inputEmail" placeholder="Email Address">
                </div>
              </div>  
              <div class="control-group">
                <label class="control-label" for="mobileNumber">Mobile Number</label>
                <div class="controls">
                  <input type="text" name="mobileNumber" id="mobileNumber" placeholder="Mobile Number">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="interest">Interest</label>
                <div class="controls">
                  <input type="text" name="interest" id="interest" placeholder="Interests seperated by commas">
                </div>
              </div>
                            <div class="control-group">
                <label class="control-label" for="interest">Use the device as:</label>
                <div class="controls">
                    <label class="radio">
                        <input type="radio" name="type" id="optionsRadios1" value="0" checked>
                        Private
                      </label>
                      <label class="radio">
                        <input type="radio" name="type" id="optionsRadios2" value="1">
                        Public
                      </label>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
              </div>
            </form>
              </div>
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


      </footer>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script type="text/javascript">
      $("[rel=tooltip]").tooltip();
      $("[rel=popover]").popover();
      $(".carousel").carousel({
      interval: 4000
      });
    </script>

</body>
</html>
