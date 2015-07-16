<?php
require("sql_con.php");
$regno="12nmh"; // Take from sessions
$q = "SELECT * FROM `registration` WHERE `regno` = '$regno'  AND `paid_status`=1";
$r = mysqli_query($mysqli,$q);
echo "<TABLE><TR><TH class='light'>Event ID</TH><TH class='light'>Event Name</TH></TR>";
while($t=mysqli_fetch_array($r))
{
	$event_id = $t[2];
	$q1 = "SELECT * FROM `events` WHERE `id` = $event_id";
	$r1 = mysqli_query($mysqli,$q1);
	$t1=mysqli_fetch_array($r1);
	$event_name = $t1[1];
	echo "<TR><TD>$event_id</TD><TD>$event_name</TD></TR>";
}
echo"</TABLE>";

?>
