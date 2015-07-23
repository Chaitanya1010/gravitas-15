<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require 'sql_con.php';
	echo"
	<div class='row'>
	<div class='col s12'>
	<ul class='tabs'>
	<li class='tab col s6'><a href='#' id='reg' name='reg' onclick='reg_students()'>Registered Students</a></li>
	<li class='tab col s6'><a href='#' id='app_dd' name='app_dd' onclick='app_dd()'>Approve DD</a></li>
	</ul>
	</div>
	</div>
	<div id='ext_body'>
	</div>
	";
}
else
{
	require 'logout.php';
}
?>
