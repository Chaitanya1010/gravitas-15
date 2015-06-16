<?php
require("sql_con.php");
$cart=$_POST["cart"];
$team=$_POST["team"];
$sum=0;
$trans_id="";
$regno ="12nmh";//Must be taken from cookies
if($cart!="")	
{
	$cart_array = explode(",",$cart);
	$team_array = explode(",",$team);
	//Create a unique transaction id 
	$q3 = "INSERT INTO `online_payment` (`trans_id`, `regno`, `sum`) VALUES (NULL, '$regno', '')";
	$res3 = mysqli_query($mysqli,$q3);
	if($res3==true)
	{
		$q4 = "SELECT `trans_id` FROM `online_payment` WHERE `regno` = '$regno' AND `sum`=''";
		$res4 = mysqli_query($mysqli,$q4);
		$arr = mysqli_fetch_array($res4);
		$trans_id = $arr[0];
		for($i=0;$i<count($cart_array);$i++)
		{
			$q = "SELECT * FROM `events` WHERE `id`=$cart_array[$i]";
			$r = mysqli_query($mysqli,$q);
			$t=mysqli_fetch_array($r);

			$q1= "INSERT INTO `registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd` , `trans_id` , `paid_status`) VALUES (NULL, '$regno', '$t[0]', '$team_array[$i]', '$t[2]','0','$trans_id', '0')";
			$res = mysqli_query($mysqli,$q1);
			if($res==true)
			{
				$q2 = "UPDATE `events` SET `filled_seats`= `filled_seats`+$team_array[$i] WHERE `id`= '$t[0]'";
				$res2 = mysqli_query($mysqli,$q2);
				$sum+=$t[2];
			} 
		}
		$q5 = "UPDATE `online_payment` SET `sum`='$sum' WHERE `trans_id`='$trans_id' AND `regno`='$regno'";
		mysqli_query($mysqli,$q5);
		
		//Payment Gateway
		$post_url = "https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp";		  
		$post_string = "id_trans=".$trans_id."&id_event=07&amt_event=".$sum."&id_merchant=1006&id_password=g6v!ta$1516_V&id_name=GRAVITAS-2015&rturl=https://localhost/gravitas-15/test";
		$request = curl_init($post_url); // initiate curl object
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
		$post_response = curl_exec($request); // execute curl post and store results in $post_response
		curl_close ($request);
		echo $post_response;
	}
	else
		echo "Error in generating transaction ID";
}
?>