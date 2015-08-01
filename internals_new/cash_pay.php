<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require("sql_con.php");

	$cart=$_POST["cart"];
	$team=$_POST["team"];
	$rr = "cash";
	$cord_login = $_SESSION["regno"];
	$regno=$_POST['regno'];
	$sum=0;
	$date = date("Y-m-d");
	$time = date("h:i:s");

	$res2="";
	echo"<div class='container row'><TABLE  class='striped'><TR><TH>Name</TH><TH>Price</TH><TH>Team Size</TH></TR>";
	if($cart!="")
	{
		$cart_array = explode(",",$cart);
		$team_array = explode(",",$team);
		for($i=0;$i<count($cart_array);$i++)
		{
			$q = "SELECT * FROM `events` WHERE `id`=$cart_array[$i]";
			$r = mysqli_query($mysqli,$q);
			$t=mysqli_fetch_array($r);
			$q1= "INSERT INTO `internal_registration` (`id`, `regno`, `event_id`, `team`, `price` ,`date`, `time`, `rrno` ,`cord_login`) VALUES (NULL, '$regno', '$t[0]', '$team_array[$i]', '$t[2]','$date','$time','$rr','$cord_login')";
			$res = mysqli_query($mysqli,$q1);
			if($res==true)
			{
				$q2 = "UPDATE `events` SET `filled_seats`= `filled_seats`+$team_array[$i] WHERE `id`= '$t[0]'";
				$res2 = mysqli_query($mysqli,$q2);
				$sum+=$t[2];
				echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$team_array[$i]</TD>";
			}
		} 
		if($res2)
		{
			echo"</TABLE><B>TOTAL = $sum <br>Receipt No: $rr</B><br><div class=' fixed-action-btn' style='bottom: 30px; right: 24px;'>Home<br>
				<a class='red btn-floating btn-large waves-effect modal-trigger z-depth-3' title='Home' href='home.php'>
					<i class='large material-icons'>home</i>
				</a>
			</div>";
		}
		else
			echo "error";
	}
}
else
	require("logout.php");
?>
