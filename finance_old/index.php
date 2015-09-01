<?php
	session_start();
	if(isset($_SESSION['name_fin']))//session_variable
	{
		$mode=$_SESSION['mode'];
    	{
          if($mode!=0)
          {
            session_unset();
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            session_destroy();
            header("Location:login_approve.php");
          }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GraVITas'15</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
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
	label {
		color: #1a237e;
	}
	/* label focus color */
	input[type=text]:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	input[type=text] {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	input[type=text]:focus {
		border-bottom: 1px solid #303f9f;
		box-shadow: 0 1px 0 0 #303f9f;
	}
	.input-field input[type=password]:focus + label {
		color: #303f9f;
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
	.input-field textarea:focus + label {
		color: #303f9f;
	}
	/* label underline focus color */
	.input-field textarea {
		border-bottom: 1px solid #1a237e;
		box-shadow: 0 1px 0 0 #1a237e;
	}
	/* label underline focus color */
	 textarea:focus {
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
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

</head>
<body>
<main>
<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
	<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
	<h4 class="header light white-text">Finance Portal</h4>
	<a class="indigo darken-1 btn waves-effect z-depth-3 right"   title="Logout" href="logout.php">
		<i class="material-icons">power_settings_new</i>
	</a>
	<br />
</header>
<div class="row indigo darken-2" style="width:100%;padding-bottom:0.2em">
<div class="col s12">
	<ul class="tabs indigo darken-2">
		<li class="tab col s2"><a href="#" class="white-text waves-effect" onclick="ext_registrations()">External Registrations</a></li>
		<li class="tab col s2"><a href="#" class="white-text waves-effect" onclick="int_registrations()">Internals</a></li>
		<li class="tab col s2"><a href="#" class="white-text waves-effect" onclick="revenue()">Revenue</a></li>
		<li class="tab col s2"><a href="#" class="white-text waves-effect" onclick="expenses()">Expenses</a></li>
	</ul>
</div>

</div>
			<!-- <a href='logout.php' title='Logout'>Log-out</a></br></br> -->



		<div id='select_option'>
			<button class='btn-floating btn-medium waves-effect waves-light indigo darken-4 right' onclick='ext_registrations_excel();' style='margin-right:2em'><i class='material-icons'>play_for_work</i></button></br>
			<div class='container'>
			<div class='card'>
				<div class='card-content'>
					<div class='row'>
						<div class='input-field col s12 m4'>
							<label for='update_ext_id'>ID updated</label>
							<input type='text' name='update_ext_id'  id='update_ext_id' autocomplete='off' onkeypress='return isNumber(event)'>
						</div>
						<div class='input-field col s12 m4'>
							<label for='amount_external'>Amount from Externals</label>
							<input type='text' name='amount_external'  id='amount_external' autocomplete='off' onkeypress='return isNumber(event)'>
						</div>
						<div class='input-field col s12 m4'>
							<label for='number_external'>Number of External Participants</label>
							<input type='text' name='number_external' id='number_external' autocomplete='off' onkeypress='return isNumber(event)'>
						</div>
					</div>
					<div class='row'>
						<div class='input-field col s12 m8'>
							<label for='update_ext_date'>Date Updated</label>
			 				<input type='date' name='update_ext_date' class='datepicker' id='update_ext_date' autocomplete='off'>
						</div>
					</div>
					<div class='row'>
						<div class='input-field col s12'>

			 			<textarea name='remarks_external' rows='5' cols='50' id='remarks_external' class='materialize-textarea'  autocomplete='off'></textarea>
						<label for='remarks_external'>Remarks</label>
					</div>
				</div>
			<button type="submit" onclick="submit_external();" class="btn waves-effect waves-light indigo darken-4">
			  <i class="material-icons right">send</i> Submit
			  </button>

		</div>
		</div>
<script>
$(document).ready(function() {



});
$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 15
});
</script>
</div>
		</div>
		<?php
	}
	else
  	{
      session_unset();
      session_destroy();
      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
      header("Location:login_approve.php");
  	}
?>


<script type="text/javascript">

/*Sponsorship calls starts*/

//	General calls start

function notify_me(id)
{
	if(id==1)
	{
		sponsorship();
		return;
	}

	else if(id==2)//Yet to do
	{
		accomodation_revenue();
		return;
	}

	else if(id==3)
	{
		stall_rent_revenue();
		return;
	}

	else if(id==4)
	{
		t_shirts_revenue();
		return;
	}

	else if(id==5)
	{
		workshops_revenue();
		return;
	}

	else if(id==6)
	{
		others_revenue();
		return;
	}
}

function revenue()	//index.php -> revenue_select.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_option").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  xmlhttp.open("GET","revenue_select.php?id="+id_numb,true);
  xmlhttp.send();
}


function total()	//change CSS properties accordingly
{
	var note_1000 = document.getElementById('note_1000').value;
	var note_500 = document.getElementById('note_500').value;
	var note_100 = document.getElementById('note_100').value;
	var note_50 = document.getElementById('note_50').value;
	var note_20 = document.getElementById('note_20').value;
	var note_10 = document.getElementById('note_10').value;
	var note_5 = document.getElementById('note_5').value;
	var note_2 = document.getElementById('note_2').value;
	var note_1 = document.getElementById('note_1').value;

	var total=(note_1000*1000)+(note_500*500)+(note_100*100)+(note_50*50)+(note_20*20)+(note_10*10)+(note_5*5)+(note_2*2)+(note_1*1)
	document.getElementById("denomination_total").innerHTML=total;
}

//display the more options for mode of payement
function method_pay(id)	//sponsor_add.php -> view_more_sponsors_modes.php
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("more_credit_options").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("more_credit_options").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  xmlhttp.open("GET","view_more_sponsors_modes.php?id="+id,true);
  xmlhttp.send();
}

