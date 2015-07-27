<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		echo "
		<button class='btn-floating btn-medium waves-effect waves-light indigo darken-4 right' onclick='int_registrations_excel();' style='margin-right:2em'><i class='material-icons'>play_for_work</i></button></br>
		<div class='container'>
			<div class='card'>
				<div class='card-content'>
					<div class='row'>
						<div class='input-field col s12 m4'>
							<label for='update_int_id'>ID updated</label>
							<input type='text' name='update_int_id' id='update_int_id' autocomplete='off' onkeypress='return isNumber(event)'>
						</div>
						<div class='input-field col s12 m4'>
							<label for='amount_internal'>Amount from internal </label>
							<input type='text' name='amount_internal' id='amount_internal' autocomplete='off' onkeypress='return isNumber(event)'>
						</div>
						<div class='input-field col s12 m4'>
							<label for='number_internal'>Number of Internal Participants</label>
							<input type='text' name='number_internal' id='number_internal' autocomplete='off' onkeypress='return isNumber(event)'>
						</div>
					</div>
					<div class='row'>
						<div class='input-field col s12 m8'>
							<input type='date' name='update_ext_date' class='datepicker' id='update_int_date' autocomplete='off'>
						</div>
					</div>
					<div class='row'>
						<div class='input-field col s12'>

						<textarea name='remarks_internal' rows='5' cols='50' id='remarks_internal' class='materialize-textarea'  autocomplete='off'></textarea>
						<label for='remarks_internal'>Remarks</label>
					</div>
				</div>
				<button type='submit' onclick='submit_internal();' class='btn waves-effect waves-light indigo darken-4'>
					<i class='material-icons right'>send</i> Submit
					</button>
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
