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

var t_1=0,t_2=0,c_1_t_1=0,c_1_t_2=0,c_2_t_1=0,c_3_t_1=0,c_3_t_2=0;
var size_t_1=0,size_t_2=0,size_c_1_t_1=0,size_c_1_t_2=0,size_c_2_t_1=0,size_c_3_t_1=0,size_c_3_t_2=0;
var count_3 = 0;
var count_7 = 0;
var regno='',numb='',blck_name='',room_no='',paid_status=0,sum_total=0;
var combo = new Array();
function reg_go(paid_status_1)
{
	regno = document.getElementById("regno").value;
	numb = document.getElementById("phno").value;
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	blck_name = document.getElementById("blck_name").value;
	room_no = document.getElementById("room_no").value;
	paid_status=paid_status_1;
	if(regno.match(pattern)&&(numb.length==10)&&(blck_name!='')&&(room_no!=''))
	{
		for(i=1;i<=5;i++)
		{
			if(i==1)
			{
				if(document.getElementById(i).checked)
				{
					t_1=1;
					var e_1 = document.getElementById('size_1');
					size_t_1 = e_1.options[e_1.selectedIndex].value;
				}
			}
			if(i==2)
			{
				if(document.getElementById(i).checked)
				{
					t_2=1;
					var e_1 = document.getElementById('size_2');
					size_t_2 = e_1.options[e_1.selectedIndex].value;
				}
			}
			if(i==3)
			{
				if(document.getElementById(i).checked)
				{
					c_1_t_1=1;
					var e_1 = document.getElementById('size_3');
					size_c_1_t_1 = e_1.options[e_1.selectedIndex].value;

					c_1_t_2=1;
					var e_1 = document.getElementById('size_4');
					size_c_1_t_2 = e_1.options[e_1.selectedIndex].value;
				}
			}
			if(i==4)
			{
				if(document.getElementById(i).checked)
				{
					c_2_t_1=1;
					var e_1 = document.getElementById('size_5');
					size_c_2_t_1 = e_1.options[e_1.selectedIndex].value;
				}
			}
			if(i==5)
			{
				if(document.getElementById(i).checked)
				{
					c_3_t_1=1;
					var e_1 = document.getElementById('size_6');
					size_c_3_t_1 = e_1.options[e_1.selectedIndex].value;

					c_3_t_2=1;
					var e_1 = document.getElementById('size_7');
					size_c_3_t_2 = e_1.options[e_1.selectedIndex].value;
				}
			}
		}//end of for XML call from here

		if((c_2_t_1==0)&&(c_3_t_1==0))//no combos
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					//document.getElementById("pay").innerHTML=xmlhttp.responseText;
					document.getElementById("body").innerHTML=xmlhttp.responseText;//except registered events
					var res=document.getElementById("body").innerHTML;
					if(res.indexOf("dhS8!")>0)
					{
						window.location = 'index.php';
					}
				}
			}
			xmlhttp.open("POST","submit_no_combo.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("numb="+numb+"&regno="+regno+"&blck_name="+blck_name+"&room_no="+room_no+"&paid_status="+paid_status+"&t_1="+t_1+"&t_2="+t_2+"&c_1_t_1="+c_1_t_1+"&c_1_t_2="+c_1_t_2+"&c_2_t_1="+c_2_t_1+"&c_3_t_1="+c_3_t_1+"&c_3_t_2="+c_3_t_2+"&size_t_1="+size_t_1+"&size_t_2="+size_t_2+"&size_c_1_t_1="+size_c_1_t_1+"&size_c_1_t_2="+size_c_1_t_2+"&size_c_2_t_1="+size_c_2_t_1+"&size_c_3_t_1="+size_c_3_t_1+"&size_c_3_t_2="+size_c_3_t_2+"&amount="+sum_total);
		}
		else
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					//document.getElementById("pay").innerHTML=xmlhttp.responseText;
					document.getElementById("body").innerHTML=xmlhttp.responseText;//except registered events
					var res=document.getElementById("body").innerHTML;
					if(res.indexOf("dhS8!")>0)
					{
						window.location = 'index.php';
					}
				}
			}
			xmlhttp.open("POST","combo.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("numb="+numb+"&paid_status="+paid_status);
		}
	}
	else
	{
		Materialize.toast("Enter all details!!",3000,"rounded");
		return false;
	}
}

