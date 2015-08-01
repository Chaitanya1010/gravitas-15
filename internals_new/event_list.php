<?php
session_start();
if(isset($_SESSION["regno"]))
{
	$regno = $_GET["r"];
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
var regno = "<?php echo $regno ?>";
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
	xmlhttp.send("key="+val+"&type="+type+"&cart="+cart+"&regno="+regno);
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
	xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb+"&regno="+regno);

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
	xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb+"&regno="+regno);
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
	xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb+"&regno="+regno);
}
//home button
function back()
{
	window.location="event_list.php";
}
function payment(val)
{
	if(val==0)
		document.getElementById("dd").innerHTML="<div class='input-field col s4'><input type='text' id='rrno' name='rrno' placeholder='Receipt Number'><br></div>";
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
	if(pay=="0") // For card payment
	{
		var rrno = document.getElementById("rrno").value;
		if(rrno=="")
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
		xmlhttp.open("POST","card_pay.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team+"&rr="+rrno+"&regno="+regno);
	}
	else if(pay=="1") // For cash Payment
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
		xmlhttp.open("POST","cash_pay.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team+"&numb="+numb+"&regno="+regno);
	}
}
</script>
<body onload="search_events('body',0)" >
  <main>
	  <div id="register_events">
	   
	
		  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
				<img src="../gravitaslogo.png" alt class="responsive-img" style="margin-left:6.5em" width="350px">
				<h4 class="header light white-text">Internal Registration</h4>
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
 </script>
 <script>
 $(document).ready(function() {
    $('select').material_select();
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
$('.modal-trigger').leanModal();
    });
     });
  });
 </script>
 <script>
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

 </script>
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