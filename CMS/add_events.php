<?php
session_start();
if(isset($_SESSION["regno"]))
{
	echo"<div class='row'><div class='input-field col s12 m6'>
	<label for='ename'>Name</label><input type='text' name='ename' id='ename' autocomplete='off'></div>
	<div class='input-field col s12 m6'><label for='tseats'>Total Seats(Internals)</label><input type='text' name='tseats' id='tseats' autocomplete='off' onkeypress='return isNumber(event)'></div></div>
	<div class='row'><div class='input-field col s12 m6'><label for='tseats_ext'>Total Seats(Externals)</label><input type='text' name='tseats_ext' id='tseats_ext' autocomplete='off' onkeypress='return isNumber(event)'></div>
	<div class='input-field col s12 m6'><label for='eprice'>Price</label> <input type='text' name='eprice' id='eprice' autocomplete='off' onkeypress='return isNumber(event)'></div></div>
	<div class='input-field col s12'>Team:<input type='radio' class='with-gap' name='tradio' id='tradio1' value='fixed' checked onclick='team_change(this.value)'><label for='tradio1'>Fixed</label>
				<input type='radio' name='tradio' class='with-gap' id='tradio2' value='var' onclick='team_change(this.value)'> <label for='tradio2'>Variable</label></div>
</br>
	<div id='team'>Team Size: <input type='text' name='fixed' id='fixed' autocomplete='off' onkeypress='return isNumber(event)'></div>
<div class='input-field col s12'>
	Category:
			<input type='radio' name='category' class='with-gap' id='category1' value='0' checked><label for='category1'> Premium</label>
			<input type='radio' class='with-gap' name='category' id='category2' value='1'><label for='category2'> Workshops</label>
			<input type='radio' class='with-gap' name='category' id='category3' value='2'><label for='category3'> Technical</label>
			<input type='radio' class='with-gap' name='category' id='category4' value='3'><label for='category4'> Management</label>
			<input type='radio' class='with-gap' name='category' id='category5' value='4'><label for='category5'> Informals</label>
			<input type='radio' class='with-gap' name='category' id='category6' value='5'><label for='category6'> Combos</label></div>
			<a class='btn-floating btn-large waves-effect waves-light indigo darken-4 right' onclick='sub_event()'  id='sub_event' name='sub_event'  ><i class='material-icons'>add</i></a>

	<div id='msg'></div>
	";
}
else
{
	require 'logout.php';
}
