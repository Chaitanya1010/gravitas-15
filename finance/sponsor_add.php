<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		echo"
		<div class='row'>
			<div class='input-field col s12 m6'>";
				
			 	//<input type='text' name='event_name' id='event_name' autocomplete='off'>
				echo "<select id='event_prize_names_spon' class='browser-default' class='col s12 m6' name='event_prize_names'>";
			
				//select events from database
				$event_list="SELECT * FROM  `events`;";
				$res_events=mysqli_query($mysqli, $event_list);
				
				if(mysqli_num_rows($res_events)>0)
				{
					while($arr_events=mysqli_fetch_array($res_events))
					{
						echo "<option value=".$arr_events['name'].">".$arr_events['name']."</option>";
					}
				}

			echo"</select></div></div>";
		echo"
		<div class='row'>
			<div class='input-field col s12 m6'>
				<br/>
				<label for='company_name'>Sponsor Name</label>
				<input type='text' name='company_name' id='company_name' autocomplete='off'>
			</div>
			
		</div>
		<div class='row'>
			<div class='input-field col s12'>
			<label for='amount'>Amount</label>
			<input type='text' name='amount' id='amount' autocomplete='off' onkeypress='return isNumber(event)'>
			</div>
		</div>

			Modes:</br>
				<input type = 'radio' value ='cash' class='with-gap' name ='mode' id='1' onclick='method_pay(this.id)'><label for='1'>Cash</label>
				<input type = 'radio' value ='dd' class='with-gap' name ='mode' id='2' onclick='method_pay(this.id)'><label for='2'>DD</label>
				<input type = 'radio' value ='cheque' class='with-gap' name ='mode' id='3' onclick='method_pay(this.id)'><label for='3'>Cheque</label>
				<input type = 'radio' value ='net_transfer' class='with-gap' name ='mode' id='4' onclick='method_pay(this.id)'><label for='4'>NET Banking</label>
				<br/><div id='more_credit_options'></div><br>
			<div class='row'>
			<div class='input-field col s12 m6'>
			<label for='phno'>Phone Number</label><input type='text' maxlength='10' name='phno' id='phno' autocomplete='off' onkeypress='return isNumber(event)'>
			</div>
			<div class='input-field col s12 m6'>
			<label fpr='email_id'>Email-ID</label><input type='email' name='email_id' id='email_id' autocomplete='off'>
			</div>
			</div>
			<div class='row'>
			<div class='input-field s12'><label for='remarks_sponsor'>Remarks</label> <textarea name='remarks_sponsor' rows='5' cols='50' id='remarks_sponsor'   autocomplete='off' class='materialize-textarea'></textarea></div></div>
			<button type='submit' onclick='submit_sponsor();' class='btn waves-effect waves-light indigo darken-4'>
			  <i class='material-icons right'>send</i> Submit
			  </button>";
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
