<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require("sql_con.php");

	$cart=$_POST["cart"];
	$team=$_POST["team"];
	$combo=$_POST["combo"];

	$rr = "cash";
	
	$cord_login = $_SESSION["regno"];
	$regno=$_POST['regno'];
	$phno = $_POST['phno'];
	
	$date = date("Y-m-d");
	$time = date("h:i:s");

	$sum=0;
	$regi_no="";
	$res2="";
	echo"<br/><br/><div class='container row'><b>Voila!! Successfully Registered!!</b><br/><br/><TABLE  class='striped'><TR><TH>Name</TH><TH>Price</TH><TH>Team Size</TH></TR>";
	if($cart!="")
	{
		$cart_array = explode(",",$cart);
		$team_array = explode(",",$team);
		$combo_array = explode(",",$combo);

		for($i=0;$i<count($cart_array);$i++)
		{
			$q = "SELECT * FROM `events` WHERE `id`= '$cart_array[$i]'";
			$r = mysqli_query($mysqli,$q);
			$t = mysqli_fetch_array($r);
			$val = $t[2] * $team_array[$i]; 
			$q1= "INSERT INTO `internal_registration` (`id`, `regno`, `event_id`, `team`, `price` ,`date`, `time`, `rrno` ,`phno`,`cord_login`) VALUES (NULL, '$regno', '$t[0]', '$team_array[$i]', '$val','$date','$time','$rr','$phno','$cord_login')";
			$res = mysqli_query($mysqli,$q1);
			if($res==true)
			{
				$q2 = "UPDATE `events` SET `filled_seats`= `filled_seats`+$team_array[$i] WHERE `id`= '$t[0]'";
				$res2 = mysqli_query($mysqli,$q2);
				$sum+=$val;
				echo "<TR><TD>$t[1]</TD><TD>$val</TD><TD>$team_array[$i]</TD>";
				
				$q3 = "SELECT * FROM `internal_registration` WHERE `regno`='$regno' AND `event_id`='$cart_array[$i]'"; 
				$res3 = mysqli_query($mysqli,$q3);
				$arr3 = mysqli_fetch_array($res3);
				$regi_no = $arr3[0];
				if($cart_array[$i]==2165||$cart_array[$i]==2169)
				{
					$q4 = "INSERT INTO `combos`(`reg_id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES ('$regi_no','$combo_array[0]','$combo_array[1]','$combo_array[2]','$combo_array[3]','$combo_array[4]','$combo_array[5]','$combo_array[6]','$combo_array[7]','$combo_array[8]','$combo_array[9]')";
					mysqli_query($mysqli,$q4);
				}
			}
			else
				echo "Error 1";
		} 
		if($res2)
		{
			echo"</TABLE><br/><br/><B>TOTAL = $sum <br>Registration No: $regi_no </B><br><div class=' fixed-action-btn' style='bottom: 30px; right: 24px;'>Home<br>
				<a class='red btn-floating btn-large waves-effect modal-trigger z-depth-3' title='Home' href='home.php'>
					<i class='large material-icons'>home</i>
				</a>
			</div>";
			$to="";
			$sub="GraVITas'15 | Event Registration";
			$message="";
			//mail($to,$sub,$message);
		}
		else
			echo "Error 2";
	}
}
else
	require("logout.php");
?>
