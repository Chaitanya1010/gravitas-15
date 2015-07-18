<?php
session_start();
if(isset($_SESSION["regno"]))
{
	$regno = $_SESSION["regno"];
	require '../sql_con.php';
	$p = $_POST["p"];
	$q ="UPDATE `login_cms` SET `password`='$p' WHERE `regno`= '$regno'";
	if(mysqli_query($mysqli,$q))
		echo "Voila!!Password Changed!";
	else
		echo "Oh Snap!! Error in Changing Password!!";
}
else
{
	require 'logout.php';
}
	