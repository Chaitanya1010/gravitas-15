<?php
session_start();
if((isset($_SESSION["regno"]))&&(isset($_REQUEST['name'])))
{
	require 'sql_con.php';
	$name = $_POST["name"];
	$tseats = $_POST["tseats"];
	$tseats_ext = $_POST["tseats_ext"];
	$price = $_POST["price"];
	$team = $_POST["size"];
	$min = $_POST["min"];
	$max = $_POST["max"];
	$cat = $_POST["cat"];
	$q = "INSERT INTO `events` (`id`, `name`, `price`, `total_seats`, `filled_seats`, `total_ext`, `filled_ext`,`team`, `min`, `max`, `type`) VALUES (NULL, '$name', '$price', '$tseats', '0', '$tseats_ext','0','$team', '$min', '$max', '$cat');";
	if(mysqli_query($mysqli,$q))
		echo "<br>Yahooo!! Event successfully Added!";
	else
		echo "<br>Oh Snap!! Some Tech error in adding event!";
}
else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['name']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['name']))))
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
	