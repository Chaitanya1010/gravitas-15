<?php
require("sql_con.php");
$cart=$_POST["cart"];
$team=$_POST["team"];
$sum=0;
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
		$sum+=$t[2];
		echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$team_array[$i]</TD>";
	}
	echo"</TABLE><B>TOTAL = $sum</B><br>";
	echo"Payment Mode:<br><input type='radio' name='pay' id='pay' value='0' onclick='demand_draft()'>Demand Draft<input type='radio' name='pay' id='pay' value='1' checked>Online Payment<br>";
	echo"<div id='dd'></div><br><INPUT TYPE='button' value='Edit' onclick='back()' id='back' name='back'>";
	echo"<INPUT TYPE='button' value='Checkout' onclick='checkout()' id='proceed_2' name='proceed_2'>";
}
?>