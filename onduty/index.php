<?php
session_start();
if(isset($_SESSION["id"]))
{
	$uname=$_SESSION["id"];
	if($uname=="skk@gravitas15"||$uname=="naiju@gravitas15"||$uname=="preetika@gravitas15")
		header("Location:home_fac.php");
	else
		header("Location:home_org.php");
}
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
 	<style type="text/css">
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
	<script type="text/javascript">
	function login()
	{
		var uname = document.getElementById("uname_id").value;
		var pword = document.getElementById("pword_id").value;
		if(uname==""||pword=="")
		{
			Materialize.toast("Dont Cheat!! Enter the password!!", 3000, 'rounded');
			return false;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				if(xmlhttp.responseText==0)	
					Materialize.toast("Oh Snap!! Something Fishy!! Try Again!!", 3000, 'rounded');
				else if(xmlhttp.responseText==1)
					window.location="home_org.php";
				else
					window.location="home_fac.php";
			}
		}
		xmlhttp.open("POST","login.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("uname="+uname+"&pword="+pword);
	}
	</script>
</head>
<body>
	<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
		<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
		<h4 class="header light white-text">Organizers OnDuty</h4>
	</header>
	<main>
		<br/><br/>
		<div class='container'>
			<!--Login Div-->
			<div id='log' class='card hoverable'>
				<div class='card-content'>
					<div class='input-field'>
						<label for="uname_id">Username</label>
						<input name="uname_id" id="uname_id" type="text" autocomplete="off">
		 			</div>
		 			<div class='input-field'>
			   			<label for="pword_id">Password</label>
		 				<input id="pword_id" name="pword_id" type="password" autocomplete="off">
		 			</div>
		 			<button id="login" name="login" type='submit' class="btn waves-effect waves-light indigo darken-2 left" onclick="login()">
		   				<i class="material-icons right">send</i>Login
		 			</button>
		 			<br/><br/>
				</div>
			</div>
		</div>
	</main>
	<footer class="page-footer indigo darken-4">
		<div class="footer-copyright">
			<div class="container center-align">
				© COPYRIGHT GRAVITAS 2015
			</div>
		</div>
	</footer>
</body>
</html>