function isNumber(evt)
{
		var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
        return true;
}



function select_combo()
{
	var c1=0;
	var c2=0;
	var co = document.getElementsByName("combo_cato");
	var ct = document.getElementsByName("combo_catt");
	var k = 0;
	for(var n=0;n<co.length;n++)
	{
		if(co[n].checked)
		{
			c1++;
			combo[k] = co[n].value;
			k++;
		}
	}
	for(var m=0;m<ct.length;m++)
	{
		if(ct[m].checked)
		{
			c2++;
			combo[k] = ct[m].value;
			k++;
		}
	}
	if(c1+c2!=10)
	{
		Materialize.toast("Select 10 Workshops!","3000","rounded");
		return false;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("body").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("body").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","proceed_1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("numb="+numb+"&regno="+regno+"&blck_name="+blck_name+"&room_no="+room_no+"&paid_status="+paid_status+"&t_1="+t_1+"&t_2="+t_2+"&c_1_t_1="+c_1_t_1+"&c_1_t_2="+c_1_t_2+"&c_2_t_1="+c_2_t_1+"&c_3_t_1="+c_3_t_1+"&c_3_t_2="+c_3_t_2+"&size_t_1="+size_t_1+"&size_t_2="+size_t_2+"&size_c_1_t_1="+size_c_1_t_1+"&size_c_1_t_2="+size_c_1_t_2+"&size_c_2_t_1="+size_c_2_t_1+"&size_c_3_t_1="+size_c_3_t_1+"&size_c_3_t_2="+size_c_3_t_2+"&combo="+combo+"&amount="+sum_total);
}


function checkbox_3(id)
{
	//alert("3");
	if(document.getElementById(id).checked)
		count_3++;
	else
		count_3--;
	if((count_3>3)||(count_7+count_3>10))
	{
		document.getElementById(id).checked = false;
		count_3--;
	}
}
function checkbox_7(id)
{
	//alert("7");
	if(document.getElementById(id).checked)
		count_7++;
	else
		count_7--;
	if(count_7+count_3>10)
	{
		document.getElementById(id).checked = false;
		count_7--;
	}
}

function checkbox_sales(id)
{
	var total=0;
	for(i=1;i<=5;i++)
	{
		if(i==1)
			if(document.getElementById(i).checked)
				total+=249;
		if(i==2)
			if(document.getElementById(i).checked)
				total+=499;
		if(i==3)
			if(document.getElementById(i).checked)
				total+=555;
		if(i==4)
			if(document.getElementById(i).checked)
				total+=4000;
		if(i==5)
			if(document.getElementById(i).checked)
				total+=5555;
	}
	sum_total=total;
	document.getElementById('total_sum').innerHTML='Total :'+total;
}
// Adding part is done

//Making payement
function make_payement()
{
	var numb=100;
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("body").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("body").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","make_payement.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("numb="+numb);
}

function search_person()
{
	var numb=100;
	var value = document.getElementById('id_search').value;
	//var s=confirm("Do you want to approve the transaction?");
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("search_results").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("search_results").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","search_for_payement.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}

function approve_payement(id)
{
	var numb=100;
	var s=confirm("Do you want to approve the transaction?");
	if(s)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("button_payement_"+id).innerHTML=xmlhttp.responseText;
				var res=document.getElementById("button_payement_"+id).innerHTML;
				if(res.indexOf("dhS8!")>0)
				{
					window.location = 'index.php';
				}
			}
		}
		xmlhttp.open("POST","approve_payement.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+id);
	}
}
//searching and approving is done

function make_delivery()
{
	var numb=100;
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("body").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("body").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","make_delivery.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("numb="+numb);
}

