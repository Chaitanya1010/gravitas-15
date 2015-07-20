<?php
session_start();
if(isset($_SESSION["regno"]))
{
	$regno = $_POST["regno"];
	$q = "SELECT * FROM `internal_participants`"
}
else
	require("logout.php");
?>