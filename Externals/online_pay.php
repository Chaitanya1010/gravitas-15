<?php
session_start();
if(isset($_SESSION["id"]))
{
	require("sql_con.php");
	$regno =$_SESSION["id"];//Must be taken from session
	
	$cart=$_POST["cart"];
	$team=$_POST["team"];
	$sum=0;
	$trans_id="";
	$date = date("Y-m-d");

	if($cart!="")	
	{
		$cart_array = explode(",",$cart);
		$team_array = explode(",",$team);
		//Create a unique transaction id 
		$q3 = "INSERT INTO `online_payment` (`trans_id`, `regno`, `sum`,`date`) VALUES (NULL, '$regno', '','$date')";
		$res3 = mysqli_query($mysqli,$q3);
		if($res3==true)
		{
			$q4 = "SELECT `trans_id` FROM `online_payment` WHERE `regno` = '$regno' AND `sum`='' AND `date`='$date' " ;
			$res4 = mysqli_query($mysqli,$q4);
			$arr = mysqli_fetch_array($res4);
			$trans_id = $arr[0];
			for($i=0;$i<count($cart_array);$i++)
			{
				$q = "SELECT * FROM `events` WHERE `id`=$cart_array[$i]";
				$r = mysqli_query($mysqli,$q);
				$t=mysqli_fetch_array($r);

				$q1= "INSERT INTO `external_registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd` , `trans_id` , `paid_status`,`date`) VALUES (NULL, '$regno', '$t[0]', '$team_array[$i]', '$t[2]','0','$trans_id', '0','$date')";
				$res = mysqli_query($mysqli,$q1);
				if($res==true)
				{
					$q2 = "UPDATE `events` SET `filled_ext`= `filled_ext`+$team_array[$i] WHERE `id`= '$t[0]'";
					$res2 = mysqli_query($mysqli,$q2);
					$sum+=$t[2];
				} 
			}
			$q5 = "UPDATE `online_payment` SET `sum`='$sum' WHERE `trans_id`='$trans_id' AND `regno`='$regno'";
			if(mysqli_query($mysqli,$q5))
			{
				echo"<form style='display: hidden' action='payment_gateway.php' method='POST' id='form'>
							<input type='hidden' id='t' name='t' value='$trans_id'/>
							<input type='hidden' id='s' name='s' value='$sum'/>
							</form>";
			}
			else
				echo "error";
		}
		else
			echo "Error in generating transaction ID";
	}
}
else
	require("logout.php");
?>