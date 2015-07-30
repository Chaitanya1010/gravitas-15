<?php
session_start();
if((isset($_SESSION["id"]))&&(isset($_REQUEST['key'])))
{
	require("sql_con.php");
	$regno=$_SESSION["id"];//take from sessions

	$cart_array = array();
	$ids="";
	$key = $_POST["key"];
	$type =  $_POST["type"];
	$cart = $_POST["cart"];

	$q="";

	if($key=="body")
		$q = "SELECT * FROM `events` WHERE `type`= $type ";
	else
		$q = "SELECT * FROM `events` WHERE `name` LIKE '$key%' AND `type` = $type ";

	//Event for which the student has already registered
	$event_id = array();
	$i=0;
	$eve_id="";
	$q1 = "SELECT * FROM `external_registration` WHERE `regno` = '$regno' ";
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
	echo "<TABLE class='hoverable bordered'><thead><TR><TH>Name </TH><TH>Price (&#8377;) </TH><TH>Team Size</TH><TH>Available Seats</TH><TH>Cart</TH></tr></thead>";
	$r = mysqli_query($mysqli,$q);
	while($t=mysqli_fetch_array($r))
	{
		$avail = $t[5]-$t[6];
		if($t[5]>$t[6]) // total_seats>filled_seats
		{
			if($t[7]!=0) // Not 0 means, whatever is the team strength given that has to be added
			{
				$select_id = $t[0]."select";
				echo "<TR><TD>$t[1]</TD><TD> $t[2]</TD><TD><LABEL class='black-text' ID= '$select_id'>$t[7]</LABEL></TD><TD>$avail</TD><TD><button class='green darken-3 btn-floating z-depth-1' id='$t[0]' onclick='add_to_cart(this.id)'><i class='material-icons'>add</i></button></TD></TR>";
			}
			else //variable team size
			{
				$select_id = $t[0]."select";
				$select="<SELECT style='width: 130px' id='$select_id' class='browser-default'><OPTION VALUE ='$t[8]' SELECTED>$t[8]</OPTION>";
				for($i = $t[8]+1; $i<=$t[9];$i++)
					$select .="<OPTION VALUE ='$i'>$i</OPTION>";
				$select.="</SELECT>";
				echo "<TR><TD>$t[1]</TD><TD>$t[2]</TD><TD>$select</TD><TD>$avail</TD><TD><button class='green darken-3 btn-floating z-depth-1' id='$t[0]' onclick='add_to_cart(this.id)'><i class='material-icons'>add</i></button></TD></TR>";
			}
		}
	}
}
	else if((isset($_SESSION['id']))&&(!isset($_REQUEST['key']))||((!isset($_SESSION['id']))&&(!isset($_REQUEST['key']))))
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:index.php");
	}
	else
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		echo "<div>Ah4*!bb dhS8!) Nh5@n</div>";
		exit();
	}
?>
