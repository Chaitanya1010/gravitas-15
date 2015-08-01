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
	<script type='text/javascript'>
	function submit_pword()
	{
		var p1 = document.getElementById("pass1").value;
		var p2 = document.getElementById("pass2").value;
		var regno = document.getElementById("regno").value;
		if(p1==""||p2==""||p1!=p2)
		{
			Materialize.toast("Both Passwords should match!!", 3000, 'rounded');
			return false;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("pass1").value="";
				document.getElementById("pass2").value="";
				Materialize.toast(xmlhttp.responseText, 3000, 'rounded',function(){window.location="index.php"});
			}
		}
		xmlhttp.open("POST","submit_pword.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("p="+p1+"&r="+regno);
	}
	</script>
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
	<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
		<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
		<h4 class="header light white-text">External Registration - Password</h4>
	</header>
	<main>
<?php
require("sql_con.php");
$ResultStr = $_REQUEST["p"];
$email_db=$_REQUEST["e"];
$regno_db=$_REQUEST["r"];
$a="";
$q = "SELECT * FROM `external_participants` WHERE `regno`='$regno_db'AND`email`='$email_db'AND`pword`='$ResultStr'";
$res = mysqli_query($mysqli,$q);
$c = mysqli_num_rows($res);
$arr = mysqli_fetch_array($res);
$a = $arr["acc_details"];
if($a=="0")
{
	$q1 = "UPDATE `external_participants` SET `acc_details` = '1' WHERE `regno`='$regno_db' AND `email`='$email_db' AND `pword`='$ResultStr'";
	mysqli_query($mysqli,$q1);
}
if($c==1)
{
	echo "<br><br><div class='container'><br/><div class='card hoverable'><div  class='card-content'>
		<div class='input-field'>
		<label for='pass1'>Password:</label>
		<input type='password' id='pass1' name='pass1'>
		</div><br/>
		<div class='input-field'>
		<label for='pass2'>Re-type Password:</label>
		<input type='password' id='pass2' name='pass2'>
		</div><input type='hidden' value='$regno_db' id='regno' name='regno'><br>
		<div class='input-field'><button type='submit'onclick='submit_pword()'class='btn waves-effect waves-light indigo darken-2 left'>
		<i class='material-icons right'>send</i>Reset</button><br/><br/></div></div>
		</div></div>";
}
else
	echo "<div class='container'>Oh Snap!! Something fishy with your verification!</div>";
?>
</main>
	<footer class="page-footer indigo darken-4">
		<div class="footer-copyright">
			<div class="container">
				© COPYRIGHT GRAVITAS 2015
			</div>
		</div>
	</footer>
</body>
</html>