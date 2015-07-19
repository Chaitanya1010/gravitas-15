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
function isNumber(evt)
{
		var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
        return true;
}
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

function add_events()
{
  		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("body").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","add_events.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
}
function team_change(val)
{
	if(val=="fixed")
	{
		document.getElementById("team").innerHTML="Team Size: <input type='text' name='fixed' id='fixed' autocomplete='off' onkeypress='return isNumber(event)'>";
	}
	else if(val=="var")
	{
		document.getElementById("team").innerHTML="Min: <input type='text' name='var_min' id='var_min' autocomplete='off' onkeypress='return isNumber(event)'><br>Max:<input type='text' name='var_max' id='var_max' autocomplete='off' onkeypress='return isNumber(event)'>";
	}
}
function sub_event()
{
	var name = document.getElementById("ename").value;
	var tseats = document.getElementById("tseats").value;
	var tseats_ext = document.getElementById("tseats_ext").value;
	var price = document.getElementById("eprice").value;
	var cat =  document.getElementsByName("category");
	var category="";
	for (var i = 0; i < cat.length; i++)
	{
			if (cat[i].checked)
				category = cat[i].value;
	}
	var team = document.getElementsByName("tradio");
	var size=0;
	var min=0;
	var max=0;
	var flag =0;
	for (var i = 0; i < team.length; i++)
	{
		if (team[i].checked)
			team = team[i].value;
	}
	if(team=="fixed")
	{
		size = document.getElementById("fixed").value; 
		if(size==0)
			flag=1;
		else
		{
			document.getElementById("fixed").value="";		
		}
	}
	else if(team=="var")
	{
		min = document.getElementById("var_min").value; 
		max = document.getElementById("var_max").value; 
		if(min==""||max=="")
			flag=1;
		else
		{
			document.getElementById("var_min").value="";
			document.getElementById("var_max").value="";
		}
	}
	if(name==""||tseats==""||price==""||flag==1||category==""||tseats_ext=="")
	{
		alert("Enter all details");
		return false;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("msg").innerHTML=xmlhttp.responseText;
			document.getElementById("ename").value="";
			document.getElementById("eprice").value="";
			document.getElementById("tseats").value="";
			document.getElementById("tseats_ext").value="";
		}
	}
	xmlhttp.open("POST","sub_events.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("name="+name+"&tseats="+tseats+"&tseats_ext="+tseats_ext+"&price="+price+"&size="+size+"&min="+min+"&max="+max+"&cat="+category);
}
function view_events()
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
		xmlhttp.open("POST","search_events.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("val="+val);
}
function excel_eventlist(val)
{
	window.location='excel_eventlist.php?val='+val;
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
<button id='add_events' name='add_events' onclick='add_events()'>Add Events</button>
<button id='view_events' name='view_events' onclick='view_events()'>View Events</button>
<button id='change_pass' name='change_pass' onclick='change_pass()'>Change Password</button>
<a href='logout.php' >Logout</a>
<div id="body">
</div>
<?php
}
else
{
	require 'logout.php';
}
?>