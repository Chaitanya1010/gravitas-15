<?php
$p = $_POST["p"];
$r = $_POST["r"];
require("sql_con.php");
$q1 = "UPDATE `external_participants` SET `pword` = '$p' WHERE `regno`='$r'";
if(mysqli_query($mysqli,$q1))
	echo "Voila!! Login Again";
else
	echo "Oh Snap!! Some Error!!";
?>