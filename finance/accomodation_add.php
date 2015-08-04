<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo"
			Event Name: <input type='text' name='event_acco_add' id='event_acco_add'  placeholder='Name of Event' autocomplete='off'><br><br>
			Institute name and Place: <input type='text' name='inst_name_add' id='inst_name_add'  placeholder='Institute Name and place' autocomplete='off'><br><br>
			Phone number:<input type='text' maxlength='10' name='phno_acco_add'  placeholder='9092******' id='phno_acco_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Number of Days:<input type='text' name='numb_days_acco_add'  placeholder='5/6/7.,etc' id='numb_days_acco_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Amount:<input type='text' name='amount_acco_add'  placeholder='Amount Credited' id='amount_acco_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Modes:</br>
				<input type = 'radio' value ='cash' class='with-gap' name ='mode' id='1' onclick='method_pay(this.id)'><label for='1'>Cash</label>
			<div id='more_credit_options'></div><br>
			Remarks:<br> <textarea name='remarks_acco_add' class='materialize-textarea' rows='5' cols='50' id='remarks_acco_add'  placeholder='Details regarding the info added' autocomplete='off'></textarea><br><br>
			<button onclick='submit_add_accomodation();'>Submit!</button>";
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
