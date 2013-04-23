function regajax()
			{
				request = new ajaxRequest()
				request.open("POST", "register.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", 0)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								document.getElementById('in_reg_ajax').innerHTML =this.responseText
								document.getElementById('reg_prof_ajax').innerHTML = 'Registering'
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send()
			}
function mybuddy()
			{
				request = new ajaxRequest()
				request.open("POST", "friendlist.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", 0)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
								document.getElementById('info_body').innerHTML =this.responseText
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send()
			}
function notify()
			{
				request = new ajaxRequest()
				request.open("POST", "notification.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", 0)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
								document.getElementById('info_body').innerHTML =this.responseText
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send()
			}
function msg(view)
			{
				viewby="view="+view
				request = new ajaxRequest()
				request.open("POST", "msg.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", viewby.length)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								document.getElementById('info_body').innerHTML =this.responseText
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send(viewby)
			}
function otherbuddy()
			{
				request = new ajaxRequest()
				request.open("POST", "clueuserslist.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", 0)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
								document.getElementById('info_body').innerHTML =this.responseText
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send()
			}
function profile(view)
			{
				viewby="view="+view
				request = new ajaxRequest()
				request.open("POST", "showprofile.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", viewby.length)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								document.getElementById('info_body').innerHTML =this.responseText
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send(viewby)
			}
function add(view)
			{
				viewby="view="+view
				request = new ajaxRequest()
				request.open("POST", "add.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", viewby.length)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								document.getElementById('cluebody').innerHTML =this.responseText
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send(viewby)
			}
function drop(view)
			{
				viewby="view="+view
				request = new ajaxRequest()
				request.open("POST", "drop.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", viewby.length)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								document.getElementById('cluebody').innerHTML = this.responseText
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send(viewby)
			}
function profileajax()
			{
				request = new ajaxRequest()
				request.open("POST", "profile.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", 0)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								document.getElementById('in_reg_ajax').innerHTML =this.responseText
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send()
			}
function signout()
			{
				request = new ajaxRequest()
				request.open("POST", "signout.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", 0)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								document.getElementById('cluebody').innerHTML =this.responseText
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send()
			}
			function ajaxRequest()
			{
				try
				{
					var request = new XMLHttpRequest()
				}	
				catch(e1)
				{
					try
					{
						request = new ActiveXObject("Msxml2.XMLHTTP")
					}
					catch(e2)
					{
						try
						{
							request = new ActiveXObject("Microsoft.XMLHTTP")
						}
						catch(e3)
						{
							request = false
						}
					}
				}
				return request
			}
      var marker = null;
      var map= null;
      var lat=null, lon=null, spd=null, alt=null, time=null;
      var flag=0;
      function init(view)
      {
        map = new google.maps.Map(document.getElementById('in_reg_map'), {
        zoom: 19,
        mapTypeId: google.maps.MapTypeId.HYBRID
        
      });
      flag=1;
      autoUpdate(view);
      }
      function loadXMLDoc(view)
			{
				viewby="view="+view
				request = new ajaxRequest()
				request.open("POST", "showgps.php", true)
				request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
				request.setRequestHeader("Content-length", viewby.length)
				request.setRequestHeader("Connection", "close")
				request.onreadystatechange = function()
				{
					if (this.readyState == 4)
					{
						if (this.status == 200)
						{
							if (this.responseText != null)
							{
								 eval(this.responseText);
            
            				lat=value[0];
            				lon=value[1];
            				alt=value[2];
            				spd=value[3];
            				time=value[4];
							}
							else alert("Ajax error: No data received")
						}
						else alert( "Ajax error: " + this.statusText)
					}
				}	
				request.send(viewby)
			}
        /*function loadXMLDoc()
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
            //document.getElementById("in_reg_map").innerHTML=xmlhttp.responseText;
            eval(xmlhttp.responseText);
            
            lat=value[0];
            lon=value[1];
            alt=value[2];
            spd=value[3];
            time=value[4];
            }
          }
        xmlhttp.open("GET","showgps.php",true);
        xmlhttp.send();
        }*/
        function setVal()
        {   
            document.getElementById("lati").innerHTML="latitude :"+lat;
            document.getElementById("long").innerHTML="longitude :"+lon;
            document.getElementById("alti").innerHTML="altitude :"+alt;
            document.getElementById("time").innerHTML="time :"+time;
            document.getElementById("speed").innerHTML="speed :"+spd;
        }
      function autoUpdate(view) {
          
        loadXMLDoc(view);
        setVal();
        var newPoint = new google.maps.LatLng(lat, lon);

          if (marker) {
            // Marker already created - Move it
            marker.setPosition(newPoint);
     
          }
          else {
            // Marker does not exist - Create it
            /*marker = new google.maps.Marker({
              position: newPoint,
              map: map
            });*/
            marker=new google.maps.Marker({
  				position:newPoint,
  				animation:google.maps.Animation.BOUNCE
  				});

				marker.setMap(map);
          }

          // Center the map on the new position
          map.setCenter(newPoint);
          if(flag)
          {
              setTimeout(autoUpdate, 10,view);
              flag=0;
          }
          else
            setTimeout(autoUpdate, 2000,view);
        }
        
function checkUser(user)
{
	if (user.value == '')
	{
		document.getElementById('note').innerHTML = ''
		return
	}

	params  = "user=" + user.value
	request = new ajaxRequest()
	request.open("POST", "checkuser.php", true)
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded")
	request.setRequestHeader("Content-length", params.length)
	request.setRequestHeader("Connection", "close")
	
	request.onreadystatechange = function()
	{
		if (this.readyState == 4)
		{
			if (this.status == 200)
			{
				if (this.responseText != null)
				{
					document.getElementById('note').innerHTML = this.responseText
					 	
				}
				else alert("Ajax error: No data received")
			}
			else alert( "Ajax error: " + this.statusText)
		}
	}
	request.send(params)
}