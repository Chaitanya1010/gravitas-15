<?php
session_start();
if(isset($_SESSION["regno"])&&isset($_POST["numb"]))
{
?>
<div class='container black-text'><br/>
<table class="striped hoverable black-text">
<tr><td><label class='black-text'><h5>Combo Workshops:</h5></label></td></tr>
<tr><td><label class='black-text'><h6>Category 1 (Select only 3)</h6></label><br/></td></tr>
<tr><td><input type='checkbox' id='combo_cato1' name='combo_cato' value='1037' onchange='checkbox_3(this.id)'><label for='combo_cato1'>Invent-o-pi</label></td></tr>
<tr><td><input type='checkbox' id='combo_cato2' name='combo_cato' value='1038' onchange='checkbox_3(this.id)'><label for='combo_cato2'>Robotix Workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_cato3' name='combo_cato' value='1055' onchange='checkbox_3(this.id)'><label for='combo_cato3'>Animatronic Hand Workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_cato4' name='combo_cato' value='1056' onchange='checkbox_3(this.id)'><label for='combo_cato4'>Gesture controlled Robotics Workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_cato5' name='combo_cato' value='1026' onchange='checkbox_3(this.id)'><label for='combo_cato5'>Aero Modeling Workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_cato6' name='combo_cato' value='1028' onchange='checkbox_3(this.id)'><label for='combo_cato6'>Automotive</label></td></tr>
<tr><td><input type='checkbox' id='combo_cato7' name='combo_cato' value='1025' onchange='checkbox_3(this.id)'><label for='combo_cato7'>3-D Printing</label></td></tr>
<tr><td><label class='black-text'><h6>Category 3 (Select only 7)</h6></label><br/></td></tr>
<tr><td><input type='checkbox' id='combo_catt1' name='combo_catt' value='1024' onchange='checkbox_7(this.id)'><label for='combo_catt1'>3D Maya Workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt2' name='combo_catt' value='1027' onchange='checkbox_7(this.id)'><label for='combo_catt2'>Antenna Design</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt3' name='combo_catt' value='1029' onchange='checkbox_7(this.id)'><label for='combo_catt3'>Big Data Analysis</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt4' name='combo_catt' value='1030' onchange='checkbox_7(this.id)'><label for='combo_catt4'>Bionic proE</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt5' name='combo_catt' value='1031' onchange='checkbox_7(this.id)'><label for='combo_catt5'>Brandwagon</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt6' name='combo_catt' value='1032' onchange='checkbox_7(this.id)'><label for='combo_catt6'>CAD modelling workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt7' name='combo_catt' value='1033' onchange='checkbox_7(this.id)'><label for='combo_catt7'>Cloud Computing</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt8' name='combo_catt' value='1034' onchange='checkbox_7(this.id)'><label for='combo_catt8'>Comic Designing Workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt9' name='combo_catt' value='1035' onchange='checkbox_7(this.id)'><label for='combo_catt9'>Forensic and the Science of Deduction</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt10' name='combo_catt' value='1036' onchange='checkbox_7(this.id)'><label for='combo_catt10'>Idea Pitching</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt11' name='combo_catt' value='1039' onchange='checkbox_7(this.id)'><label for='combo_catt11'>Mozilla Firefox OS App Days </label></td></tr>
<tr><td><input type='checkbox' id='combo_catt12' name='combo_catt' value='1040' onchange='checkbox_7(this.id)'><label for='combo_catt12'>Phone Gap </label></td></tr>
<tr><td><input type='checkbox' id='combo_catt13' name='combo_catt' value='1041' onchange='checkbox_7(this.id)'><label for='combo_catt13'>Python and Google App Engine for the Beginner Developer</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt14' name='combo_catt' value='1042' onchange='checkbox_7(this.id)'><label for='combo_catt14'>Sensored</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt15' name='combo_catt' value='1043' onchange='checkbox_7(this.id)'><label for='combo_catt15'>SFX Workshop</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt17' name='combo_catt' value='1045' onchange='checkbox_7(this.id)'><label for='combo_catt17'>Stockgyaan</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt18' name='combo_catt' value='1046' onchange='checkbox_7(this.id)'><label for='combo_catt18'>Studio To Stage</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt19' name='combo_catt' value='1047' onchange='checkbox_7(this.id)'><label for='combo_catt19'>THE iOS FUSION</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt20' name='combo_catt' value='1048' onchange='checkbox_7(this.id)'><label for='combo_catt20'>The Ultimate Designer</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt21' name='combo_catt' value='1049' onchange='checkbox_7(this.id)'><label for='combo_catt21'>Under The Hood</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt22' name='combo_catt' value='1050' onchange='checkbox_7(this.id)'><label for='combo_catt22'>Artificial Intelligence</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt23' name='combo_catt' value='1051' onchange='checkbox_7(this.id)'><label for='combo_catt23'>Augmented Reality</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt24' name='combo_catt' value='1052' onchange='checkbox_7(this.id)'><label for='combo_catt24'>CRYPTORAMA</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt25' name='combo_catt' value='1053' onchange='checkbox_7(this.id)'><label for='combo_catt25'>IOT</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt26' name='combo_catt' value='1054' onchange='checkbox_7(this.id)'><label for='combo_catt26'>Introduction to Web Development</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt27' name='combo_catt' value='1057' onchange='checkbox_7(this.id)'><label for='combo_catt27'>SAP 2000</label></td></tr>
<tr><td><input type='checkbox' id='combo_catt28' name='combo_catt' value='1058' onchange='checkbox_7(this.id)'><label for='combo_catt28'>CellTech (Do it yourself)</label></td></tr>
<tr><td>
<button id="proceed_combo" name="proceed_combo" class="btn waves-effect waves-light indigo darken-4 left" onClick="select_combo()">
  <i class="material-icons right">send</i>  Proceed
</button></td></tr>
</table></div>
<?php
}
else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))))
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:index.php");
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