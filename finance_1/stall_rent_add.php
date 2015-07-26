<?php
	if(true)//session_variable verification
	{
		echo"
		<h2>Stall Rent</h2>
			Purpose: <input type='text' name='purpose_stall_add' id='purpose_stall_add'  placeholder='Purpose of Stall' autocomplete='off'><br><br>
			Person name: <input type='text' name='stall_person_name_add' id='stall_person_name_add'  placeholder='Stall Person Name' autocomplete='off'><br><br>
			Phone number:<input type='text' name='phno_stall_add'  placeholder='9092******' id='phno_stall_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Number of Days:<input type='text' name='numb_days_stall_add'  placeholder='5/6/7.,etc' id='numb_days_stall_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Amount:<input type='text' name='amount_stall_add'  placeholder='Amount Credited' id='amount_stall_add' autocomplete='off' onkeypress='return isNumber(event)'></br><br>
			Modes:</br>
				<input type = 'radio' value ='cash' name ='mode' id='1' onclick='method_pay(this.id)'>Creditted with Cash<br>
				<input type = 'radio' value ='dd' name ='mode' id='2' onclick='method_pay(this.id)'>Creditted with DD<br>
				<input type = 'radio' value ='cheque' name ='mode' id='3' onclick='method_pay(this.id)'>Creditted with Cheque<br>
				<input type = 'radio' value ='net_transfer' name ='mode' id='4' onclick='method_pay(this.id)'>Creditted with NET Banking<br>
				</br><div id='more_credit_options'></div><br>
			Remarks:<br> <textarea name='remarks_add_stall' rows='5' cols='50' id='remarks_add_stall'  placeholder='Details regarding the info added' autocomplete='off'></textarea><br><br>		
			<button onclick='submit_add_stall();'>Submit!</button>";
	}
	else//logout
	{

	}
?>	
	
			


