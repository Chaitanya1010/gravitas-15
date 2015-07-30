<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo"
			Person name: <input type='text' name='shirts_person_name_add' id='shirts_person_name_add'  placeholder='Shirts Distribution Incharge name' autocomplete='off'><br><br>
			Date: <input type='date' name='date_shirts_add' id='date_shirts_add' autocomplete='off'><br><br>
			Number of Shirts:<input type='text' name='numb_shirts_add'  placeholder='5/6/7.,etc' id='numb_shirts_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Phone number:<input type='text' name='phno_shirts_add'  placeholder='9092******' id='phno_shirts_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Amount:<input type='text' name='amount_shirts_add'  placeholder='Amount Credited' id='amount_shirts_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Modes:</br>
			<input type = 'radio' value ='cash' class='with-gap' name ='mode' id='1' onclick='method_pay(this.id)'><label for='1'>Cash</label>
			
				</br><div id='more_credit_options'></div><br>
			Remarks:<br> <textarea name='remarks_add_shirts' rows='5' cols='50' id='remarks_add_shirts' class='materialize-textarea' placeholder='Details regarding the info added' autocomplete='off'></textarea><br><br>
			<button onclick='submit_add_shirts();'>Submit!</button>";
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
