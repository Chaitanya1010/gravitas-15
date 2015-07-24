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
			alert("Enter Valid Register Number");
		}	
	}
	var cart = new Array();
	var team = new Array();
	var lastType = 0;
	//To display the events in each type
	//val - value typed in search box or "body" while refreshing the events list
	function search_events(val,stype)
	{
	  if(stype=="search")
			type=lastType;
	  else if(stype==0)
	  {
			type=stype;
	  }
	  else
	  {
			type = stype.getAttribute('value');
	   }
	   if(val=="body")
		{
			document.getElementById("search").value="";
			cart_initialize();
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("events").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","search_events.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("key="+val+"&type="+type+"&cart="+cart);
		lastType = type;
	}	
	function cart_initialize()
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("cart").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","add_to_cart.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team);
	}
	//	To add an element to the cart and to refresh the cart after removing
	function add_to_cart(id)
	{
		if(id!="refresh")//refresh is used when an element is deleted from cart
		{
				cart[cart.length]=id;
				if(document.getElementById(id.concat("select")).tagName=='LABEL') //Fixed team size
					team[team.length]=document.getElementById(id.concat("select")).innerHTML;
				else
					team[team.length]=document.getElementById(id.concat("select")).value;//Variable team size
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("cart").innerHTML=xmlhttp.responseText;
				search_events("body",'search');
			}
		}
		xmlhttp.open("POST","add_to_cart.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team);
	}
	//Delete an element from the cart
	function del_cart(id)
	{
		//This deletes the element w.r.t its index
		cart.splice(id,1);
		team.splice(id,1);
		//Refresh the list of events in that category
		search_events("body",'search');
		//$('#cart').closeModal();
		//Refresh the cart after removing the event
		add_to_cart("refresh");
	}
//To proceed to intermediate page
function proceed_1()
{
	$('#cart').closeModal();
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("all").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","proceed_1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("cart="+cart+"&team="+team);
}

//Back to cart to edit
function back()
{
	window.location="event_list.php";
}
function demand_draft(val)
{
	if(val==0)
		document.getElementById("dd").innerHTML="<div class='input-field col s4'><input type='text' id='ddno' name='ddno' placeholder='DD Number'><br><input type='text' id='ddbank' name='ddbank' placeholder='Bank Name'><input type='date' class='datepicker' id='dddate' name='dddate'></div>";
	else
		document.getElementById("dd").innerHTML="";
}
//checkout to payment gateway
function checkout()
{
	var pay;
	var p = document.getElementsByName("pay");
	for (var i = 0; i < p.length; i++)
	{
			if (p[i].checked)
				pay = p[i].value;
	}
	if(pay=="0") // For DD
	{
		var ddno = document.getElementById("ddno").value;
		var bname = document.getElementById("ddbank").value;
		var dd_date = document.getElementById("dddate").value;
		if(ddno==""||bname==""||dd_date=="")
		{
			alert("Enter all Details");
			return;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("all").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","demand_draft.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team+"&dd="+ddno+"&bname="+bname+"&dd_date="+dd_date);
	}
	else if(pay=="1") // For Online Payment
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("pay").innerHTML=xmlhttp.responseText;
				document.getElementById("all").innerHTML=xmlhttp.responseText;//except registered events
				document.getElementById("form").submit();
			}
		}
		xmlhttp.open("POST","online_pay.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team);
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
?>