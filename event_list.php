<!DOCTYPE html>
<html lang="en">
<head>
  <title>Events</title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
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
  else if(stype==0){
    type=stype;
  }
  else{
    type = stype.getAttribute('value');
  }
	if(val=="body")
		document.getElementById("search").value="";
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
  $('#cart').closeModal();
	//Refresh the cart after removing the event
	add_to_cart("refresh");
}

//To proceed to intermediate page
function proceed_1()
{
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
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("register_events").innerHTML=xmlhttp.responseText;
			search_events("body",'search');
			add_to_cart("refresh");
		}
	}
	xmlhttp.open("POST","event_list.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
  $('#cart').openModal();
}
function demand_draft()
{
	document.getElementById("dd").innerHTML="<input type='text' id='ddno' name='ddno' placeholder='DD number'>";
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
		if(ddno=="")
		{
			alert("Enter DD no");
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
		xmlhttp.send("cart="+cart+"&team="+team+"&dd="+ddno);
	}
	else if(pay=="1") // For Online Payment
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("pay").innerHTML=xmlhttp.responseText;
				document.getElementById("all").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","online_pay.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team);
	}
}
</script>

<body onload="search_events('body',0)">
  <div id="pay">
  <div id="register_events">
  <header class="header blue-grey darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
    <img src="gravitaslogo.png" alt class="responsive-img" width="350px">
    <h4 class="header light white-text">Events</h4>
  </header>

  <div id="all">
    <div class="row blue-grey darken-4" style="width:100%;padding-bottom:0.2em">
    <div class="col s12">
      <ul class="tabs blue-grey darken-4">
        <li class="tab col s2"><a href="#" class="white-text" id="type" name="type" value="0" onclick="search_events('body',this)">Premium</a></li>
        <li class="tab col s2"><a href="#" class="white-text" id="type" name="type" value="1" onclick="search_events('body',this)">Workshops</a></li>
        <li class="tab col s2"><a href="#" class="white-text" id="type" name="type" value="2" onclick="search_events('body',this)">Technical</a></li>
        <li class="tab col s2"><a href="#" class="white-text" id="type" name="type" value="3" onclick="search_events('body',this)">Management</a></li>
        <li class="tab col s2" id="type" name="type" value="0" onclick="search_events('body',this)"><a href="#" class="white-text" id="type" name="type" value="4" onclick="search_events('body',this)">Informal</a></li>
        <li class="tab col s2"><a href="#" class="white-text" id="type" name="type" value="5" onclick="search_events('body',this)">Combos</a></li>
      </ul>
    </div>
  </div>
  <div class="container row">
    <div class="col s12">
  <INPUT class="col s5" TYPE='text' id ='search' autocomplete ='off' onkeyup='search_events(this.value,"search")' class='evesearch' placeholder='Search For Events...'>&nbsp;
    <ul class="collapsible popout col s6" style="float:right" data-collapsible="accordion">
      <li>
      <div class="collapsible-header"><i class="material-icons">library_books</i>Registeder Events</div>
      <div class="collapsible-body"><?php require("registered_events.php"); ?></div>
    </li>
    </ul>
  </div>
  </div>
  <div id="events" class="container">
  </div>
</div>
</div>
<div id="cart" class="modal">

</div>
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="blue-grey darken-4 btn-large modal-trigger" href="#cart">
    Cart
		<i class="large material-icons">shopping_cart</i>
	</a>
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

 </script>
 </div>
</body>
</html>
