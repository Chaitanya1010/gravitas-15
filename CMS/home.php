<?php
session_start();
if(isset($_SESSION["regno"]))
{	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GraVITas'15</title>
<script>
//MAIN PAGE
function externals()
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("body").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","externals.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
}
function internals()
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("body").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","internals.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
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
		xmlhttp.open("POST","events.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
}
function change_pass()
{
	document.getElementById("body").innerHTML="<input type='password' id='new1' name='new1'><br><input type='password' id='new2' name='new2'><br><button id='change' name='change' onclick='final_change()'>Change Password</button><div id='msg'></div>";
}
function final_change()
{
	var n1 = document.getElementById("new1").value;
	var n2 = document.getElementById("new2").value;
	if(n1==""||n2==""||n1!=n2)
	{
		alert("Both Passwords must match!");
		return false;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("msg").innerHTML=xmlhttp.responseText;
			document.getElementById("new1").value="";
			document.getElementById("new2").value="";
		}
	}
	xmlhttp.open("POST","change_pass.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("p="+n1);
}
//EXTERNALS
//REG STUDENTS
function reg_students()
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("ext_body").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","reg_students.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
}
function search_extreg(val)
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","search_extreg.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("val="+val);
}
function excel_extreg()
{
	window.location='excel_extreg.php';
}
//APPROVE DD
function app_dd()
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("ext_body").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","app_dd.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
}
function search_dd(val)
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","search_dd.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("val="+val);
}
function approve_ddno(val)
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("table").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","approve_ddno.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("val="+val);
}
function excel_appdd()
{
	window.location='excel_appdd.php';
}
</script>
</head>
<body>
<button id='externals' name='externals' onclick='externals()'>Externals</button>
<button id='internals' name='internals' onclick='internals()'>Internals</button>
<button id='events' name='events' onclick='events()'>Events</button>
<button id='change_pass' name='change_pass' onclick='change_pass()'>Change Password</button>
<a href='logout.php' >Logout</a>
<div id="body">
</div>
<?php
	require '../sql_con.php';
}
else
{
	require 'logout.php';
}
?>