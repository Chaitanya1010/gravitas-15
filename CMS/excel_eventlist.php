 <?php
session_start();
if(isset($_SESSION["regno"]))
{
	require '../sql_con.php';
	$id = $_POST["val"];
	$d=date('d/m/Y');
	$file_name = "Registered_Student_$d.xls";
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=$file_name" );
	
	$q = "SELECT * FROM `registration` WHERE `paid_status` = '1' AND `event_id`='$id' ";
	$r = mysqli_query($mysqli,$q);
	echo "Name\tRegno\tEvent Name\tTeam Size\n\r";
	while($t=mysqli_fetch_array($r))
	{
		$regno = $t[1];
		$event_id = $t[2];
		$team = $t[3];
		$paid = $t[7];
		$q1 = "SELECT * FROM `events` WHERE `id` = $event_id";
		$r1 = mysqli_query($mysqli,$q1);
		$t1=mysqli_fetch_array($r1);
		$event_name = $t1[1];
		$q2 = "SELECT * FROM `external_participants` WHERE `regno` ='$regno'";
		$r2 = mysqli_query($mysqli,$q2);
		$t2 = mysqli_fetch_array($r2);
		$name = $t2[1];
		echo "$name\t$regno\t$event_name\t$team\r\n";
	}
}
else
{
	require 'logout.php';
}
?>