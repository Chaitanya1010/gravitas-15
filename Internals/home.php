<?php
session_start();
if(isset($_SESSION["regno"]))
{
?>
	<!DOCTYPE html>
<html lang="en">
<head>
  <title>GraVITas'15</title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style  type="text/css">
  /* label color */
   .input-field label {
     color: #1a237e;
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: #303f9f;
   }
    /* label underline focus color */
   .input-field input[type=text] {
     border-bottom: 1px solid #1a237e;
     box-shadow: 0 1px 0 0 #1a237e;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #303f9f;
     box-shadow: 0 1px 0 0 #303f9f;
   }
   body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
      
  </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  <script>
function events()
{
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("body").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","view_events.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();

}
function search_events(val)
{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("event_table").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","search_all_events.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("val="+val);
}
function excel_eventlist(val)
{
	window.location='excel_eventlist.php?val='+val;
}
function registration()
{
		
		document.getElementById("body").innerHTML="Registration Number:<br/><input type='text' name='regno' id='regno' autocomplete='off'><button onclick='reg_go()'>Submit</button>";
}
function reg_go()
{
	var regno = document.getElementById("regno").value;
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	if(regno.match(pattern))
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("body").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","reg_int.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("regno="+regno);
	}
	else
	{
		//reg no error
	}
		
}
  </script>
  </head>
<body>
  <main>
  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
    <img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
    <h4 class="header light white-text">Internal Registration</h4>
  </header>
  	 <div class="fixed-action-btn" style="bottom:30px; left:24px">Logout<br/>
		<a class="red btn-floating btn-large waves-effect z-depth-3"  title="Logout" href="logout.php">
			<i class="material-icons">power_settings_new</i>
		</a>
		</div>
		 <div class="fixed-action-btn" style="bottom:30px; right:24px">Home<br/>
		<a class="red btn-floating btn-large waves-effect z-depth-3"  title="Logout" href="home.php">
			<i class="material-icons">home</i>
		</a>
		</div>
		<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
			<div class="col s12">
			  <ul class="tabs indigo darken-2">
					<li class="tab col s6"><a href="#" class="white-text waves-effect" id="type" name="type" value="0" onclick="registration()">Registration</a></li>
					<li class="tab col s6"><a href="#" class="white-text waves-effect" id="type" name="type" value="1" onclick="events()">Events</a></li>
			  </ul>
			</div>
		 </div>
<div id='body'>
Registration Number:<br/><input type='text' name='regno' id='regno'  autocomplete='off'><button onclick='reg_go()'>Submit</button>
</div>
</main>
<footer class="page-footer indigo darken-2">
          <div class="footer-copyright">
            <div class="container">
            © COPYRIGHT GRAVITAS 2015
            </div>
          </div>
        </footer>
</body>
</html>
<?php
}
else
	require("logout.php");