function search_person_del()
{
	var numb=100;
	var value = document.getElementById('id_search').value;
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("search_results").innerHTML=xmlhttp.responseText;
				var res=document.getElementById("search_results").innerHTML;
				if(res.indexOf("dhS8!")>0)
				{
					window.location = 'index.php';
				}
			}
		}
		xmlhttp.open("POST","search_for_delivery.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value);
}


function approve_delivery(id)
{
	var numb=100;
	//var s=confirm("Do you want to approve the transaction?");
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("button_delivery_"+id).innerHTML=xmlhttp.responseText;
			var res=document.getElementById("button_delivery_"+id).innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'index.php';
			}
		}
	}
	xmlhttp.open("POST","approve_delivery.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+id);
}

</script>
<body>
  <main>
	  <div id="register_events">


		  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
				<img src="../gravitaslogo.png" alt class="responsive-img" style="margin-left:6.5em" width="350px">
				<h4 class="header light white-text">Sales Registration</h4>
		  </header>
		  	<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
				<div class="col s12">
				  <ul class="tabs indigo darken-2">
						<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="0">Place Order</a></li>
						<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="1" onclick="make_payement()">Make payement</a></li>
						<li class="tab col s2"><a href="#" class="white-text waves-effect" id="type" name="type" value="2" onclick="make_delivery()">Make delivery</a></li>
				  </ul>
				</div>
		  </div>
		  <div id="body">
	  		<div class ="container">
	  			<div class="card hoverable">
            <div class='container'>
              <div class='row'>
					<div class="input-field col s12 m6">
						<label for="regno">Registration Number</label><input type='text' name='regno' id='regno' autocomplete='off' maxlength='9'>
					</div>
					<div class="input-field col s12 m6">
						<label for="phno">Phone Number</label><input type='text' name='phno' id='phno' maxlength="10" autocomplete='off' onkeypress="return isNumber(event)">
					</div>
					<div class="input-field col s12 m6">
						<label for="blck_name">Block Name</label><input type='text' name='blck_name' id='blck_name' maxlength="10" autocomplete='off' onkeypress="return isAlpha(event)">
					</div>
					<div class="input-field col s12 m6">
						<label for="room_no">Room Number</label><input type='text' name='room_no' id='room_no' maxlength="4" autocomplete='off' onkeypress="return isNumber(event)">
					</div>
        </div>
        </div>
				</div>
			</div>

		 <div class="container row">
			<div class="col s12">
        <div class='container'>
				<div class="input-field col s12">
					<table class="striped hoverable black-text">
						<tr>
							<td>
								<input type='checkbox' id='1' name='sales' value='1' onchange='checkbox_sales(this.id)'><label for='1'>Round Neck</label>
							</td>
							<td>
								<select id='size_1' class='browser-default' class='col s12 m6' name='size_1'>
									<option value='S'>Small</option>
									<option value='M'>Medium</option>
									<option value='L'>Large</option>
									<option value='XL'>Extra Large</option>
									<option value='XXL'>Double Extra Large</option>
								</select>
							</td>
							<td>
								<p class="heavy black-text">249 INR</p>
							</td>
						</tr>
						<tr>
							<td>
								<input type='checkbox' id='2' name='sales' value='2' onchange='checkbox_sales(this.id)'><label for='2'>Polo T-Shirt</label>
							</td>
							<td>
								<select id='size_2' class='browser-default' class='col s12 m6' name='size_2'>
									<option value='S'>Small</option>
									<option value='M'>Medium</option>
									<option value='L'>Large</option>
									<option value='XL'>Extra Large</option>
									<option value='XXL'>Double Extra Large</option>
								</select>
							</td>
							<td>
								<p class="heavy black-text">499 INR</p>
							</td>
						</tr>
						<tr>
							<td>
								<input type='checkbox' id='3' name='sales' value='3' onchange='checkbox_sales(this.id)'><label for='3'>Combo 1</label>
							</td>
							<td>
								<select id='size_3' class='browser-default' class='col s12 m6' name='size_3'>
									<option value='S'>Small</option>
									<option value='M'>Medium</option>
									<option value='L'>Large</option>
									<option value='XL'>Extra Large</option>
									<option value='XXL'>Double Extra Large</option>
								</select></br>
								<select id='size_4' class='browser-default' class='col s12 m6' name='size_4'>
									<option value='S'>Small</option>
									<option value='M'>Medium</option>
									<option value='L'>Large</option>
									<option value='XL'>Extra Large</option>
									<option value='XXL'>Double Extra Large</option>
								</select>
							</td>
							<td>
								<p class="heavy black-text">555 INR</p>
							</td>
						</tr>
						<tr>
							<td>
								<input type='checkbox' id='4' name='sales' value='4' onchange='checkbox_sales(this.id)' onchange='checkbox_sales(this.id)'><label for='4'>Combo 2</label>
							</td>
							<td>
								<p class="light black-text">10 Workshops + Round Neck</p></br>
								<select id='size_5' class='browser-default' class='col s12 m6' name='size_5'>
									<option value='S'>Small</option>
									<option value='M'>Medium</option>
									<option value='L'>Large</option>
									<option value='XL'>Extra Large</option>
									<option value='XXL'>Double Extra Large</option>
								</select>

							</td>
							<td>
								<p class="heavy black-text">4000 INR</p>
							</td>
						</tr>
						<tr>
							<td>
								<input type='checkbox' id='5' name='sales' value='5' onchange='checkbox_sales(this.id)' onchange='checkbox_sales(this.id)'><label for='5'>Combo 3</label>
							</td>
							<td>
								<select id='size_6' class='browser-default' class='col s12 m6' name='size_6'>
									<option value='S'>Small</option>
									<option value='M'>Medium</option>
									<option value='L'>Large</option>
									<option value='XL'>Extra Large</option>
									<option value='XXL'>Double Extra Large</option>
								</select></br>
								<select id='size_7' class='browser-default' class='col s12 m6' name='size_7'>
									<option value='S'>Small</option>
									<option value='M'>Medium</option>
									<option value='L'>Large</option>
									<option value='XL'>Extra Large</option>
									<option value='XXL'>Double Extra Large</option>
								</select>
							</td>
							<td>
								<p class="heavy black-text">5555 INR</p>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<p class="heavy black-text" id='total_sum'>Total:</p>
							</td>
					</table>
				</div>&nbsp;
