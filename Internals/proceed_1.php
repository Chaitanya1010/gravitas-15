<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require("sql_con.php");
	$cart = $_POST["cart"];
	$team = $_POST["team"];
	$regno = $_POST["regno"];
	$combo = $_POST["combo"];
	$phno = $_POST["phno"];
	$combo_array = explode(",",$combo);
	$sum = 0;
	$flag = 0;
	if($combo_array[0]!="")
		$flag = 1;
	?>
	<div class="container row">
	<?php
	echo"<br/><br/><h5>Reg No: $regno <br/>Mobile No: $phno </h5><TABLE class='striped card card-content col s6' style='margin-right:2em'><tr><th>Name</th><th>Price/Participant(&#8377;)</th><th>Total Price(&#8377;)</th><th>Team Size</th></tr>";
	if($cart!="")
	{
		
		$cart_array = explode(",",$cart);
		$team_array = explode(",",$team);
		for($i=0;$i<count($cart_array);$i++)
		{
			$val=0;
			$q = "SELECT * FROM `events` WHERE `id`=$cart_array[$i]";
			$r = mysqli_query($mysqli,$q);
			$t = mysqli_fetch_array($r);
			$val = $t[2]*$team_array[$i]; 
			$sum+=$val;
			echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$val</TD><TD>$team_array[$i]</TD>";
		}
		
		echo"<TR><TH>Total</TH><TH colspan='3'>&#8377; $sum</TH></TR></TABLE>";
		echo"<b>Payment Mode:</B><div class='input-field'><input type='radio' name='pay' id='pay1' value='0' onclick='payment(this.value)' class='with-gap indigo'><label for='pay1'>Card Payment</label><BR/><input type='radio' name='pay' id='pay2' value='1'  class='with-gap'checked onclick='payment(this.value)'><label for='pay2'>Cash Payment</label><br>";
		echo"<div id='dd'></div><br></div>";
		if($flag==1)
		{
			echo "<br/><br/><br/><br/><br/><br/><div class ='container row'><div class='card card-content'><TABLE class='striped'><TR><TH>S.No</TH><TH>Combo Workshops</TH></TR>";
			for($i=0;$i<count($combo_array);$i++)
			{
				$q = "SELECT * FROM `events` WHERE `id` = '$combo_array[$i]'";
				$r = mysqli_query($mysqli,$q);
				$a = mysqli_fetch_array($r);
				$j = $i+1;
				echo "<TR><TD> $j</TD><TD>$a[1]</TD></TR>";
			}
			echo "</TABLE></div></div>";
		}
	}
}
else
	require("logout.php");
?>
</div>

