<?php

	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo"
			Purpose: <input type='text' name='purpose_stall_add' id='purpose_stall_add'  placeholder='Purpose of Stall' autocomplete='off'><br><br>
			Person name: <input type='text' name='stall_person_name_add' id='stall_person_name_add'  placeholder='Stall Person Name' autocomplete='off'><br><br>
			Phone number:<input type='text' name='phno_stall_add'  placeholder='9092******' id='phno_stall_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Number of Days:<input type='text' name='numb_days_stall_add'  placeholder='5/6/7.,etc' id='numb_days_stall_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Amount:<input type='text' name='amount_stall_add'  placeholder='Amount Credited' id='amount_stall_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Modes:</br>
			<input type = 'radio' value ='cash' class='with-gap' name ='mode' id='1' onclick='method_pay(this.id)'><label for='1'>Cash</label>
			<input type = 'radio' value ='dd' class='with-gap' name ='mode' id='2' onclick='method_pay(this.id)'><label for='2'>DD</label>
			<input type = 'radio' value ='cheque' class='with-gap' name ='mode' id='3' onclick='method_pay(this.id)'><label for='3'>Cheque</label>
			<input type = 'radio' value ='net_transfer' class='with-gap' name ='mode' id='4' onclick='method_pay(this.id)'><label for='4'>NET Banking</label>
				</br><div id='more_credit_options'></div><br>
			Remarks:<br> <textarea name='remarks_add_stall' rows='5' cols='50' id='remarks_add_stall' class='materialize-textarea' placeholder='Details regarding the info added' autocomplete='off'></textarea><br><br>
			<button onclick='submit_add_stall();'>Submit!</button>";
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

		exit();
	}
?>
