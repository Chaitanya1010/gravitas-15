<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require 'sql_con_reg.php';
		
		$d=date('d/m/Y');
		$file_name = "Internals_Registered_$d.xls";
		header( "Content-Type: application/vnd.ms-excel" );
		header( "Content-disposition: attachment; filename=$file_name" );
		
		$sum=0;
		$participants=0;
		$q = "SELECT * FROM `internal_registration`";
		$r = mysqli_query($mysqli,$q);
		echo "Id\tName\tRegno\tEvent Name\tAmount\tTeam Size\n\r";
		while($t=mysqli_fetch_array($r))
		{
			$id = $t['id'];
			$name=$t['name'];
			$regno = $t['regno'];
			$event_id = $t['event_id'];
			$team = $t['team'];
			$price =$t['price'];

			$sum+=$price;
			$participants+=$team;

			$q1 = "SELECT * FROM `events` WHERE `id` = $event_id";
			$r1 = mysqli_query($mysqli,$q1);
			$t1=mysqli_fetch_array($r1);
			$event_name = $t1['name'];
			

			echo "$id\t$name\t$regno\t$event_name\t$price\t$team\r\n";
		}
		echo "\n\n Total number of Registrations :\t $participants \nTotal amount collected:\t$sum";
	}
	else
	{
		require 'logout.php';
	}
?>