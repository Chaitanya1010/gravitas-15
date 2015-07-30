<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo "
		<div class='container'>
		<div class='card'>
		<div class='card-content'>
		<div class='row'>
		<div class='input-field col s12 m6'>
			<label for='name_expenser'>Name</label> <input type='text' name='name_expenser' id='name_expenser'  autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
			<label for='purpose_expense'>Purpose</label> <input type='text' name='purpose_expense' id='purpose_expense' autocomplete='off'>
			</div>
			<div class='input-field col s12 m6'>
			<select id='branch_expenses' class='browser-default' onchange='add_prizes()' name='branch_expenses'>
				<option value='0'>Choose Branch</option>
				<option value='11'>Advertisements</option>
				<option value='12'>Marketing and Publicity</option>
				<option value='13'>Printing</option>
				<option value='14'>Stationaries</option>
				<option value='15'>Photos and Videos</option>
				<option value='16'>Prize Money</option>
				<option value='17'>Stall Installation</option>
				<option value='18'>T-Shirt Purchases</option>
				<option value='19'>Travel</option>
				<option value='20'>Workshop</option>
				<option value='21'>Reimburesement to Merit Students</option>
				<option value='22'>Miscellaneous</option>
			</select>
			</div>
			</div>
		<div id='extra_prizes_info' style='display:none' class='col s12 m6'>
			<select id='event_prize_names' onchange='event_names_prizes()' class='browser-default' class='col s12 m6' name='event_prize_names'>
				<option value='0'>Event Names</option>
				<option value='1'>Event 1</option>
				<option value='2'>Event 2</option>
			</select></br></br>

			First Prize: <input type='text' id='first_prize_cash' autocomplete='off' onkeypress='return isNumber(event)' placeholder='Ex:50000'/></br></br>

			Second Prize: <input type='text' id='second_prize_cash' autocomplete='off' onkeypress='return isNumber(event)' placeholder='Ex:5000'/></br></br>

			Third Prize: <input type='text' id='third_prize_cash' autocomplete='off' onkeypress='return isNumber(event)' placeholder='Ex:500'/></br></br>

		</div>
		<div class='row'>
		<div class='input-field col s12 m6'>
		<label for='amount_expenses'>Amount</label><input type='text' name='amount_expenses'  id='amount_expenses' autocomplete='off' onkeypress='return isNumber(event)'></div>
		<div class='input-field col s12 m6'>
		<label for='phno_expenses'>Phone Number</label><input type='text' name='phno_expenses' id='phno_expenses' autocomplete='off' onkeypress='return isNumber(event)'>
		</div>
		</div>
		Modes:</br>
		<input type = 'radio' value ='cash' class='with-gap' name ='mode' id='1' onclick='method_pay(this.id)'><label for='1'>Cash</label>
		<input type = 'radio' value ='dd' class='with-gap' name ='mode' id='2' onclick='method_pay(this.id)'><label for='2'>DD</label>
		<input type = 'radio' value ='cheque' class='with-gap' name ='mode' id='3' onclick='method_pay(this.id)'><label for='3'>Cheque</label>
		<input type = 'radio' value ='net_transfer' class='with-gap' name ='mode' id='4' onclick='method_pay(this.id)'><label for='4'>NET Banking</label>
		</br><div id='more_credit_options'></div><br>

		<div class='input-field'><textarea name='remarks_expenses' rows='5' cols='50' class='materialize-textarea' id='remarks_expenses'   autocomplete='off'></textarea><label for='remarks_expenses'>Remarks</label></div>
		<button type='submit' onclick='submit_expenses();' class='btn waves-effect waves-light indigo darken-4'>
			<i class='material-icons right'>send</i> Submit
			</button>
		</div>
		</div>
		</div>
	</div>";
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
