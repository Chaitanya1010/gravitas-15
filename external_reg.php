<!DOCTYPE html>
<html lang="en">
<head>
  <title>External Registration</title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
<style type="text/css">
.error {
  border-bottom:2px solid red;
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
				if(xmlhttp.responseText=="1")
					window.location = 'event_list.php';
				else
					window.location='external_reg.php';
			}
		}
		xmlhttp.open("POST","sub_reg.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("name="+name+"&regno="+regno+"&gen="+gen+"&college="+college+"&ph="+phno+"&email="+email+"&clgref="+clg_ref+"&vitref="+vit_ref);
	}
	else
		return false;
}
</script>
</head>
<body>
  <header class="header blue darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
    <img src="gravitaslogo.png" alt class="responsive-img" width="350px">
    <h4 class="header light white-text">External Registration</h4>
  </header>
<div id="form" class="container" style="margin-top:2em">
  <div class="card">
    <div class="card-content">
      <div class="row">
        <div class="input-field col s6">
      <input type="text" id="name" name="name" placeholder="Name"  onkeypress="return isAlpha(event)">
    </div>
    <div class="input-field col s6">
<input type="text" id="regno" name="regno" placeholder="College Reg no" >
</div>
</div>
<div class="row">
  <div class="input-field col s3">
<input type="radio" id="gender1" name="gender" value="male" checked><label for="gender1">Male</label>
<input type="radio" id="gender2" name="gender" value="female" ><label for="gender2">Female</label>
</div>
<div class="input-field col s4">

<select id="college" name="college">
<?php
$flag =0;
require("sql_con.php");
$q1 = "SELECT * FROM `colleges`";
$arr = mysqli_query($mysqli,$q1);
while($row = mysqli_fetch_array($arr))
{
	if($flag==0)
	{
		echo "<option value = ".$row[1]." selected>$row[1]</option>";
	$flag++;
	}
	else
		echo "<option value = ".$row[1].">$row[1]</option>";

}
mysqli_close();
?>
</select>
<label>College</label>
</div>
<div class="input-field col s5">
<input type="email" id="email" name="email" placeholder="Email"></div>
</div>
<div class="row">
<div class="input-field col s6">
<input type="text" id="phno" name="phno" maxlength="10" placeholder="Phone number" onkeyPress="return isNumber(event)">
</div>
<div class="input-field col s6">
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
  <div class="input-field col s8">
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
<div class="col s4">
<button id="proceed" name="proceed" class="btn waves-effect waves-light blue darken-4" style="float:right;margin-top:1em;margin-right:1em" onClick="next()">
  Proceed<i class="material-icons">send</i>
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
</body>
</html>
