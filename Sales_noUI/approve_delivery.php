<?php
	session_start();
	if((isset($_SESSION['regno']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];
		

		$sql_approve="UPDATE  `order_sales` SET  `delivery_status` =  '1' WHERE  `order_sales`.`unique_id` =$id;";
		$res_approve=mysqli_query($mysqli,$sql_approve);
		
		if($res_approve)
		{
			echo "<br/><b>Approved</b><br/>";
		}
	}
	else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['id']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['id']))))
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:login_approve.php");
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