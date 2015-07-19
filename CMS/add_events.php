<?php
session_start();
if(isset($_SESSION["regno"]))
{
	echo"
	Name:<input type='text' name='ename' id='ename' autocomplete='off'><br>
	Total Seats:<input type='text' name='tseats' id='tseats' autocomplete='off' onkeypress='return isAlpha(event)'><br>
	Price: <input type='text' name='eprice' id='eprice' autocomplete='off' onkeypress='return isAlpha(event)'><br>
	Team:<input type='radio' name='tradio' id='tradio' value='fixed' checked onclick='team_change(this.value)'> Fixed
				<input type='radio' name='tradio' id='tradio' value='var' onclick='team_change(this.value)'> Variable<br>
				
	<div id='team'>Team Size: <input type='text' name='fixed' id='fixed' autocomplete='off' onkeypress='return isAlpha(event)'></div>
	
	Category:
			<input type='radio' name='category' id='category' value='0' checked> Premium
			<input type='radio' name='category' id='category' value='1'> Workshops
			<input type='radio' name='category' id='category' value='2'> Technical
			<input type='radio' name='category' id='category' value='3'> Management
			<input type='radio' name='category' id='category' value='4'> Informals	
			<input type='radio' name='category' id='category' value='5'> Combos<br>
	<button onclick='sub_event()' id='sub_event' name='sub_event' >Add</button>
	<div id='msg'></div>
	";
}
else
{
	require 'logout.php';
}
	