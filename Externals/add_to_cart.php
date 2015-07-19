<?php
session_start();
if(isset($_SESSION["id"]))
{
	require("sql_con.php");
	$cart=$_POST["cart"];
	$team=$_POST["team"];
	$sum=0;
	?>
	<div class="modal-content">
	<?php
	echo"<TABLE class='striped'><TR><TH class='dark'>Name</TH><TH class='dark'>Price (&#8377;) </TH><TH class='dark'>Team</TH><TH class='dark'>Remove</TH></TR>";
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
			echo "<TD><button class='red darken-3 btn-floating' onclick='del_cart($i)'><i class='material-icons'>clear</i></button></TD>";
		}
		echo"</TABLE></div>
		<div class='modal-footer'>
		<B>TOTAL = &#8377; $sum</B>";
		echo"<button id='proceed' name='proceed' class='btn waves-effect waves-light indigo darken-4' style='float:right;margin-right:1em' onclick='proceed_1()' id='proceed_1' name='proceed_1'  ><i class='material-icons right'>send</i>Proceed</button>";
	}
	else
		echo "<TR><td colspan='4' align='center'>No Events Added Yet</TD></tr></Table>";
}
else
	require("logout.php");
?>
</div>