</div>
			</div>
		</div>
				<div class ="input-field">
					<button onclick='return reg_go(1)' class="right waves-effect waves-light indigo darken-2 btn z-depth-3">Pay Now<i class="material-icons right">send</i> </button></br></br>
					<button onclick='return reg_go(0)' class="right waves-effect waves-light indigo darken-2 btn z-depth-3">Pay Later<i class="material-icons right">send</i> </button>
				</div>

		</div>
	</div>
	</div>
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
    <div class="container">
       <a class='modal-trigger white-text right' href='#credits'>Meet the developers</a>
      		<a class="red btn waves-effect z-depth-3 "  title="Logout" href="logout.php">
			<i class="material-icons">power_settings_new</i>
		</a>
			<a class="red btn waves-effect z-depth-3"  title="Home" href="event_list.php">
			<i class="material-icons">home</i>
		</a>
      </div>
  </div>
</footer>
<div id="credits" class="modal">
  <div class="modal-content" style='padding:0'>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-image">
            <img src="credits.jpg">
            <span class="card-title">Developers</span>
          </div>
          <div class="card-content" style='padding:0'>
            <div class='row'>
              <div class='col s6'>
              <h5 class='header light'><a href="https://in.linkedin.com/pub/chaitanya-tetali/86/763/aa2" target='_blank'>Tetali Chaitanya</a></h5>
                Back End
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://www.linkedin.com/in/rajalakshmisenthil" target='_blank'>Rajalakshmi Senthil</a></h5>
                Back End
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://in.linkedin.com/in/shubhodeep9" target='_blank'>Shubhodeep Mukherjee</a></h5>
                Front End
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</footer>
</body>
</html>
<?php
}
else
{
	session_start();
	session_unset();
	session_destroy();
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Location:index.php");
	exit();
}
?>
