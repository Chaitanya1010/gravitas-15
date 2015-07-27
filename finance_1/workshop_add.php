<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo"
			Person Name: <input type='text' name='person_name_workshop' id='person_name_workshop'  placeholder='Person Name' autocomplete='off'><br><br>
			Company Name: <input type='text' name='company_name_workshop' id='company_name_workshop'  placeholder='Company or Person Name' autocomplete='off'><br><br>
			Amount:<input type='text' name='amount_workshop'  placeholder='Amount Credited' id='amount_workshop' autocomplete='off' onkeypress='return isNumber(event)'></br><br>

			Modes:</br>
			<input type = 'radio' value ='cash' class='with-gap' name ='mode' id='1' onclick='method_pay(this.id)'><label for='1'>Cash</label>
			
				</br><div id='more_credit_options'></div><br>
			Phone Number:<input type='text' name='phno_workshop' id='phno_workshop' placeholder='9092******' autocomplete='off' onkeypress='return isNumber(event)'><br><br>
			Email-ID:<input type='email' name='email_id_workshop' id='email_id_workshop'  placeholder='someone@something.com' autocomplete='off'><br><br>
			Remarks:<br> <textarea name='remarks_workshop' rows='5' cols='50' id='remarks_workshop' class='materialize-textarea' placeholder='Details regarding the info added' autocomplete='off'></textarea><br><br>
			<button onclick='submit_add_workshop();'>Submit!</button>";
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
