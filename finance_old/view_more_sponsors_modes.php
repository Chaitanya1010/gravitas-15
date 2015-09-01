<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		$id = $_REQUEST['id'];
		if($id==1)	//Cash
		{
			echo "<br/>Cash Denomination:</br>
			<div class='row'>
			<div class='input-field col s4 m3'>
			<label for='note_1000'>1000 &times;</label> <input type='text' name='note_1000' id='note_1000' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			<div class='input-field col s4 m3'>
			<label for='note_500'>500 &times;</label> <input type='text' name='note_500' id='note_500' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			<div class='input-field col s4 m3'>
			<label for='note_100'>100 &times;</label><input type='text' name='note_100' id='note_100' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			<div class='input-field col s4 m3'>
			<label for='note_50'>50 &times;</label><input type='text' name='note_50' id='note_50' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			</div>
			<div class='row'>
			<div class='input-field col s4 m2'>
			<label for='note_20'>20 &times;</label><input type='text' name='note_20' id='note_20' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			<div class='input-field col s4 m2'>
			<label for='note_10'>10 &times;</label><input type='text' name='note_10' id='note_10' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			<div class='input-field col s4 m2'>
			<label for='note_5'>5 &times;</label><input type='text' name='note_5' id='note_5' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			<div class='input-field col s4 m2'>
			<label for='note_2'>2 &times;</label><input type='text' name='note_2' id='note_2' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			<div class='input-field col s4 m2'>
			<label for='note_1'>1 &times;</label><input type='text' name='note_1' id='note_1' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'>
			</div>
			</div>
			<div class='indigo-text'>Total:<div id='denomination_total'></div></div>
			";
		}
		else if($id==2)	//DD
		{
			echo
			"<div class='row'>
			<div class='input-field col s12 m6'>
			<label for='dd_number'>DD Number</label> <input type='text' name='dd_number' id='dd_number' autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
			<label for='bank_name_dd'>Bank Name</label> <input type='text' name='bank_name_dd' id='bank_name_dd'  autocomplete='off'>
			</div>
			</div>
			<div class='row'>
			<div class='input-field col s12 m6'>
			<label for='branch_name_dd'>Branch Name</label> <input type='text' name='branch_name_dd' id='branch_name_dd' autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
		 <input type='date' name='issue_date_dd' class='datepicker' id='issue_date_dd' autocomplete='off'>
			</div>
			</div>
			<script>
			$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15
			});
			</script>
			";
		}
		else if($id==3)	//Cheque
		{
			echo
			"<div class='row'>
			<div class='input-field col s12 m6'>
			<label for='cheque_number'>Cheque Number</label> <input type='text' name='cheque_number' id='cheque_number'  placeholder='' autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
			<label for='bank_name_chq'>Bank Name</label>  <input type='text' name='bank_name_chq' id='bank_name_chq'  placeholder='Ex:AXIS Bank' autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
			<label for='branch_name_chq'>Branch Name</label>  <input type='text' name='branch_name_chq' id='branch_name_chq'   autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
			 <input type='date' name='issue_date_chq' id='issue_date_chq' autocomplete='off'>
			</div>
			</div>
 			";
		}
		else if($id==4)	//Net Banking
		{
			echo
			"<div class='row'>
			<div class='input-field col s12 m6'>
			<label for='trans_id'>Transaction ID</label> <input type='text' name='trans_id' id='trans_id' autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
			<label for='bank_name_net'>Bank Name</label> <input type='text' name='bank_name_net' id='bank_name_net' autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'><input type='date' name='issue_date_net' id='issue_date_net' autocomplete='off'>
			</div>
			</div>
 			";
		}
	}
	else if((isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id']))||((!isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id']))))
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:login_approve.php");
	}
	else
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		echo "<div>Ah4*!bb dhS8!) Nh5@n</div>";
		exit();
	}
?>
