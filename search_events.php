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
echo "<TABLE BORDER=1><TR><TH>NAME</TH><TH>PRICE</TH><TH>TEAM SIZE</TH><TH>CART</TH>";
$r = mysqli_query($mysqli,$q);
while($t=mysqli_fetch_array($r))
{
	if($t[3]>$t[4]) // total_seats>filled_seats
	{
		if($t[5]!=0) // Not 0 means, whatever is the team strength given that has to be added
		{
			$select_id = $t[0]."select";
			echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD><LABEL ID= '$select_id'>$t[5]</LABEL></TD><TD><input type ='button' value='Add' id='$t[0]' onclick='add_to_cart(this.id)'></TD></TR>";
		}
		else //variable team size
		{
			$select_id = $t[0]."select";
			$select="<SELECT id='$select_id'><OPTION VALUE ='$t[6]' SELECTED>$t[6]</OPTION>";
			for($i = $t[6]+1; $i<=$t[7];$i++)
				$select .="<OPTION VALUE ='$i'>$i</OPTION>";
			$select.="</SELECT>";
			echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$select</TD><TD><input type ='button' value='Add' id='$t[0]' onclick='add_to_cart(this.id)'></TD></TR>";
		}
	}
}
?>