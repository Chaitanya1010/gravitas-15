<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo "
		<h2>Expenses</h2>
			Name: <input type='text' name='name_expenser' id='name_expenser'  placeholder='Name' autocomplete='off'><br><br>
			Purpose: <input type='text' name='purpose_expense' id='purpose_expense'  placeholder='Purpose of Expense' autocomplete='off'><br><br>
		Branch:
			<select id='branch_expenses' onchange='add_prizes()' name='branch_expenses'>
				<option value='0'>Choose Any One</option>  
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
			</select></br></br>
		<div id='extra_prizes_info' style='display:none'>
			Event Names:</br>
			<select id='event_prize_names' onchange='event_names_prizes()' name='event_prize_names'>
				<option value='0'>Choose Any One</option>  
				<option value='1'>Event 1</option>
				<option value='2'>Event 2</option>
			</select></br></br>
			
			First Prize: <input type='text' id='first_prize_cash' autocomplete='off' onkeypress='return isNumber(event)' placeholder='Ex:50000'/></br></br>
			
			Second Prize: <input type='text' id='second_prize_cash' autocomplete='off' onkeypress='return isNumber(event)' placeholder='Ex:5000'/></br></br>
			
			Third Prize: <input type='text' id='third_prize_cash' autocomplete='off' onkeypress='return isNumber(event)' placeholder='Ex:500'/></br></br>

		</div>
		Amount :<input type='text' name='amount_expenses'  placeholder='Amount Required' id='amount_expenses' autocomplete='off' onkeypress='return isNumber(event)'></br></br>
		Modes:</br>
			<input type = 'radio' value ='cash' name ='mode' id='1' onclick='method_pay(this.id)'>Creditted with Cash<br>
			<input type = 'radio' value ='dd' name ='mode' id='2' onclick='method_pay(this.id)'>Creditted with DD<br>
			<input type = 'radio' value ='cheque' name ='mode' id='3' onclick='method_pay(this.id)'>Creditted with Cheque<br>
			<input type = 'radio' value ='net_transfer' name ='mode' id='4' onclick='method_pay(this.id)'>Creditted with NET Banking<br>
		</br><div id='more_credit_options'></div><br>
			
		Phone Number :<input type='text' name='phno_expenses' id='phno_expenses'  placeholder='Phone Number' autocomplete='off' onkeypress='return isNumber(event)'><br><br>
		Remarks:<br> <textarea name='remarks_expenses' rows='5' cols='50' id='remarks_expenses'  placeholder='Details regarding the info added' autocomplete='off'></textarea><br><br>				
		<button onclick='submit_expenses();'>Submit!</button>";
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