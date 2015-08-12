<?php
	session_start();
	if((isset($_SESSION['regno']))&&(isset($_REQUEST['numb'])))//session_variable verification
	{
		require('sql_con.php');
?>
<div id="body">
	<button class='btn-floating btn-medium waves-effect waves-light indigo darken-4 right' id='excel_dwnld' onclick='exel_dwnld();' style='margin-right:2em'><i class='material-icons'>play_for_work</i></button>
	<div class ="container">
		<div class="card hoverable">
			<div class='container'>
				<div class='row'>
		<div class="input-field col s12 m6">
			<label for="regno">Registration Number</label><input type='text' name='regno' id='regno' autocomplete='off' maxlength='9'>
		</div>
		<div class="input-field col s12 m6">
			<label for="email_id">Email ID</label><input type='text' name='email_id' id='email_id' autocomplete='off' maxlength='30'>
		</div>
		<div class='input-field col s12 m6'>
		<select id='hostel_type' class='browser-default' class='col s12 m6' name='hostel_type'>
			<option value='99'>Select Hostel</option>
			<option value='bh'>Boys Hostel</option>
			<option value='gh'>Girls Hostel</option>
		</select>
	</div>
		<div class="input-field col s12 m6">
			<label for="phno">Phone Number</label><input type='text' name='phno' id='phno' maxlength="10" autocomplete='off' onkeypress="return isNumber(event)">
		</div>
		<div class="input-field col s12 m6">
			<label for="blck_name">Block Name</label><input type='text' name='blck_name' id='blck_name' maxlength="10" autocomplete='off' onkeypress="return isAlpha(event)">
		</div>
		<div class="input-field col s12 m6">
			<label for="room_no">Room Number</label><input type='text' name='room_no' id='room_no' maxlength="4" autocomplete='off' onkeypress="return isNumber(event)">
		</div>
			</div>
		</div>
	</div>
</div>

<div class="container row">
<div class="col s12">
	<div class='container'>
	<div class="input-field col s12">
		<table class="striped hoverable black-text">
			<tr>
				<td>
					<input type='checkbox' id='1' name='sales' value='1' onchange='checkbox_sales(this.id)'><label for='1'>Round Neck</label>
				</td>
				<td>
					<select id='size_1' class='browser-default' class='col s12 m6' name='size_1'>
						<option value='99'>Select Size for Round Neck</option>
						<option value='S'>Small</option>
						<option value='M'>Medium</option>
						<option value='L'>Large</option>
						<option value='XL'>Extra Large</option>
						<option value='XXL'>Double Extra Large</option>
					</select>
				</td>
				<td>
					<p class="heavy black-text">249 INR</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type='checkbox' id='2' name='sales' value='2' onchange='checkbox_sales(this.id)'><label for='2'>Polo T-Shirt</label>
				</td>
				<td>
					<select id='size_2' class='browser-default' class='col s12 m6' name='size_2'>
						<option value='99'>Select Size for Polo T-shirt</option>
						<option value='S'>Small</option>
						<option value='M'>Medium</option>
						<option value='L'>Large</option>
						<option value='XL'>Extra Large</option>
						<option value='XXL'>Double Extra Large</option>
					</select>
				</td>
				<td>
					<p class="heavy black-text">499 INR</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type='checkbox' id='3' name='sales' value='3' onchange='checkbox_sales(this.id)'><label for='3'>Combo 1</label>
				</td>
				<td>
					<select id='size_3' class='browser-default' class='col s12 m6' name='size_3'>
						<option value='99'>Select Size for Round Neck</option>
						<option value='S'>Small</option>
						<option value='M'>Medium</option>
						<option value='L'>Large</option>
						<option value='XL'>Extra Large</option>
						<option value='XXL'>Double Extra Large</option>
					</select></br>
					<select id='size_4' class='browser-default' class='col s12 m6' name='size_4'>
						<option value='99'>Select Size for Polo T-shirt</option>
						<option value='M'>Medium</option>
						<option value='L'>Large</option>
						<option value='XL'>Extra Large</option>
						<option value='XXL'>Double Extra Large</option>
					</select>
				</td>
				<td>
					<p class="heavy black-text">555 INR</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type='checkbox' id='4' name='sales' value='4' onchange='checkbox_sales(this.id)' onchange='checkbox_sales(this.id)'><label for='4'>Combo 2</label>
				</td>
				<td>
					<p class="light black-text">10 Workshops + Round Neck</p></br>
					<select id='size_5' class='browser-default' class='col s12 m6' name='size_5'>
						<option value='99'>Select Size for Round Neck</option>
						<option value='S'>Small</option>
						<option value='M'>Medium</option>
						<option value='L'>Large</option>
						<option value='XL'>Extra Large</option>
						<option value='XXL'>Double Extra Large</option>
					</select>

				</td>
				<td>
					<p class="heavy black-text">4000 INR</p>
				</td>
			</tr>
			<tr>
				<td>
					<input type='checkbox' id='5' name='sales' value='5' onchange='checkbox_sales(this.id)' onchange='checkbox_sales(this.id)'><label for='5'>Combo 3</label>
				</td>
				<td>
					<select id='size_6' class='browser-default' class='col s12 m6' name='size_6'>
						<option value='99'>Select Size for Round Neck</option>
						<option value='S'>Small</option>
						<option value='M'>Medium</option>
						<option value='L'>Large</option>
						<option value='XL'>Extra Large</option>
						<option value='XXL'>Double Extra Large</option>
					</select></br>
					<select id='size_7' class='browser-default' class='col s12 m6' name='size_7'>
						<option value='99'>Select Size for Polo T-shirt</option>
						<option value='S'>Small</option>
						<option value='M'>Medium</option>
						<option value='L'>Large</option>
						<option value='XL'>Extra Large</option>
						<option value='XXL'>Double Extra Large</option>
					</select>
				</td>
				<td>
					<p class="heavy black-text">5555 INR</p>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<p class="heavy black-text" id='total_sum'>Total:</p>
				</td>
		</table>
	</div>&nbsp;
</div>
</div>
</div>
	<div class ="input-field">
		<button onclick='return reg_go(1)' class="right waves-effect waves-light indigo darken-2 btn z-depth-3">Pay Now<i class="material-icons right">send</i> </button></br></br>
		<button onclick='return reg_go(0)' class="right waves-effect waves-light indigo darken-2 btn z-depth-3">Pay Later<i class="material-icons right">send</i> </button>
	</div>

</div>
<?php
}
else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))))
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
