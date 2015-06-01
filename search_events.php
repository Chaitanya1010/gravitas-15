<?php
require("sql_con.php");
$cart_array = array();
$ids="";
$key = $_POST["key"];
$type =  $_POST["type"];
$cart = $_POST["cart"];
$q="";

if($key=="body")
	$q = "SELECT * FROM `events` WHERE `type`= $type";
else
	$q = "SELECT * FROM `events` WHERE `name` LIKE '$key%' AND `type` = $type";

if($cart!="")	
{
	$cart_array = explode(",",$cart);
	for($i=0;$i<count($cart_array);$i++)
		$cart_array[$i] = "'".$cart_array[$i]."'";
	$cart = implode(",",$cart_array);
	$q.= " AND `id` NOT IN ($cart)"; 
}
$r = mysqli_query($mysqli,$q);
while($t=mysqli_fetch_array($r))
{
	echo "$t[1]\t<input type ='button' value='Add' id='$t[0]' onclick='add_to_cart(this.id)'><br>";
}
?>