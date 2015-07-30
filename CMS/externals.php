<?php
session_start();
if((isset($_SESSION["regno"]))&&(isset($_REQUEST['numb'])))
{
	require 'sql_con.php';
	echo"
	<div class='row '>
	<div class='col s12'>
	<ul class='tabs indigo lighten-1' >
	<li class='tab col s6'><a href='#' class='white-text waves-effect' id='reg' name='reg' onclick='reg_students()'>Registered Students</a></li>
	<li class='tab col s6'><a href='#' class='white-text waves-effect' id='app_dd' name='app_dd' onclick='app_dd()'>Approve DD</a></li>
	</ul>
	</div>
	</div>
	<div id='ext_body'>
	</div>
	";
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
