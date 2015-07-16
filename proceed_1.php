<?php
require("sql_con.php");
$cart=$_POST["cart"];
$team=$_POST["team"];
$sum=0;
?>
<div class="container row">
<?php
echo"<br /><br /><TABLE class='col s6'><tr><th class='light'>Name</th><th class='light'>Price</th><th class='light'>Team Size</th></tr>";
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
	echo"</TABLE><br /><B>TOTAL = $sum</B><br>";
	echo"Payment Mode:<br><input type='radio' name='pay' id='pay1' value='0' onclick='demand_draft()'><label for='pay1'>Demand Draft</label><input type='radio' name='pay' id='pay2' value='1' checked><label for='pay2'>Online Payment</label><br>";
	echo"<div id='dd'></div><br><div style='float:right'><button class='btn waves-effect waves-light blue-grey darken-4' onclick='back()' id='back' name='back'>Edit <i class='material-icons'>loop</i></button>";
	echo"<button class='btn waves-effect waves-light blue-grey darken-4' onclick='checkout()' id='proceed_2' name='proceed_2'>Checkout <i class='material-icons'>verified_user</i></button></div>";
}
?>
</div>
