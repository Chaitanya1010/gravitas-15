<?php
require("sql_con.php");
$regno="12nmh"; // Take from sessions
$q = "SELECT * FROM `registration` WHERE `regno` = '$regno'";
$r = mysqli_query($mysqli,$q);
echo "<TABLE class='striped'><TR><TH>Event Name</TH><TH>Team Size</TH><th>Payment Status</th></TR>";
while($t=mysqli_fetch_array($r))
{
	$event_id = $t[2];
	$team = $t[3];
	$paid = $t[7];
	$q1 = "SELECT * FROM `events` WHERE `id` = $event_id";
	$r1 = mysqli_query($mysqli,$q1);
	$t1=mysqli_fetch_array($r1);
	$event_name = $t1[1];
	echo "<TR><TD>$event_name</TD><TD>$team</TD>";
	if($paid=='1')
	{
		echo "<td>Paid</td></tr>";
	}
	else
		echo "<td>Not Paid</td></tr>";

}
echo"</TABLE>";

?>
