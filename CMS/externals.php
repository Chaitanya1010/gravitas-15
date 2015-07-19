<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require 'sql_con.php';
	echo"
	<button id='reg' name='reg' onclick='reg_students()'>Registered Students</button>
	<button id='app_dd' name='app_dd' onclick='app_dd()'>Approve DD</button>
	<div id='ext_body'>
	</div>
	";
}
else
{
	require 'logout.php';
}
?>