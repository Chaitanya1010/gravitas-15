<?php
	session_start();
	if((isset($_SESSION["regno"]))&&(isset($_REQUEST['numb'])))
	{
		require("sql_con.php");

		$numb=$_POST["numb"];
		$regno=$_POST["regno"];
		$blck_name=$_POST["blck_name"];
		$room_no=$_POST["room_no"];
		$paid_status=$_POST["paid_status"];
		$t_1=$_POST['t_1'];
		$t_2=$_POST['t_2'];
		$c_1_t_1=$_POST['c_1_t_1'];
		$c_1_t_2=$_POST['c_1_t_2'];
		$size_t_1=$_POST['size_t_1'];
		$size_t_2=$_POST['size_t_2'];
		$size_c_1_t_1=$_POST['size_c_1_t_1'];
		$size_c_1_t_2=$_POST['size_c_1_t_2'];
		$paid_status=$_POST['paid_status'];
		$amount=$_POST['amount'];

		if(($c_1_t_1==1)&&($c_1_t_2==1))
			$c_1=1;
		else
			$c_1=0;

		$sql_sales="INSERT INTO `order_sales`(`t_1`, `t_2`, `c_1`, `c_2`, `c_3`, `size_t_1`, `size_t_2`, `size_c_1_t_1`, `size_c_1_t_2`, `size_c_2_t_1`, `size_c_3_t_1`, `size_c_3_t_2`, `regno`, `phno`, `blck_name`, `blck_numb`, `paid_status`, `delivery_status`, `amount`) VALUES ('$t_1','$t_2','$c_1','0','0','$size_t_1','$size_t_2','$size_c_1_t_1','$size_c_1_t_2','0','0','0','$regno','$numb','$blck_name','$room_no','$paid_status','0','$amount');";
		$res_sales=mysqli_query($mysqli,$sql_sales);
		if($res_sales)
		{
			if($paid_status)
				echo "<h5>Added and money paid!!</h5>";
			else
				echo "<h5>Added and money not paid!!</h5>";
		}
		else
		{
			echo "<h5>Not added</h5>";
		}
	}

	else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))))
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