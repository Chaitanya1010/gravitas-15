<?php
session_start();
if(isset($_SESSION["id"]))
{
	$uname = $_SESSION["id"];
	$committee = substr($uname,"0","-11");
	$name = $_POST["name"];
	$regno = $_POST["regno"];
	$work = $_POST["work"];
	$date_1 = $_POST["date"];
	$date = date_create_from_format('j M, Y', $date_1);
	$date = date_format($date, 'Y-m-d');
	$school = $_POST["school"];
	$year = $_POST["year"];
	$ft = $_POST["from_time"];
	$tt = $_POST["to_time"];
	require("sql_con.php");
	$q ="INSERT INTO `od_list`(`regno`, `name`, `school`, `year`, `work_done`, `od_date`, `from_time`, `to_time`, `committee`) VALUES ('$regno','$name','$school','$year','$work','$date','$ft','$tt','$committee')";
	$res = mysqli_query($mysqli,$q);
	if($res)
		echo 0;
	else
		echo 1;
}
else
{

}
?>