<?php
session_start();
if(isset($_SESSION["regno"]))
{
	$val = $_POST["val"];
	require 'sql_con.php';
	$sql = "SELECT * FROM `dd_payment` WHERE `ddno` LIKE '$val%'  AND `paid_status` = '0'";
	echo "<TABLE><TR><TH>DD Number</TH><TH>Register Number</TH><TH>Sum</TH><TH>Bank Name</TH><TH>DD Date</TH><TH>Approve</TH></TR>";
	$res = mysqli_query($mysqli,$sql);
	while($arr = mysqli_fetch_array($res))
	{
		echo "<TR><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td><td><input type='button' onclick='approve_ddno($arr[0])' value='approve'></td></TR>";
	}
	echo '</table>';
}
else
{
	require 'logout.php';
}
?>