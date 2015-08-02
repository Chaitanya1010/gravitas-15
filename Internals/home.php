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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
	<script>
	function isNumber(evt)
	{
		var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
        return true;
	}
	function isAlpha(evt)
	{
       	var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 32 && charCode != 46 && charCode > 31 && (charCode < 97 || charCode > 122)&& (charCode < 65 || charCode > 90))
             return false;
        return true;
	}
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
	function search_all_events(val)
	{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("event_table").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open('POST','search_all_events.php',true);
			xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			xmlhttp.send('val='+val);
	}
	function excel_eventlist(val)
	{
		Materialize.toast('Downloading...',2000,'rounded');
		window.location='excel_eventlist.php?val='+val;
	}
	function registration()
	{	
		document.getElementById('body').innerHTML="<div class ='container'><div class='card hoverable'><form class='card-content' id='form' action='event_list.php' method='post'><div class='input-field'><label for='name'>Name</label><br/><input type='text' name='name' id='name' onkeypress='return isAlpha(event)' autocomplete='off'></div><div class='input-field'><label for='regno'>Registration Number</label><br/><input type='text' name='regno' id='regno' autocomplete='off'></div><div class='input-field'><label for='email'>Email</label><br/><input type='text' name='email' id='email' autocomplete='off'></div><div class='input-field'><label for='phno'>Phone Number</label><br/><input type='text' name='phno' id='phno' onkeypress='return isNumber(event)' autocomplete='off'></div><div class ='input-field'><button onclick='reg_go()' class='waves-effect waves-light indigo darken-2 btn z-depth-1'>Submit</button></div></form>";
	}
	function reg_go()
	{
		var name = document.getElementById("name").value;
		var regno = document.getElementById("regno").value;
		var email = document.getElementById("email").value;
		var phno = document.getElementById("phno").value;
		var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(regno.match(pattern)&&email.match(mailformat)&&name!=""&& phno.length==10)
		{
			document.getElementById("form").submit();
		}
		else
		{
			Materialize.toast("Enter all details",3000,"rounded");
			return false;
		}	
	}
</script>
<style type="text/css">
		 .msg
		 {
		 	background: #e53935;
		 	color: #ffffff;
		 	position: absolute;
    		left: 400px;
    		bottom: 110px;
    		padding: 2px 7px;
    		border-radius: 25px;
		 }
		 body
		 {
    		display: flex;
    		min-height: 100vh;
    		flex-direction: column;
  		}
  		main 
  		{
    		flex: 1 0 auto;
 		}
		/* label color */
   		.input-field label 
   		{
     		color: #7986cb;
   		}
	   /* label focus color */
	   .input-field input[type=text]:focus + label 
	   {
	   		color: #1a237e;
	   }
	   /* label underline focus color */
	   .input-field input[type=text]:focus 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label underline color */
	   .input-field input[type=text] 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label focus color */
	   .input-field input[type=password]:focus + label 
	   {
	   		color: #1a237e;
	   }
	   /* label underline focus color */
	   .input-field input[type=password]:focus 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label underline color */
	   .input-field input[type=password] 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	</style>
  </head>
<body>
  <main>
  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
    <img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
    <h4 class="header light white-text">Internal Registration</h4>
 </header>
  
		<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
			<div class="col s12">
			  <ul class="tabs indigo darken-2">
					<li class="tab col s6"><a href="#" class="white-text waves-effect" id="type" name="type" value="0" onclick="registration()">Registration</a></li>
					<li class="tab col s6"><a href="#" class="white-text waves-effect" id="type" name="type" value="1" onclick="events()">Events</a></li>
			  </ul>
			</div>
		 </div>
<div id="body"><div class ="container"><div class="card hoverable">
<form class="card-content" id="form" onsubmit="return reg_go()" action="event_list.php" method="post">
<div class="input-field">
<label for="name">Name</label><br/><input type='text' name='name' id='name' autocomplete='off' onkeypress="return isAlpha(event)">
</div>
<div class="input-field">
<label for="regno">Registration Number</label><br/><input type='text' name='regno' id='regno' autocomplete='off'>
</div>
<div class="input-field">
<label for="email">Email</label><br/><input type='text' name='email' id='email' autocomplete='off'>
</div>
<div class="input-field">
<label for="phno">Phone Number</label><br/><input type='text' name='phno' id='phno' autocomplete='off' onkeypress="return isNumber(event)">
</div>
<div class ="input-field"><button class="waves-effect waves-light indigo darken-2 btn z-depth-1">Submit</button>
</div>
</form>
</div>
</div>
</div>

</main>
	<footer class="page-footer indigo darken-4">
  <div class="footer-copyright">
    <div class="container">
      <a class='modal-trigger white-text right' href='#credits'>Meet the developers</a>
      		<a class="red btn waves-effect z-depth-3 "  title="Logout" href="logout.php">
			<i class="material-icons">power_settings_new</i>
		</a>
			<a class="red btn waves-effect z-depth-3"  title="Logout" href="home.php">
			<i class="material-icons">home</i>
		</a>

    </div>
  </div>
</footer>
<div id="credits" class="modal">
  <div class="modal-content" style='padding:0'>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-image">
            <img src="credits.jpg">
            <span class="card-title">Developers</span>
          </div>
          <div class="card-content" style='padding:0'>
            <div class='row'>
              <div class='col s6'>
              <h5 class='header light'><a href="https://in.linkedin.com/pub/chaitanya-tetali/86/763/aa2" target='_blank'>Tetali Chaitanya</a></h5>
                Back End
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://www.linkedin.com/in/rajalakshmisenthil" target='_blank'>Rajalakshmi Senthil</a></h5>
                Back End
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://in.linkedin.com/in/shubhodeep9" target='_blank'>Shubhodeep Mukherjee</a></h5>
                Front End

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>

.modal { max-height: 90%; max-width:90%; }
</style>
<script>
$(document).ready(function(){
// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal-trigger').leanModal();
});
</script>

</body>
</html>
<?php
}
else
	require("logout.php");
?>