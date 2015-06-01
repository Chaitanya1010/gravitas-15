<HTML>
<SCRIPT type="text/javascript">
var cart = new Array();
function search_events(val)
{
	var type = document.getElementsByName("type");
	for (var i = 0; i < type.length; i++) 
	{
		if (type[i].checked) 
			type = type[i].value;
	}
	if(type=="5")//combos
	{
		return;
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
function add_to_cart(id)
{
	if(cart[0]=='undefined')
		cart[0]=id;
	else
		cart[cart.length]=id;
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
	xmlhttp.send("cart="+cart);
	
}
function del_cart(id)
{
	cart.splice(id,1);
	search_events("body");
}
</SCRIPT>
<BODY onload='search_events("body")'>
<DIV id="search_bar">
<INPUT TYPE='radio' id='type'  name='type' value='0' onclick="search_events('body')">Premium
<INPUT TYPE='radio' id='type'  name='type' value='1' checked onclick="search_events('body')">Workshops
<INPUT TYPE='radio' id='type'  name='type'  value='2' onclick="search_events('body')">Technical
<INPUT TYPE='radio' id='type'  name='type' value='3' onclick="search_events('body')">Management
<INPUT TYPE='radio' id='type'  name='type' value='4' onclick="search_events('body')">Informal
<INPUT TYPE='radio' id='type'  name='type' value='5' onclick="search_events('body')">Combos<br>

<INPUT TYPE='text' id ='search' autocomplete ='off' onkeyup='search_events(this.value)' class='evesearch' placeholder='Search For Events...'>
</DIV>
Events<br>
<DIV id="events">
</DIV>
Cart<br>
<DIV id="cart">
</DIV>
</BODY>
</HTML>