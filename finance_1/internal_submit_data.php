<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['number_external'])))//session_variable verification
	{	
		require('sql_con.php');

		$number_external=$_REQUEST['number_external'];
		$amount_external=$_REQUEST['amount_external'];
		$update_ext_date=$_REQUEST['update_ext_date'];
		$remarks_external=$_REQUEST['remarks_external'];
		$update_ext_id=$_REQUEST['update_ext_id'];
		

		$sql_add_externals="INSERT INTO `finance`.`data_internals` (`number_internal`, `amount_internal`, `update_int_date`, `update_int_id`, `remarks_internal`, `approval_1`, `approval_2`, `approval_3`) VALUES ('$number_external', '$amount_external', '$update_ext_date', '$update_ext_id', '$remarks_external', '0', '0', '0');";
		$res_add_externals=mysqli_query($mysqli,$sql_add_externals);
		
		if($res_add_externals)
		{
			echo "Added!";
		}
		else
		{
			echo "Please Try again later...Thank you!";
		}

	}
	else if((isset($_SESSION['name_fin']))&&(!isset($_REQUEST['number_external']))||((!isset($_SESSION['name_fin']))&&(!isset($_REQUEST['number_external']))))
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