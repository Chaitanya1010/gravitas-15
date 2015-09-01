<?php
session_start();
if(isset($_SESSION["id"]))
{
		require("sql_con.php");
		$d=date('d/m/Y');
		$file_name = "Onduty_$d.xls";
		header( "Content-Type: application/vnd.ms-excel" );
		header( "Content-disposition: attachment; filename=$file_name" );
		echo "Name\tRegno\tSchool\tYear\tDate\tFrom Time\tTo Time\n";
		$q2 = "SELECT * FROM `od_list` WHERE `preetika` ='1' AND `naiju` = '1' AND `skk`='1' AND `dsw`='0'";
		$res1 = mysqli_query($mysqli,$q2);
		while($arr = mysqli_fetch_array($res1))
		{
			echo "".$arr["name"]."\t".$arr["regno"]."\t".$arr["school"]."\t".$arr["year"]."\t".$arr["od_date"]."\t".$arr["from_time"]."\t".$arr["to_time"]."\n";
		}
}
else
	header("Location:logout.php");