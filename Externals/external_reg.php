<?php
session_start();
$_SESSION["temp_sess"]="hiosamba";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GraVITas '15</title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
<style type="text/css">
.error input[type=text]{
  border-bottom: 2px solid #d50000;
}
.input-field label {
  color: #7986cb;
}
/* label focus color */
.input-field input[type=text]:focus + label, input[type=text]:focus + label {
  color: #303f9f;
}
 /* label underline focus color */
.input-field input[type=text], input[type=email] {
  border-bottom: 1px solid #1a237e;
  box-shadow: 0 1px 0 0 #1a237e;
}
/* label underline focus color */
.input-field input[type=text]:focus {
  border-bottom: 1px solid #1a237e;
  box-shadow: 0 1px 0 0 #1a237e;
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
<script type="text/javascript">
// Regular expressions
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
function next()
{
	var name = document.getElementById("name").value;
	var regno = document.getElementById("regno").value;
	var gender = document.getElementsByName("gender");
	var college = document.getElementById("college").value;
	var phno = document.getElementById("phno").value;
	var email = document.getElementById("email").value;
	var clg_ref = document.getElementById("clgref").value;
	var vit_ref = document.getElementById("vitref").value;
	var gen="";
	var flag=0;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(name=="")
	{
		flag=1;
		document.getElementById("name").className = document.getElementById("name").className.replace("error", "");
		document.getElementById("name").className = document.getElementById("name").className + "error";
	}
	else
		document.getElementById("name").className = document.getElementById("name").className.replace("error", ""); // this removes the error class

	if(regno=="")
	{
		flag=1;
		document.getElementById("regno").className = document.getElementById("regno").className.replace("error", "");
		document.getElementById("regno").className = document.getElementById("regno").className + "error";  // this adds the error class
	}
	else
		document.getElementById("regno").className = document.getElementById("regno").className.replace("error", ""); // this removes the error class
	if(phno=="")
	{
		flag=1;
		document.getElementById("phno").className = document.getElementById("phno").className.replace("error", "");
		document.getElementById("phno").className = document.getElementById("phno").className + "error";  // this adds the error class
	}
	else
		document.getElementById("phno").className = document.getElementById("phno").className.replace("error", ""); // this removes the error class
	if(email==""||!email.match(mailformat))
	{
		flag=1;
		document.getElementById("email").className = document.getElementById("email").className.replace("error", "");
		document.getElementById("email").className = document.getElementById("email").className + "error";  // this adds the error class
	}
	else
		document.getElementById("email").className = document.getElementById("email").className.replace("error", ""); // this removes the error class
	for (var i = 0; i < gender.length; i++)
	{
			if (gender[i].checked)
				gen = gender[i].value;
	}
	if(flag==0)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
<<<<<<< HEAD
				if(xmlhttp.responseText==1)
					Materialize.toast('Voila! Check your mail!', 5000, 'rounded',function(){window.location="index.php"});
				else if(xmlhttp.responseText==0)
					Materialize.toast('Oh Snap!! Try Again!!', 5000, 'rounded',function(){window.location="index.php"});
=======
				if(xmlhttp.responseText=="1")
					Materialize.toast('Voila! Check your mail!', 30000, 'rounded',function(){window.location="index.php"});
				else if(xmlhttp.responseText=="0")
					Materialize.toast('Oh Snap!! Try Again!!', 30000, 'rounded',function(){window.location="index.php"});
				else if(xmlhttp.responseText.indexOf("dhS8!")>0)
				{
							window.location = 'index.php';
				}
>>>>>>> origin/master
				else
					Materialize.toast(xmlhttp.responseText +'Oh Snap!!Mailer Error!!Try Again!!', 5000, 'rounded',function(){window.location="index.php"});
			}
		}
		xmlhttp.open("POST","sub_reg.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("name="+name+"&regno="+regno+"&gen="+gen+"&college="+college+"&ph="+phno+"&email="+email+"&clgref="+clg_ref+"&vitref="+vit_ref);
	}
	else
	{
		Materialize.toast('Enter all details!!', 3000, 'rounded');
		return false;
	}
}
</script>
</head>
<body>
  <main>
  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
    <img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
    <h4 class="header light white-text">External Registration</h4>
  </header>
<div id="form" class="container" style="margin-top:2em">
  <div class="card">
    <div class="card-content">
      <div class="row">
        <div class="input-field col s12 m6">
          <label for="name">Name</label>
      <input type="text" id="name" name="name" onkeypress="return isAlpha(event)">
    </div>
    <div class="input-field col s12 m6">
      <label for="regno">Registration Number</label>
<input type="text" id="regno" name="regno" >
</div>
</div>
<div class="row">
  <div class="input-field col s6 m3">
<input type="radio" id="gender1" name="gender" class="with-gap" value="male" checked><label for="gender1">Male</label>
<input type="radio" id="gender2" name="gender" value="female" class="with-gap"><label for="gender2">Female</label>
</div>
<div class="input-field col s6 m4">
<input type="text" autocomplete="off" id="college" name="college" onkeypress="return isAlpha(event)">
<label>College and State</label>
</div>
<div class="input-field col s12 m5">
  <label for="email">Email</label>
<input type="email" id="email" name="email"></div>
</div>
<div class="row">
<div class="input-field col s12 m6">
  <label for="phno">Phone Number</label>
<input type="text" id="phno" name="phno" maxlength="10" onkeyPress="return isNumber(event)">
</div>
<div class="input-field col s12 m6">
<select  id="clgref" name="clgref" >
<?php
$flag =0;
require("sql_con.php");
$q1 = "SELECT * FROM `colg_ambassador`";
$arr = mysqli_query($mysqli,$q1);
while($row = mysqli_fetch_array($arr))
{
	if($flag==0)
	{
		echo "<option value = ".$row[0]." selected>$row[0] - $row[1]</option>";
		$flag+=10;
	}
	else
		echo "<option value = ".$row[0].">$row[0] - $row[1]</option>";
}
mysqli_close();
?>
</select>
<label>College Ambassador Ref no:</label>
</div>
</div>
<div class="row">
  <div class="input-field col s12 m8">
<select  id="vitref" name="vitref"  >
<?php
$flag =0;
require("sql_con.php");
$q1 = "SELECT * FROM `vit_ambassador`";
$arr = mysqli_query($mysqli,$q1);
while($row = mysqli_fetch_array($arr))
{
	if($flag==0)
	{
		echo "<option value = ".$row[0]." selected>$row[0] - $row[1]</option>";
		$flag+=10;
	}
	else
		echo "<option value = ".$row[0].">$row[0] - $row[1]</option>";
}
mysqli_close();
?>
</select>
<label>VIT Referral Number</label>
</div>
<div class="col s12 m4">
<button id="proceed" name="proceed" class="btn waves-effect waves-light indigo darken-4" style="float:right;margin-top:1em;margin-right:1em" onClick="next()">
  <i class="material-icons right">send</i>  Proceed
</button>
</div>
</div>
</form>
</div>
</div>
</div>
<script>
$(document).ready(function() {
   $('select').material_select();
 });

</script>
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
