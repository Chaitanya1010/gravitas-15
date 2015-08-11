<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];
		
		$mode=$_SESSION['mode'];

		if($mode==55)
			$sql_approve="UPDATE  `finance`.`mode_cash_expenditure` SET  `approval_1` =  '1' WHERE  `mode_cash_expenditure`.`unique_id_note` =$id;";
		
		$res_approve=mysqli_query($mysqli,$sql_approve);
		
		
		$mode_revenue=0;
		$mode_payement=0;

		if(($res_approve)&&($mode==55)) 
		{
			echo "</br><b>Approved</b></br>";
			//require("mail.php");
		}
	}
	else if((isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id']))||((!isset($_SESSION['name_fin']))&&(!isset($_REQUEST['id']))))
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