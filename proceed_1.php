<?php
require("sql_con.php");
$cart=$_POST["cart"];
$team=$_POST["team"];
$sum=0;
?>
<div class="container row">
<?php
echo"<br /><br /><TABLE class='striped card card-content col s6' style='margin-right:2em'><tr><th>Name</th><th>Price(&#8377;)</th><th>Team Size</th></tr>";
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
	echo"</TABLE><br /><B>TOTAL = &#8377; $sum<br>";
	echo"Payment Mode:</B><div class='input-field'><input type='radio' name='pay' id='pay1' value='0' onclick='demand_draft(this.value)' class='with-gap indigo'><label for='pay1'>Demand Draft  </label><input type='radio' name='pay' id='pay2' value='1'  class='with-gap'checked onclick='demand_draft(this.value)'><label for='pay2'>Online Payment</label><br>";
	echo"<div id='dd'></div><br><div style='float:right'><button class='btn waves-effect waves-light indigo darken-4' onclick='back()' id='back' name='back'>Back<i class='material-icons left'>fast_rewind</i></button>&nbsp;&nbsp;";
	echo"<button class='btn waves-effect waves-light indigo darken-4' onclick='checkout()' id='proceed_2' name='proceed_2'><i class='material-icons left'>done_all</i>Checkout </button></div></div>";
}
?>
</div>

