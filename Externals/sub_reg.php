<?php
require("sql_con.php");
$name=$_POST["name"];
$regno = $_POST["regno"];
$gen= $_POST["gen"];
$college=$_POST["college"];
$ph=$_POST["ph"];
$email=$_POST["email"];
$clgref=$_POST["clgref"];
$vitref=$_POST["vitref"];
$q ="INSERT INTO `external_participants` (`name`, `regno`, `gender`, `college`, `phno`, `email`, `vitref`, `clgref`,`acc_details`) VALUES ('$name', '$regno', '$gen', '$college', '$ph', '$email', '$vitref', '$clgref','1');";
$res = mysqli_query($mysqli,$q);
if($res==true)
	echo 1;
else
	echo 0;

?>