//General call ends


///Sponsorship starts

function sponsorship()	//revenue_select.php -> sponsor_add.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  xmlhttp.open("GET","sponsor_add.php?id="+id_numb,true);
  xmlhttp.send();
}


//save all the data and check if everything is inputted or not

function submit_sponsor()//  sponsor_add.php -> sponsor_submit_data
{
	var e_1 = document.getElementById('event_prize_names_spon');
	var event_name = e_1.options[e_1.selectedIndex].value;

	var company_name= document.getElementById('company_name').value;
	var amount= document.getElementById('amount').value;
	var phno= document.getElementById('phno').value;
	var email_id= document.getElementById('email_id').value;
	var remarks= document.getElementById('remarks_sponsor').value;
	var mode= document.getElementsByName('mode');
	var selected=99;

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if((email_id=="")||(!email_id.match(mailformat))||(phno.length!=10)||(remarks=='')||(event_name=='')||(company_name=='')||(amount==''))
	{
		alert("Please enter all valid details");
		return false;
	}
	
	for(var i=0;i<=3;i++)
	{
		if(mode[i].checked)
		{
			selected=i;
			break;
		}
	}
	if(selected==99)
	{
		alert('No options selected');
		return;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}

	if(selected==0)
	{
		var total_1=document.getElementById('denomination_total').innerHTML;
		var total_2=document.getElementById('amount').value;
		total_1=parseInt(total_1);
		total_2=parseInt(total_2);

		if(total_2!=total_1)
		{
			alert("Please Enter correct domination for given money!!");
			return false;
		}
		var note_1000 = document.getElementById('note_1000').value;
		var note_500 = document.getElementById('note_500').value;
		var note_100 = document.getElementById('note_100').value;
		var note_50 = document.getElementById('note_50').value;
		var note_20 = document.getElementById('note_20').value;
		var note_10 = document.getElementById('note_10').value;
		var note_5 = document.getElementById('note_5').value;
		var note_2 = document.getElementById('note_2').value;
		var note_1 = document.getElementById('note_1').value;

		xmlhttp.open("GET","sponsor_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
  		xmlhttp.send();
  		return;
	}

	else if(selected==1)
	{
		var dd_numb = document.getElementById('dd_number').value;
		var bank_name_dd = document.getElementById('bank_name_dd').value;
		var branch_name_dd = document.getElementById('branch_name_dd').value;
		var issue_date_dd = document.getElementById('issue_date_dd').value;

		if((dd_numb=='')||(bank_name_dd=='')||(branch_name_dd=='')||(issue_date_dd==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","sponsor_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&dd_numb="+dd_numb+"&branch_name_dd="+branch_name_dd+"&bank_name_dd="+bank_name_dd+"&issue_date_dd="+issue_date_dd,true);
		xmlhttp.send();
  		return;
	}

	else if(selected==2)
	{
		var cheque_numb = document.getElementById('cheque_number').value;
		var bank_name_chq = document.getElementById('bank_name_chq').value;
		var branch_name_chq = document.getElementById('branch_name_chq').value;
		var issue_date_chq = document.getElementById('issue_date_chq').value;

		if((cheque_numb=='')||(bank_name_chq=='')||(branch_name_chq=='')||(issue_date_chq==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","sponsor_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&cheque_numb="+cheque_numb+"&branch_name_chq="+branch_name_chq+"&bank_name_chq="+bank_name_chq+"&issue_date_chq="+issue_date_chq,true);
		xmlhttp.send();
  		return;
	}

	else if(i==3)
	{
		var trans_id = document.getElementById('trans_id').value;
		var bank_name_net = document.getElementById('bank_name_net').value;
		var issue_date_net = document.getElementById('issue_date_net').value;

		if((trans_id=='')||(bank_name_net=='')||(issue_date_net==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","sponsor_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&trans_id="+trans_id+"&bank_name_net="+bank_name_net+"&issue_date_net="+issue_date_net,true);
		xmlhttp.send();
  		return;
	}
}
/*Sponsorship calls ends*/



/*accomodation starts*/
function accomodation_revenue() //revenue_select.php -> accomodation_add.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
	xmlhttp.open("GET","accomodation_add.php?id="+id_numb,true);
	xmlhttp.send();
}


function submit_add_accomodation()  //accomodation_add.php -> add_accomodation_submit_data.php
{
	var purpose_stall_add= document.getElementById('event_acco_add').value;
	var stall_person_name_add= document.getElementById('inst_name_add').value;
	var amount_stall_add= document.getElementById('amount_acco_add').value;
	var phno_stall_add= document.getElementById('phno_acco_add').value;
	var numb_days=document.getElementById('numb_days_acco_add').value;
	var remarks= document.getElementById('remarks_acco_add').value;
	var mode= document.getElementsByName('mode');
	var selected=99;

	if((purpose_stall_add=="")||(stall_person_name_add=='')||(phno_stall_add.length!=10)||(remarks=='')||(amount_stall_add=='')||(numb_days=='')||(amount==''))
	{
		alert("Please enter all valid details");
		return false;
	}

	for(var i=0;i<1;i++)
	{
		if(mode[i].checked)
		{
			selected=i;
			break;
		}
	}

	if(selected==99)
	{
		alert('No options selected');
		return false;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}

	if(selected==0)
	{
		var total_1=document.getElementById('denomination_total').innerHTML;
		//var total_2=document.getElementById('amount_stall_add').value;
		total_1=parseInt(total_1);
		total_2=parseInt(amount_stall_add);

		if(total_2!=total_1)
		{
			alert("Please Enter correct domination for given money!!");
			return;
		}
		var note_1000 = document.getElementById('note_1000').value;
		var note_500 = document.getElementById('note_500').value;
		var note_100 = document.getElementById('note_100').value;
		var note_50 = document.getElementById('note_50').value;
		var note_20 = document.getElementById('note_20').value;
		var note_10 = document.getElementById('note_10').value;
		var note_5 = document.getElementById('note_5').value;
		var note_2 = document.getElementById('note_2').value;
		var note_1 = document.getElementById('note_1').value;

		xmlhttp.open("GET","add_accomodation_submit_data.php?e_name="+purpose_stall_add+"&numb_days="+numb_days+"&c_name="+stall_person_name_add+"&amount="+amount_stall_add+"&phno="+phno_stall_add+"&remarks="+remarks+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
  		xmlhttp.send();
  		return;
	}

}

/*Accomodation ends*/



///Stall starts

function stall_rent_revenue()	//revenue_select.php -> stall_rent_add.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
      		if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  xmlhttp.open("GET","stall_rent_add.php?id="+id_numb,true);
  xmlhttp.send();
}


function submit_add_stall() //stall_rent_add.php->add_stall_submit_data.php
{
	var purpose_stall_add= document.getElementById('purpose_stall_add').value;
	var stall_person_name_add= document.getElementById('stall_person_name_add').value;
	var amount_stall_add= document.getElementById('amount_stall_add').value;
	var phno_stall_add= document.getElementById('phno_stall_add').value;
	var remarks= document.getElementById('remarks_add_stall').value;
	var numb_days=document.getElementById('numb_days_stall_add').value;
	var mode= document.getElementsByName('mode');
	var selected=99;

	if((purpose_stall_add=="")||(stall_person_name_add=='')||(phno_stall_add.length!=10)||(remarks=='')||(amount_stall_add=='')||(numb_days=='')||(amount_stall_add==''))
	{
		alert("Please enter all valid details");
		return false;
	}	

	for(var i=0;i<=3;i++)
	{
		if(mode[i].checked)
		{
			selected=i;
			break;
		}
	}

	if(selected==99)
	{
		alert('No options selected');
		return;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}

	if(selected==0)
	{
		var total_1=document.getElementById('denomination_total').innerHTML;
		var total_2=document.getElementById('amount_stall_add').value;
		total_1=parseInt(total_1);
		total_2=parseInt(total_2);

		if(total_2!=total_1)
		{
			alert("Please Enter correct domination for given money!!");
			return;
		}
		var note_1000 = document.getElementById('note_1000').value;
		var note_500 = document.getElementById('note_500').value;
		var note_100 = document.getElementById('note_100').value;
		var note_50 = document.getElementById('note_50').value;
		var note_20 = document.getElementById('note_20').value;
		var note_10 = document.getElementById('note_10').value;
		var note_5 = document.getElementById('note_5').value;
		var note_2 = document.getElementById('note_2').value;
		var note_1 = document.getElementById('note_1').value;

		xmlhttp.open("GET","add_stall_submit_data.php?e_name="+purpose_stall_add+"&numb_days="+numb_days+"&c_name="+stall_person_name_add+"&amount="+amount_stall_add+"&phno="+phno_stall_add+"&remarks="+remarks+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
  		xmlhttp.send();
  		return;
	}

	else if(selected==1)
	{
		var dd_numb = document.getElementById('dd_number').value;
		var bank_name_dd = document.getElementById('bank_name_dd').value;
		var branch_name_dd = document.getElementById('branch_name_dd').value;
		var issue_date_dd = document.getElementById('issue_date_dd').value;

		if((dd_numb=='')||(bank_name_dd=='')||(branch_name_dd=='')||(issue_date_dd==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","add_stall_submit_data.php?e_name="+purpose_stall_add+"&numb_days="+numb_days+"&c_name="+stall_person_name_add+"&amount="+amount_stall_add+"&phno="+phno_stall_add+"&remarks="+remarks+"&mode="+selected+"&dd_numb="+dd_numb+"&branch_name_dd="+branch_name_dd+"&bank_name_dd="+bank_name_dd+"&issue_date_dd="+issue_date_dd,true);
		xmlhttp.send();
  		return;
	}

	else if(selected==2)
	{
		var cheque_numb = document.getElementById('cheque_number').value;
		var bank_name_chq = document.getElementById('bank_name_chq').value;
		var branch_name_chq = document.getElementById('branch_name_chq').value;
		var issue_date_chq = document.getElementById('issue_date_chq').value;

		if((cheque_numb=='')||(bank_name_chq=='')||(branch_name_chq=='')||(issue_date_chq==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","add_stall_submit_data.php?e_name="+purpose_stall_add+"&numb_days="+numb_days+"&c_name="+stall_person_name_add+"&amount="+amount_stall_add+"&phno="+phno_stall_add+"&remarks="+remarks+"&mode="+selected+"&cheque_numb="+cheque_numb+"&branch_name_chq="+branch_name_chq+"&bank_name_chq="+bank_name_chq+"&issue_date_chq="+issue_date_chq,true);
		xmlhttp.send();
  		return;
	}

	else if(i==3)
	{
		var trans_id = document.getElementById('trans_id').value;
		var bank_name_net = document.getElementById('bank_name_net').value;
		var issue_date_net = document.getElementById('issue_date_net').value;

		if((trans_id=='')||(bank_name_net=='')||(issue_date_net==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","add_stall_submit_data.php?e_name="+purpose_stall_add+"&numb_days="+numb_days+"&c_name="+stall_person_name_add+"&amount="+amount_stall_add+"&phno="+phno_stall_add+"&remarks="+remarks+"&mode="+selected+"&trans_id="+trans_id+"&bank_name_net="+bank_name_net+"&issue_date_net="+issue_date_net,true);
		xmlhttp.send();
  		return;
	}
}

///Stall Ends



/*T-shirt sales starts*/

function t_shirts_revenue() //revenue_select.php -> t_shirts_sales_add.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
	xmlhttp.open("GET","t_shirts_sales_add.php?id="+id_numb,true);
	xmlhttp.send();
}


function submit_add_shirts() //t_shirts_sales_add.php -> add_shirts_submit_data.php
{
	var shirts_person_name_add= document.getElementById('shirts_person_name_add').value;
	var date_shirts_add= document.getElementById('date_shirts_add').value;
	var amount_shirts_add= document.getElementById('amount_shirts_add').value;
	var numb_shirts_add= document.getElementById('numb_shirts_add').value;
	var phno_shirts_add= document.getElementById('phno_shirts_add').value;
	var remarks= document.getElementById('remarks_add_shirts').value;
	var mode= document.getElementsByName('mode');
	var selected=99;

	if((shirts_person_name_add=='')||(phno_shirts_add.length!=10)||(remarks=='')||(date_shirts_add=='')||(amount_shirts_add=='')||(numb_shirts_add==''))
	{
		alert("Please enter all valid details");
		return false;
	}

	for(var i=0;i<=1;i++)
	{
		if(mode[i].checked)
		{
			selected=i;
			break;
		}
	}

	if(selected==99)
	{
		alert('No options selected');
		return;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}

	if(selected==0)
	{
		var total_1=document.getElementById('denomination_total').innerHTML;
		var total_2=document.getElementById('amount_shirts_add').value;
		total_1=parseInt(total_1);
		total_2=parseInt(total_2);

		if(total_2!=total_1)
		{
			alert("Please Enter correct domination for given money!!");
			return;
		}
		var note_1000 = document.getElementById('note_1000').value;
		var note_500 = document.getElementById('note_500').value;
		var note_100 = document.getElementById('note_100').value;
		var note_50 = document.getElementById('note_50').value;
		var note_20 = document.getElementById('note_20').value;
		var note_10 = document.getElementById('note_10').value;
		var note_5 = document.getElementById('note_5').value;
		var note_2 = document.getElementById('note_2').value;
		var note_1 = document.getElementById('note_1').value;

		xmlhttp.open("GET","add_shirts_submit_data.php?e_name="+shirts_person_name_add+"&c_name="+date_shirts_add+"&email_id="+numb_shirts_add+"&amount="+amount_shirts_add+"&phno="+phno_shirts_add+"&remarks="+remarks+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
  		xmlhttp.send();
  		return;
	}

}

///T-shirt's call ends here



///	Workshop call start's from here

function workshops_revenue()	//revenue_select.php -> workshop_add.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
	xmlhttp.open("GET","workshop_add.php?id="+id_numb,true);
	xmlhttp.send();
}


function submit_add_workshop()	//workshop_add.php -> add_workshop_submit_data.php
{
	var person_name_workshop= document.getElementById('person_name_workshop').value;
	var company_name_workshop= document.getElementById('company_name_workshop').value;
	var amount_workshop= document.getElementById('amount_workshop').value;
	var email_id_workshop= document.getElementById('email_id_workshop').value;
	var phno_workshop= document.getElementById('phno_workshop').value;
	var remarks= document.getElementById('remarks_workshop').value;
	var mode= document.getElementsByName('mode');
	var selected=99;

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if((email_id_workshop=="")||(!email_id_workshop.match(mailformat))||(phno_workshop.length!=10)||(remarks=='')||(person_name_workshop=='')||(company_name_workshop=='')||(amount_workshop==''))
	{
		alert("Please enter all valid details");
		return false;
	}

	for(var i=0;i<=1;i++)
	{
		if(mode[i].checked)
		{
			selected=i;
			break;
		}
	}

	if(selected==99)
	{
		alert('No options selected');
		return;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}

		}
  	}

	if(selected==0)
	{
		var total_1=document.getElementById('denomination_total').innerHTML;
		total_1=parseInt(total_1);
		var total_2=parseInt(amount_workshop);

		if(total_2!=total_1)
		{
			alert("Please Enter correct domination for given money!!");
			return;
		}
		var note_1000 = document.getElementById('note_1000').value;
		var note_500 = document.getElementById('note_500').value;
		var note_100 = document.getElementById('note_100').value;
		var note_50 = document.getElementById('note_50').value;
		var note_20 = document.getElementById('note_20').value;
		var note_10 = document.getElementById('note_10').value;
		var note_5 = document.getElementById('note_5').value;
		var note_2 = document.getElementById('note_2').value;
		var note_1 = document.getElementById('note_1').value;

		xmlhttp.open("GET","add_workshop_submit_data.php?e_name="+person_name_workshop+"&c_name="+company_name_workshop+"&email_id="+email_id_workshop+"&amount="+amount_workshop+"&phno="+phno_workshop+"&remarks="+remarks+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
  		xmlhttp.send();
  		return;
	}

}
// workshop ends here


//****************************************************************************


//Renvenue starts here
function others_revenue()	// revenue_select.php -> others_revenue_add.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
	xmlhttp.open("GET","others_revenue_add.php?id="+id_numb,true);
	xmlhttp.send();
}


function submit_others_revenue() //others_revenue_add.php -> others_revenue_submit_data.php
{
	var event_name= document.getElementById('event_name').value;
	var company_name= document.getElementById('company_name').value;
	var amount= document.getElementById('amount').value;
	var phno= document.getElementById('phno').value;
	var email_id= document.getElementById('email_id').value;
	var remarks= document.getElementById('remarks_sponsor').value;
	var mode= document.getElementsByName('mode');
	var selected=99;

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if((email_id=="")||(!email_id.match(mailformat))||(phno.length!=10)||(remarks=='')||(event_name=='')||(company_name=='')||(amount==''))
	{
		alert("Please enter all valid details");
		return false;
	}

	for(var i=0;i<=3;i++)
	{
		if(mode[i].checked)
		{
			selected=i;
			break;
		}
	}
	if(selected==99)
	{
		alert('No options selected');
		return;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("revenue_detail").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("revenue_detail").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}

	if(selected==0)
	{
		var total_1=document.getElementById('denomination_total').innerHTML;
		var total_2=document.getElementById('amount').value;
		total_1=parseInt(total_1);
		total_2=parseInt(total_2);

		if(total_2!=total_1)
		{
			alert("Please Enter correct domination for given money!!");
			return;
		}
		var note_1000 = document.getElementById('note_1000').value;
		var note_500 = document.getElementById('note_500').value;
		var note_100 = document.getElementById('note_100').value;
		var note_50 = document.getElementById('note_50').value;
		var note_20 = document.getElementById('note_20').value;
		var note_10 = document.getElementById('note_10').value;
		var note_5 = document.getElementById('note_5').value;
		var note_2 = document.getElementById('note_2').value;
		var note_1 = document.getElementById('note_1').value;

		xmlhttp.open("GET","others_revenue_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
  		xmlhttp.send();
  		return;
	}

	else if(selected==1)
	{
		var dd_numb = document.getElementById('dd_number').value;
		var bank_name_dd = document.getElementById('bank_name_dd').value;
		var branch_name_dd = document.getElementById('branch_name_dd').value;
		var issue_date_dd = document.getElementById('issue_date_dd').value;

		if((dd_numb=='')||(bank_name_dd=='')||(branch_name_dd=='')||(issue_date_dd==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","others_revenue_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&dd_numb="+dd_numb+"&branch_name_dd="+branch_name_dd+"&bank_name_dd="+bank_name_dd+"&issue_date_dd="+issue_date_dd,true);
		xmlhttp.send();
  		return;
	}

	else if(selected==2)
	{
		var cheque_numb = document.getElementById('cheque_number').value;
		var bank_name_chq = document.getElementById('bank_name_chq').value;
		var branch_name_chq = document.getElementById('branch_name_chq').value;
		var issue_date_chq = document.getElementById('issue_date_chq').value;

		if((cheque_numb=='')||(bank_name_chq=='')||(branch_name_chq=='')||(issue_date_chq==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","others_revenue_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&cheque_numb="+cheque_numb+"&branch_name_chq="+branch_name_chq+"&bank_name_chq="+bank_name_chq+"&issue_date_chq="+issue_date_chq,true);
		xmlhttp.send();
  		return;
	}

	else if(i==3)
	{
		var trans_id = document.getElementById('trans_id').value;
		var bank_name_net = document.getElementById('bank_name_net').value;
		var issue_date_net = document.getElementById('issue_date_net').value;

		if((trans_id=='')||(bank_name_net=='')||(issue_date_net==''))
		{
			alert("Please Enter all details");
			return false;
		}

		xmlhttp.open("GET","others_revenue_submit_data.php?e_name="+event_name+"&c_name="+company_name+"&amount="+amount+"&phno="+phno+"&email_id="+email_id+"&remarks="+remarks+"&mode="+selected+"&trans_id="+trans_id+"&bank_name_net="+bank_name_net+"&issue_date_net="+issue_date_net,true);
		xmlhttp.send();
  		return;
	}
}

//Others revenue ends here



/******************************************************************************************/


/*External calls starts*/

function ext_registrations()//index.php -> ext_registrations.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_option").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  xmlhttp.open("GET","ext_registrations.php?id="+id_numb,true);
  xmlhttp.send();
}



//check if all the inputs are given and redirect

function submit_external() //ext_registrations.php->external_submit_data.php
{
	var amount_external=document.getElementById('amount_external').value;
	var number_external=document.getElementById('number_external').value;
	var update_ext_date=document.getElementById('update_ext_date').value;
	var remarks_external=document.getElementById('remarks_external').value;
	var update_ext_id=document.getElementById('update_ext_id').value;

	if((update_ext_id=='')||(remarks_external=='')||(update_ext_date=='')||(number_external=='')||(amount_external==''))
	{
		alert("Please enter all valid details");
		return false;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_option").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
   	xmlhttp.open("GET","external_submit_data.php?update_ext_id="+update_ext_id+"&amount_external="+amount_external+"&number_external="+number_external+"&update_ext_date="+update_ext_date+"&remarks_external="+remarks_external,true);
   	xmlhttp.send();
}

/* External calls ends */



/*********************************************************************************************/



/* Internal call starts*/

function int_registrations() //index.php -> int_registrations.php
{
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_option").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  	xmlhttp.open("GET","int_registrations.php?id="+id_numb,true);
  	xmlhttp.send();
}


//check if all the inputs are given and redirect
function submit_internal()	//int_registrations.php -> internal_submit_data.php
{
	var amount_external=document.getElementById('amount_internal').value;
	var number_external=document.getElementById('number_internal').value;
	var update_ext_date=document.getElementById('update_int_date').value;
	var remarks_external=document.getElementById('remarks_internal').value;
	var update_ext_id=document.getElementById('update_int_id').value;

	if((update_ext_id=='')||(remarks_external=='')||(update_ext_date=='')||(number_external=='')||(amount_external==''))
	{
		alert("Please enter all valid details");
		return false;
	}

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_option").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
   	xmlhttp.open("GET","internal_submit_data.php?update_ext_id="+update_ext_id+"&amount_external="+amount_external+"&number_external="+number_external+"&update_ext_date="+update_ext_date+"&remarks_external="+remarks_external,true);
   	xmlhttp.send();
}

/* Internal call Ends*/



/*********************************************************************************************/



/*Expenses calls starts*/

function event_names_prizes()
{
		var e_1 = document.getElementById('event_prize_names');
		var branch_1 = e_1.options[e_1.selectedIndex].value;
		if(branch_1==0)
		{
			alert('Please select a valid Event');
			return false;
		}
}



function expenses()	//index.php -> expenses_add.php
{
	var id_numb=100;

	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_option").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  xmlhttp.open("GET","expenses_add.php?id="+id_numb,true);
  xmlhttp.send();
}


function add_prizes()	//general call for CSS
{
	var e = document.getElementById('branch_expenses');
	var branch = e.options[e.selectedIndex].value;
	if(branch==16)
	{
		document.getElementById('extra_prizes_info').style.display='block';
	}
	else
	{
		document.getElementById('extra_prizes_info').style.display='none';
	}
}


function submit_expenses() // expenses_add.php -> expenses_submit_data.php
{
	var e = document.getElementById('branch_expenses');
	var branch = e.options[e.selectedIndex].value;
	var amount=document.getElementById('amount_expenses').value;
	var name_p=document.getElementById('name_expenser').value;
	var purpose=document.getElementById('purpose_expense').value;
	var remarks_expenses=document.getElementById('remarks_expenses').value;
	var phno=document.getElementById('phno_expenses').value;
	var mode= document.getElementsByName('mode');
	var selected=99;

	if((phno.length!=10)||(remarks_expenses=='')||(branch=='')||(amount=='')||(name_p=='')||(purpose==''))
	{
		alert("Please enter all valid details");
		return false;
	}

	for(var i=0;i<=3;i++)
	{
		if(mode[i].checked)
		{
			selected=i;
			break;
		}
	}
	if(selected==99)
	{
		alert('No options selected');
		return;
	}


	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("select_option").innerHTML=xmlhttp.responseText;
      		var res=document.getElementById("select_option").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login_approve.php';
			}
		}
  	}
  	if(branch==16)
	{
		var e_1 = document.getElementById('event_prize_names');
		var branch_1 = e_1.options[e_1.selectedIndex].value;

		var f_p=document.getElementById('first_prize_cash').value;
		var s_p=document.getElementById('second_prize_cash').value;
		var t_p=document.getElementById('third_prize_cash').value;

		var total_prize=(f_p*1)+(s_p*1)+(t_p*1);
		
		var total_1=document.getElementById('amount_expenses').value;
		total_1=parseInt(total_1);
		total_prize=parseInt(total_prize);

		if(total_1!=total_prize)
		{
			alert("Wrong credentials in Prize Money");
			return false;
		}

		if((f_p=='')||(s_p=='')||(t_p==''))
		{
			alert("Wrong credentials in Prize Money");
			return false;
		}
	}
	if(selected==0)
	{
		var total_1=document.getElementById('denomination_total').innerHTML;
		var total_2=document.getElementById('amount_expenses').value;
		total_1=parseInt(total_1);
		total_2=parseInt(total_2);

		if(total_2!=total_1)
		{
			alert("Please Enter correct domination for given money!!");
			return;
		}
		var note_1000 = document.getElementById('note_1000').value;
		var note_500 = document.getElementById('note_500').value;
		var note_100 = document.getElementById('note_100').value;
		var note_50 = document.getElementById('note_50').value;
		var note_20 = document.getElementById('note_20').value;
		var note_10 = document.getElementById('note_10').value;
		var note_5 = document.getElementById('note_5').value;
		var note_2 = document.getElementById('note_2').value;
		var note_1 = document.getElementById('note_1').value;

		if(branch==16)
		{
			xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&mode="+selected+"&name="+name_p+"&purpose="+purpose+"&branch_1="+branch_1+"&f_p="+f_p+"&s_p="+s_p+"&t_p="+t_p+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
	  		xmlhttp.send();
	  		return;
		}

		else
		{
			xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&mode="+selected+"&name="+name_p+"&purpose="+purpose+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&note_1000="+note_1000+"&note_500="+note_500+"&note_100="+note_100+"&note_50="+note_50+"&note_20="+note_20+"&note_10="+note_10+"&note_5="+note_5+"&note_2="+note_2+"&note_1="+note_1,true);
	  		xmlhttp.send();
	  		return;
		}
	}

	else if(selected==1)
	{
		var dd_numb = document.getElementById('dd_number').value;
		var bank_name_dd = document.getElementById('bank_name_dd').value;
		var branch_name_dd = document.getElementById('branch_name_dd').value;
		var issue_date_dd = document.getElementById('issue_date_dd').value;

		if((dd_numb=='')||(bank_name_dd=='')||(branch_name_dd=='')||(issue_date_dd==''))
		{
			alert("Please Enter all details");
			return false;
		}

		if(branch==16)
		{
			xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&name="+name_p+"&purpose="+purpose+"&branch_1="+branch_1+"&f_p="+f_p+"&s_p="+s_p+"&t_p="+t_p+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&dd_numb="+dd_numb+"&branch_name_dd="+branch_name_dd+"&bank_name_dd="+bank_name_dd+"&issue_date_dd="+issue_date_dd,true);
			xmlhttp.send();
  			return;
  		}
  		else
  		{
  			xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&name="+name_p+"&purpose="+purpose+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&dd_numb="+dd_numb+"&branch_name_dd="+branch_name_dd+"&bank_name_dd="+bank_name_dd+"&issue_date_dd="+issue_date_dd,true);
			xmlhttp.send();
  			return;
  		}

	}

	else if(selected==2)
	{
		var cheque_numb = document.getElementById('cheque_number').value;
		var bank_name_chq = document.getElementById('bank_name_chq').value;
		var branch_name_chq = document.getElementById('branch_name_chq').value;
		var issue_date_chq = document.getElementById('issue_date_chq').value;

		if((cheque_numb=='')||(bank_name_chq=='')||(branch_name_chq=='')||(issue_date_chq==''))
		{
			alert("Please Enter all details");
			return false;
		}

		if(branch==16)
		{
			xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&name="+name_p+"&purpose="+purpose+"&branch_1="+branch_1+"&f_p="+f_p+"&s_p="+s_p+"&t_p="+t_p+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&cheque_numb="+cheque_numb+"&branch_name_chq="+branch_name_chq+"&bank_name_chq="+bank_name_chq+"&issue_date_chq="+issue_date_chq,true);
			xmlhttp.send();
		  	return;
	  	}
	  	else
	  	{
	  		xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&name="+name_p+"&purpose="+purpose+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&cheque_numb="+cheque_numb+"&branch_name_chq="+branch_name_chq+"&bank_name_chq="+bank_name_chq+"&issue_date_chq="+issue_date_chq,true);
			xmlhttp.send();
		  	return;
	  	}
	}

	else if(i==3)
	{
		var trans_id = document.getElementById('trans_id').value;
		var bank_name_net = document.getElementById('bank_name_net').value;
		var issue_date_net = document.getElementById('issue_date_net').value;

		if((trans_id=='')||(bank_name_net=='')||(issue_date_net==''))
		{
			alert("Please Enter all details");
			return false;
		}

		if(branch==16)
		{
			xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&name="+name_p+"&purpose="+purpose+"&branch_1="+branch_1+"&f_p="+f_p+"&s_p="+s_p+"&t_p="+t_p+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&trans_id="+trans_id+"&bank_name_net="+bank_name_net+"&issue_date_net="+issue_date_net,true);
			xmlhttp.send();
	  		return;
	  	}
	  	else
	  	{
	  		xmlhttp.open("GET","expenses_submit_data.php?phno="+phno+"&name="+name_p+"&purpose="+purpose+"&branch="+branch+"&amount="+amount+"&remarks_expenses="+remarks_expenses+"&mode="+selected+"&trans_id="+trans_id+"&bank_name_net="+bank_name_net+"&issue_date_net="+issue_date_net,true);
			xmlhttp.send();
	  		return;
	  	}
	}
}


/*Expenses calls ends*/


/*********************************************************************************************/

//GENERAL CALL STARTS

//Reg-Ex calls
function isNumber(evt)
{
		var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
        return true;
}

//GENERAL CALL ENDS


//EXCEL downloads

//downloading excel for adding the data

function ext_registrations_excel()	//int_registrations.php -> excel_intreg.php
{
	Materialize.toast('Starting Download', 4000,'rounded');
	var id_numb=100;
  	var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
          window.location = 'excel_extreg.php?id='+id_numb;
      }
    }
    xmlhttp.open("GET","excel_extreg.php?id="+id_numb,true);
    xmlhttp.send();
}

//downloading excel for adding the data
function int_registrations_excel()	//int_registrations.php -> excel_intreg.php
{
	Materialize.toast('Starting Download', 4000,'rounded')
	var id_numb=100;
	var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	        window.location = 'excel_intreg.php?id='+id_numb;
	    }
    }
    xmlhttp.open("GET","excel_intreg.php?id="+id_numb,true);
    xmlhttp.send();
}

</script>