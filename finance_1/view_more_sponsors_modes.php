<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		$id = $_REQUEST['id'];
		if($id==1)	//Cash
		{
			echo "Cash Denomination:</br></br>
			1000X : <input type='text' name='note_1000' id='note_1000' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			500X : <input type='text' name='note_500' id='note_500' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			100X : <input type='text' name='note_100' id='note_100' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			50X : <input type='text' name='note_50' id='note_50' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			20X : <input type='text' name='note_20' id='note_20' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			10X : <input type='text' name='note_10' id='note_10' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			5X : <input type='text' name='note_5' id='note_5' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			2X : <input type='text' name='note_2' id='note_2' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br>
			1X : <input type='text' name='note_1' id='note_1' placeholder='1,2,3.,etc' autocomplete='off' onkeypress='return isNumber(event)' onkeyup='total()'><br><br>
			Total:<div id='denomination_total'></div>
			";
		}
		else if($id==2)	//DD
		{
			echo
			"DD number: <input type='text' name='dd_number' id='dd_number'  placeholder='' autocomplete='off'>
			Bank name: <input type='text' name='bank_name_dd' id='bank_name_dd'  placeholder='AXIS Bank' autocomplete='off'>		
			Branch Name: <input type='text' name='branch_name_dd' id='branch_name_dd'  placeholder='Dilsukhnagar' autocomplete='off'>
			Date Issued: <input type='date' name='issue_date_dd' id='issue_date_dd' placeholder='Ex:5-6-2015' autocomplete='off'>
			";
		}
		else if($id==3)	//Cheque
		{
			echo 
			"Cheque number: <input type='text' name='cheque_number' id='cheque_number'  placeholder='' autocomplete='off'>
			Bank name: <input type='text' name='bank_name_chq' id='bank_name_chq'  placeholder='Ex:AXIS Bank' autocomplete='off'>		
			Branch Name: <input type='text' name='branch_name_chq' id='branch_name_chq'  placeholder='Ex:Dilsukhnagar' autocomplete='off'>
			Date Issued: <input type='date' name='issue_date_chq' id='issue_date_chq' placeholder='Ex:5-6-2015' autocomplete='off'> 
 			";	
		}
		else if($id==4)	//Net Banking
		{
			echo
			"Transaction ID: <input type='text' name='trans_id' id='trans_id'  placeholder='' autocomplete='off'>
			Bank name: <input type='text' name='bank_name_net' id='bank_name_net'  placeholder='Ex:AXIS Bank' autocomplete='off'>		
			Date of Transaction: <input type='date' name='issue_date_net' id='issue_date_net' placeholder='Ex:5-6-2015' autocomplete='off'> 
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