<?php
require("sql_con.php");
$cart_array = array();
$ids="";
$key = $_POST["key"];
$type =  $_POST["type"];
$cart = $_POST["cart"];
$regno="12nmh";//take from sessions
$q="";


if($key=="body")
	$q = "SELECT * FROM `events` WHERE `type`= $type ";
else
	$q = "SELECT * FROM `events` WHERE `name` LIKE '$key%' AND `type` = $type ";

//Event for which the student has already registered
$event_id = array();
$i=0;
$eve_id="";
$q1 = "SELECT * FROM `registration` WHERE `regno` = '$regno'  AND `paid_status`=1";
$r1 = mysqli_query($mysqli,$q1);
while($t1=mysqli_fetch_array($r1))
{
	$event_id[$i++] = $t1[2];
}
if($i!=0)
{
	for($j=0;$j<count($event_id);$j++)
		$event_id[$j] = "'".$event_id[$j]."'";
	$eve_id= implode(",",$event_id);
}

if($eve_id!="")
	$q.="AND `id` NOT IN ($eve_id)";

//Events in cart
if($cart!="")
{
	$cart_array = explode(",",$cart);
	for($i=0;$i<count($cart_array);$i++)
		$cart_array[$i] = "'".$cart_array[$i]."'";
	$cart = implode(",",$cart_array);
	$q.= " AND `id` NOT IN ($cart)";
}
echo "<TABLE class='hoverable centered'><thead><TR><TH>NAME</TH><TH>PRICE(&#8377;)</TH><TH>TEAM SIZE</TH><TH>CART</TH></tr></thead>";
$r = mysqli_query($mysqli,$q);
while($t=mysqli_fetch_array($r))
{
	if($t[3]>$t[4]) // total_seats>filled_seats
	{
		if($t[5]!=0) // Not 0 means, whatever is the team strength given that has to be added
		{
			$select_id = $t[0]."select";
			echo "<TR><TD>$t[1]</TD><TD> $t[2]</TD><TD><LABEL ID= '$select_id'>$t[5]</LABEL></TD><TD><input type ='button' value='Add' id='$t[0]' onclick='add_to_cart(this.id)'></TD></TR>";
		}
		else //variable team size
		{
			$select_id = $t[0]."select";
			$select="<SELECT id='$select_id' class='browser-default'><OPTION VALUE ='$t[6]' SELECTED>$t[6]</OPTION>";
			for($i = $t[6]+1; $i<=$t[7];$i++)
				$select .="<OPTION VALUE ='$i'>$i</OPTION>";
			$select.="</SELECT>";
			echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$select</TD><TD><input type ='button' value='Add' id='$t[0]' onclick='add_to_cart(this.id)'></TD></TR>";
		}
	}
}
?>
