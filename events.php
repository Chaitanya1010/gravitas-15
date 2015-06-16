<HTML>
    <head>
        <link rel="stylesheet" type="text/css" href="css/materialize.css" media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>
    
    
<BODY onload='search_events("body")' class="blue">
  <nav class="white grey-text">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo grey-text">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#"><i class="mdi-action-search grey-text"></i></a></li>
        <li><a href="#"><i class="mdi-action-view-module grey-text"></i></a></li>
        <li><a href="#"><i class="mdi-navigation-refresh grey-text"></i></a></li>
        <li><a href="#"><i class="mdi-navigation-more-vert grey-text"></i></a></li>
      </ul>
    </div>
  </nav>
  
    <div class="container">
        <div class="row"></div>
        <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#premium">Premium</a></li>
        <li class="tab col s3"><a href="#workshops">Workshops</a></li>
        <li class="tab col s3"><a href="#technical">Technical</a></li>
        <li class="tab col s3"><a href="#management">Management</a></li>
        <li class="tab col s3"><a href="#informal">Informal</a></li>
      </ul>
    </div>
    <div id="premium" class="col s12">
            <div class="row">
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
              <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
               <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
 <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
               <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
      </div>
           
           <div class="row">
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
 <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
               <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
 <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
        <div class="col s3">
          <div class="card small">
            <div class="card-image">
              <img src="images/gat1.jpg">
              <span class="card-title">Event's name here</span>
            </div>
            <div class="card-content">
              <p>Some description here</p>
            </div>
            <div class="card-action">
               <a href="#"><i class="small mdi-action-add-shopping-cart"></i></a>
            </div>
          </div>
        </div>
      </div>
            </div>
    <div id="workshops" class="col s12">Workshops</div>
    <div id="technical" class="col s12">Technical events</div>
    <div id="management" class="col s12">Management</div>
    <div id="informal" class="col s12">Informal events</div>
  </div>
        
    </div>
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
<SCRIPT type="text/javascript">
<<<<<<< HEAD
var cart = new Array();
var team = new Array();
//To display the events in each type
//val - value typed in search box or "body" while refreshing the events list
function search_events(val)
{
	var type = document.getElementsByName("type");
	for (var i = 0; i < type.length; i++) 
	{
		if (type[i].checked) 
			type = type[i].value;
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
			search_events("body");
		}
	}
	xmlhttp.open("POST","add_to_cart.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("cart="+cart+"&team="+team);
	
}
=======
    var cart = new Array();
    var team = new Array();

    //To display the events in each type
    //val - value typed in search box or "body" while refreshing the events list
    function search_events(val) {
            var type = document.getElementsByName("type");
            for (var i = 0; i < type.length; i++) {
                if (type[i].checked)
                    type = type[i].value;
            }
            if (val == "body")
                document.getElementById("search").value = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("events").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "search_events.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("key=" + val + "&type=" + type + "&cart=" + cart);
        }
        //	To add an element to the cart and to refresh the cart after removing
    function add_to_cart(id) {
        if (id != "refresh") //refresh is used when an element is deleted from cart
        {
            cart[cart.length] = id;
            if (document.getElementById(id.concat("select")).tagName == 'LABEL') //Fixed team size
                team[team.length] = document.getElementById(id.concat("select")).innerHTML;
            else
                team[team.length] = document.getElementById(id.concat("select")).value; //Variable team size
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cart").innerHTML = xmlhttp.responseText;
                search_events("body");
            }
        }
        xmlhttp.open("POST", "add_to_cart.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("cart=" + cart + "&team=" + team);
>>>>>>> origin/master

    }

    //Delete an element from the cart
    function del_cart(id) {
        //This deletes the element w.r.t its index
        cart.splice(id, 1);
        team.splice(id, 1);
        //Refresh the list of events in that category
        search_events("body");
        //Refresh the cart after removing the event
        add_to_cart("refresh");
    }

    //To proceed to intermediate page
    function proceed_1() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("all").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST", "proceed_1.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("cart=" + cart + "&team=" + team);
    }

<<<<<<< HEAD
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
			}
		}
		xmlhttp.open("POST","online_pay.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cart="+cart+"&team="+team);
	}
}
</SCRIPT>

<BODY onload='search_events("body")'>
<div id='pay'>
<?php require("event_body.php");?>
<br><br>
Registered Events:<br><br>
<?php require("registered_events.php");?>
</div>
=======
    //Back to cart to edit
    function back() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("all").innerHTML = xmlhttp.responseText;
                search_events("body");
                add_to_cart("refresh");
            }
        }
        xmlhttp.open("POST", "event_body.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }

    function demand_draft() {
        document.getElementById("dd").innerHTML = "<input type='text' id='ddno' name='ddno' placeholder='DD number'>";
    }

    //checkout to payment gateway
    function checkout() {
        var pay;
        var p = document.getElementsByName("pay");
        for (var i = 0; i < p.length; i++) {
            if (p[i].checked)
                pay = p[i].value;
        }
        if (pay == "0") // For DD
        {
            var ddno = document.getElementById("ddno").value;
            if (ddno == "") {
                alert("Enter DD no");
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("all").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "demand_draft.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("cart=" + cart + "&team=" + team + "&dd=" + ddno);
        } else if (pay == "1") // For Online Payment
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("all").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "online_pay.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("cart=" + cart + "&team=" + team);
        }
    }
</SCRIPT>
<script>
    $( document ).ready(function(){
    $('ul.tabs').tabs();
        $(".button-collapse").sideNav();
    });
    
    </script>
    <?php require( "event_body.php");?>
>>>>>>> origin/master
</BODY>

</HTML>