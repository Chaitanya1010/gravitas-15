<?php
require("sql_con.php");
$cart=$_POST["cart"];
$team=$_POST["team"];
$sum=0;
echo"<TABLE BORDER=1><TR><TH>Name</TH><TH>Price</TH><TH>Team</TH><TH>Remove</TH></TR>";
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
		echo "<TD><input type='button' value='X' onclick='del_cart($i)'></TD>";
	}
	echo"</TABLE><B>TOTAL = $sum</B><br>";
	echo"<INPUT TYPE='button' value='Proceed' onclick='proceed_1()' id='proceed_1' name='proceed_1'>";
}
?>