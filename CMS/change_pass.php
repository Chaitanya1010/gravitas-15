<?php
session_start();
if((isset($_SESSION["regno"]))&&(isset($_REQUEST['p'])))
{
	$regno = $_SESSION["regno"];
	require 'sql_con.php';
	$p = $_POST["p"];
	$q ="UPDATE `login_cms` SET `password`='$p' WHERE `regno`= '$regno'";
	if(mysqli_query($mysqli,$q))
		echo "<br>Voila!!Password Changed!";
	else
		echo "<br>Oh Snap!! Error in Changing Password!!";
}
else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['p']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['p']))))
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