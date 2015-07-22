<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require("sql_con.php");
	$regno = $_POST["regno"];
	$q = "SELECT * FROM `internal_participants` WHERE `regno`='$regno'";
	$res = mysqli_query($mysqli,$q);
	$c = mysqli_num_rows($res);
	if($c==1)
	{
		header("Location:event_list.php");
	}
	else
	{
		header("Location:external_reg.php");
	}
}
else
	require("logout.php");
?>