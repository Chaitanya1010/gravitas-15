<?php
session_start();
if(isset($_SESSION["id"]))
{
	echo "<TABLE class='striped hoverable'><TR><TH>S.No</TH><TH>Name</TH><TH>Regno</TH><TH>Work</TH><TH>Date</TH><TH>From Time</TH><TH>To Time</TH><TH>Committee</TH><TH>Approve</TH></TR>";
	$id = $_POST["id"];
	$uname = $_SESSION["id"];
	$committee = substr($uname,"0","-11");
	require("sql_con.php");
	$q1 = "UPDATE `od_list` SET `$committee` = '1' WHERE `id` = '$id'";
	mysqli_query($mysqli,$q1);
	$f=0;
	$q=0;
	if($committee=="skk")
		$q = "SELECT * FROM `od_list` WHERE `preetika` ='1' AND `naiju` = '1' AND `skk`='0' AND `dsw`='0'";
	else if($committee=="naiju")
		$q = "SELECT * FROM `od_list` WHERE `preetika` ='1' AND `naiju` = '0' AND `skk`='0' AND `dsw`='0'";
	else if($committee=="preetika")
		$q = "SELECT * FROM `od_list` WHERE `preetika` ='0' AND `naiju` = '0' AND `skk`='0' AND `dsw`='0'";
	$res = mysqli_query($mysqli,$q);
	if(mysqli_num_rows($res)!=0)
	{
		while($arr = mysqli_fetch_array($res))
		{
			$f++;
			echo '<tr><td>'.$f.'</td><td>'.$arr["name"].'</td><td>'.$arr["regno"].'</td><td>'.$arr["work_done"].'</td><td>'.$arr["od_date"].'</td><td>'.$arr["from_time"].'</td><td>'.$arr["to_time"].'</td><td>'.$arr["committee"].'</td><td><button id='.$arr["id"].' class="green darken-3 btn-floating z-depth-1" onclick="approve(this.id)"><i class="material-icons">done</i></button></td></tr>';
		}
	}
	else
		echo "<tr><td>No data</td></tr>";
	echo "</table>";
}
else
{

}
?>