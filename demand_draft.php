<?php
require("sql_con.php");
$cart=$_POST["cart"];
$team=$_POST["team"];
$dd = $_POST["dd"];
$sum=0;
$regno ="12nmh";//Must be taken from cookies
echo"<TABLE BORDER=1>";
if($cart!="")	
{
	$cart_array = explode(",",$cart);
	$team_array = explode(",",$team);
	for($i=0;$i<count($cart_array);$i++)
	{
		$q = "SELECT * FROM `events` WHERE `id`=$cart_array[$i]";
		$r = mysqli_query($mysqli,$q);
		$t=mysqli_fetch_array($r);
		$q1= "INSERT INTO `registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd`, `trans_id` , `paid_status`) VALUES (NULL, '$regno', '$t[0]', '$team_array[$i]', '$t[2]', '$dd', '0','0')";
		$res = mysqli_query($mysqli,$q1);
		if($res==true)
		{
			$q2 = "UPDATE `events` SET `filled_seats`= `filled_seats`+$team_array[$i] WHERE `id`= '$t[0]'";
			$res2 = mysqli_query($mysqli,$q2);
			$sum+=$t[2];
			echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$team_array[$i]</TD>";
		}
	}
	echo"</TABLE><B>TOTAL = $sum<br>Demand Draft No: $dd</B><br>Pls Send the Demand Draft within 7 working days with your details to<br>VIT University,<br> Vellore- 632014, <br>Tamil Nadu.";
}
?>