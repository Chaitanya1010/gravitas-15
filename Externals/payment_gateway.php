<?php
session_start();
if((isset($_SESSION["id"]))&&(isset($_REQUEST['t'])))
{
	$trans_id = $_POST["t"];
	$sum = $_POST["s"];
	//Payment Gateway
		$post_url = "https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp";		  
		$post_string = "id_trans=".$trans_id."&id_event=07&amt_event=".$sum."&id_merchant=1006&id_password=g6v!ta$1516_V&id_name=GRAVITAS-2015&rturl=http://www.vitgravitas.com/externals/payment_return.php";
		$request = curl_init($post_url); // initiate curl object
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
		$post_response = curl_exec($request); // execute curl post and store results in $post_response
		echo $post_response;
		curl_close ($request);
}
else
{	
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:index.php");
		exit();		
}
?>