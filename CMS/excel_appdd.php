<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require '../sql_con.php';
	
	$d=date('d/m/Y');
	$file_name = "DD_Unapproved_$d.xls";
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=$file_name" );
	
	$sql = "SELECT * FROM `dd_payment` where `paid_status` = '0'";
	echo "DD Number\tRegister Number\tSum\tBank Name\tDD Date\r\n";
	$res = mysqli_query($mysqli,$sql);
	while($arr = mysqli_fetch_array($res))
	{
		echo "$arr[0]\t$arr[1]\t$arr[2]\t$arr[3]\t$arr[4]\r\n";
	}
}
else
{
	require 'logout.php';
}
?>