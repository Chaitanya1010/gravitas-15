<?php
$cart=$_POST["cart"];
if($cart!="")	
{
	$cart_array = explode(",",$cart);
	for($i=0;$i<count($cart_array);$i++)
	{
		echo $cart_array[$i];
		echo "<input type='button' value='X' onclick='del_cart($i)'>";
	}
}
?>