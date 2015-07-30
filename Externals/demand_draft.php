<?php
session_start();
if((isset($_SESSION["id"]))&&(isset($_REQUEST['dd'])))
{
	require("sql_con.php");
	$regno =$_SESSION["id"]; //Must be taken from sessions
	$cart=$_POST["cart"];
	$team=$_POST["team"];
	$dd = $_POST["dd"];
	$dd_date=$_POST['dd_date'];
	$bname=$_POST['bname'];
	$sum=0;
	$date = date("Y-m-d");

	echo"<div class='container row'><TABLE class='striped'><TR><TH>Name</TH><TH>Price</TH><TH>Team Size</TH></TR>";
	if($cart!="")
	{
		$cart_array = explode(",",$cart);
		$team_array = explode(",",$team);
		for($i=0;$i<count($cart_array);$i++)
		{
			$q = "SELECT * FROM `events` WHERE `id`=$cart_array[$i]";
			$r = mysqli_query($mysqli,$q);
			$t=mysqli_fetch_array($r);
			$q1= "INSERT INTO `external_registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd`, `trans_id` , `paid_status`,`date`) VALUES (NULL, '$regno', '$t[0]', '$team_array[$i]', '$t[2]', '$dd', '0','0','$date')";
			$res = mysqli_query($mysqli,$q1);
			if($res==true)
			{
				$q2 = "UPDATE `events` SET `filled_ext`= `filled_ext`+$team_array[$i] WHERE `id`= '$t[0]'";
				$res2 = mysqli_query($mysqli,$q2);
				$sum+=$t[2];
				echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$team_array[$i]</TD>";
			}
		}
		$q3 = "INSERT INTO `dd_payment` (`ddno`, `regno`, `sum`,`bank_name`,`dd_date`) VALUES ('$dd', '$regno', '$sum','$bname','$dd_date')";
		$res3 = mysqli_query($mysqli,$q3);
		if($res3==true)
			echo"</TABLE><B>TOTAL = $sum<br>Demand Draft No: $dd</B><br>Pls Send the Demand Draft within 7 working days with your details to<br>VIT University,<br> Vellore- 632014, <br>Tamil Nadu.<br><div class=' fixed-action-btn' style='bottom: 30px; right: 24px;'>Home<br>
			</div>";
		else
			echo "error";
	}
}
else if((isset($_SESSION['id']))&&(!isset($_REQUEST['dd']))||((!isset($_SESSION['id']))&&(!isset($_REQUEST['dd']))))
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
