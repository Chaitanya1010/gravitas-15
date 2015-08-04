<?php
if(isset($_SESSION["regno"]))
{
	require("sql_con.php");
	$regno = $_POST["regno"];
	$q = "SELECT * FROM `internal_registration` WHERE `regno` = '$regno'";
	$r = mysqli_query($mysqli,$q);
	echo "<TABLE class='striped'><TR><TH>Event Name</TH><TH>Team Size</TH></TR>";
	while($t=mysqli_fetch_array($r))
	{
		$event_id = $t["event_id"];
		$team = $t["team"];
		$q1 = "SELECT * FROM `events` WHERE `id` = $event_id";
		$r1 = mysqli_query($mysqli,$q1);
		$t1=mysqli_fetch_array($r1);
		$event_name = $t1["name"];
		echo "<TR><TD>$event_name</TD><TD>$team</TD>";
		
	}
	echo"</TABLE>";
}
else
	require("logout.php");
?>
