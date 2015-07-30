<?php
session_start();
if(isset($_SESSION["id"]))
{
	$regno = $_SESSION["id"];
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
  <style>
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
    /* label underline focus color */
   .input-field input[type=password] {
     border-bottom: 1px solid #1a237e;
     box-shadow: 0 1px 0 0 #1a237e;
   }
   /* label underline focus color */
   .input-field input[type=password]:focus {
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

</head>
<script>
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
			var res=document.getElementById("events").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","search_events.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("key="+val+"&type="+type+"&cart="+cart);
	lastType = type;
}
function cart_initialize()
{
	var numb=100;
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("cart").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("cart").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","add_to_cart.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb);

}
//	To add an element to the cart and to refresh the cart after removing
function add_to_cart(id)
{
	var numb=100;
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
			var res=document.getElementById("cart").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
			search_events("body",'search');
		}
	}
	xmlhttp.open("POST","add_to_cart.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb);
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
	var numb=100;
	$('#cart').closeModal();
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("all").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("all").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","proceed_1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb);
}
//home button
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
				var res=document.getElementById("all").innerHTML;
				if(res.indexOf("dhS8!")>0)
				{
					window.location = 'index.php';
				}
			}
		}
		xmlhttp.open("POST","demand_draft.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team+"&dd="+ddno+"&bname="+bname+"&dd_date="+dd_date);
	}
	else if(pay=="1") // For Online Payment
	{
		var numb=100;
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("pay").innerHTML=xmlhttp.responseText;
				document.getElementById("all").innerHTML=xmlhttp.responseText;//except registered events
				var res=document.getElementById("all").innerHTML;
				if(res.indexOf("dhS8!")>0)
				{
					window.location = 'index.php';
				}
				document.getElementById("form").submit();
			}
		}
		xmlhttp.open("POST","online_pay.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb);
	}
}
function change_pass()
{
	document.getElementById("all").innerHTML="<br><br><div class='container'>Please give your Password!<br/><div class='card hoverable'><div class='input-field'><label for='pass1'>Password:</label><input type='password' id='pass1' name='pass1'></div><br/><div class='input-field'><label for='pass2'>Re-type Password:</label><input type='password' id='pass2' name='pass2'></div><input type='hidden' value='<?php echo $regno ?>' id='regno' name='regno'><br><div class='input-field'><button type='submit'onclick='submit_pword()'class='btn waves-effect waves-light indigo darken-2 right'><i class='material-icons right'>send</i>Reset</button></div></div></div>";
}
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
			var res=xmlhttp.responseText;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
			Materialize.toast(xmlhttp.responseText, 3000, 'rounded',function(){window.location="index.php"});
		}
	}
	xmlhttp.open("POST","submit_pword.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("p="+p1+"&r="+regno);
}
</script>
<body onload="search_events('body',0)" >
  <main>
	  <div id="register_events">
	    <div class="fixed-action-btn" style="bottom:30px; left:20px">Logout<br/>
		<a class="red btn-floating btn-large waves-effect z-depth-3"  style="left:-9px" title="Logout" href="logout.php">
			<i class="material-icons">power_settings_new</i>
		</a>
		</div>
		<div class="fixed-action-btn" style="bottom:30px; left:95px">Home<br/>
		<a class="red btn-floating btn-large waves-effect z-depth-3"  style="left:-8px" title="Home" href="event_list.php">
			<i class="material-icons">home</i>
		</a>
		</div>
		  <div class="fixed-action-btn" style="bottom:30px; left:150px">Change Password<br/>
		<button class="red btn-floating btn-large waves-effect z-depth-3"  style="left:20px" title="Change Password" onclick="change_pass()">
			<i class="material-icons">settings</i>
		</button>
		</div>
	
		  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
				<img src="../gravitaslogo.png" alt class="responsive-img" style="margin-left:6.5em" width="350px">
				<h4 class="header light white-text">External Registration</h4>
		  </header>
		  <div id="all">
			<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
			<div class="col s12">
			  <ul class="tabs indigo darken-2">
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="0" onclick="search_events('body',this)">Premium</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="1" onclick="search_events('body',this)">Workshops</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="2" onclick="search_events('body',this)">Technical</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="3" onclick="search_events('body',this)">Management</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="4" onclick="search_events('body',this)">Informal</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="5" onclick="search_events('body',this)">Combos</a></li>
					<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="6" onclick="search_events('body',this)">Accomodation</a></li>
			  </ul>
			</div>
			
		  </div>

		 <div class="container row">
			<div class="col s12">
				<div class="input-field col s5">
					<input type='text' id ='search' autocomplete ='off' onkeyup='search_events(this.value,"search")' class='evesearch'><label for="search">Search For Events..</label>
				</div>&nbsp;
				<ul class="collapsible popout col s6" style="float:right" data-collapsible="accordion">
				<li>
					<div class="collapsible-header indigo lighten-5 black-text waves-effect"><i class="material-icons ">library_books</i><i class="material-icons right ">more_vert</i>Registered Details</div>
					<div class="collapsible-body"><?php require("registered_events.php"); ?></div>
				</li>
				</ul>
			</div>
		</div>
		<div id="events" class="container">
		</div>
		<div class=" fixed-action-btn" style="bottom: 30px; right: 24px;">My Cart<br>
			<a class="red btn-floating btn-large waves-effect modal-trigger z-depth-3" title="Event Cart" href="#cart">
				<i class="large material-icons">shopping_cart</i>
			</a>
		</div>
		<div id="cart" class="modal">
		</div>
		</div>
	</div>
<script>
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
<<<<<<< HEAD
 </script>
 <script>
=======
</script>
<script>
>>>>>>> origin/master
 $(document).ready(function() {
    $('select').material_select();
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
$('.modal-trigger').leanModal();
    });
     });
  });
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

<<<<<<< HEAD
 </script>
=======
  });
</script>
>>>>>>> origin/master
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
<?php
}
else
{
	session_unset();
	session_destroy();
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Location:index.php");
	exit();
}
?>