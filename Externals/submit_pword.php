<?php
	session_start();
	if((isset($_SESSION["id"]))&&(isset($_REQUEST['p'])))
	{
		$p = $_POST["p"];
		$r = $_POST["r"];
		require("sql_con.php");
		$q1 = "UPDATE `external_participants` SET `pword` = '$p' WHERE `regno`='$r'";
		if(mysqli_query($mysqli,$q1))
			echo "Voila!! Password Changed!!";
		else
			echo "Oh Snap!! Some Error!!";
	}
	else if((isset($_SESSION['id']))&&(!isset($_REQUEST['p']))||((!isset($_SESSION['id']))&&(!isset($_REQUEST['p']))))
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