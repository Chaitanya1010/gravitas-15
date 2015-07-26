<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo "
		<h2>Internal Regsitrations</h2>
			<button onclick='int_registrations_excel()'>Excel Download</button></br></br>
			Id Updated:<input type='text' name='update_int_id'  placeholder='Id of the last register' id='update_int_id' autocomplete='off' onkeypress='return isNumber(event)'></br></br>
			Amount From Internal till ID:<input type='text' name='amount_internal'  placeholder='Amount Credited' id='amount_internal' autocomplete='off' onkeypress='return isNumber(event)'></br></br>
			Number of Internal Participants:<input type='text' name='number_internal'  placeholder='Ex:200,250.,etc' id='number_internal' autocomplete='off' onkeypress='return isNumber(event)'></br></br>
			Date Updated: <input type='date' name='update_int_date' id='update_int_date' placeholder='Ex:5-6-2015' autocomplete='off'></br></br>
			Remarks:<br> <textarea name='remarks_internal' rows='5' cols='50' id='remarks_internal'  placeholder='Details regarding the info added' autocomplete='off'></textarea><br><br>		
			<button onclick='submit_internal();'>Submit!</button>";
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