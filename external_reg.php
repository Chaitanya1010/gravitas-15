<html>
<head>
<style type="text/css">
.error {
  border:2px solid red;
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
					window.location = 'events.php';
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
<div id="form">
<input type="text" id="name" name="name" placeholder="Name"  onkeypress="return isAlpha(event)"><br>
<input type="text" id="regno" name="regno" placeholder="College Reg no" ><br>
<input type="radio" id="gender" name="gender" value="male" checked>Male
<input type="radio" id="gender" name="gender" value="female" >Female<br>
College:
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
</select><br>
<input type="email" id="email" name="email" placeholder="Email"><br>
<input type="text" id="phno" name="phno" maxlength="10" placeholder="Phone number" onkeyPress="return isNumber(event)"><br>
College Ambassador Ref no:
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
</select><br>
VIT Referral no:
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
</select><br>
<input type="button" id="proceed" name="proceed" value="Proceed" onClick="next()">
</form></div>
</body>
</html>