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
	$c_2_t_1=$_POST['c_2_t_1'];
	$c_3_t_1=$_POST['c_3_t_1'];
	$c_3_t_2=$_POST['c_3_t_2'];
	$size_t_1=$_POST['size_t_1'];
	$size_t_2=$_POST['size_t_2'];
	$size_c_1_t_1=$_POST['size_c_1_t_1'];
	$size_c_1_t_2=$_POST['size_c_1_t_2'];
	$size_c_2_t_1=$_POST['size_c_2_t_1'];
	$size_c_3_t_1=$_POST['size_c_3_t_1'];
	$size_c_3_t_2=$_POST['size_c_3_t_2'];
	$amount=$_POST['amount'];

	$combo = $_POST["combo"];
	$combo_array = explode(",",$combo);

	if(($c_1_t_1==1)&&($c_1_t_2==1))
		$c_1=1;
	else
		$c_1=0;
	if($c_2_t_1==1)
		$c_2=1;
	else
		$c_2=0;
	if(($c_3_t_1==1)&&($c_3_t_2==1))
		$c_3=1;
	else
		$c_3=0;

	$sql_sales="INSERT INTO `order_sales`(`t_1`, `t_2`, `c_1`, `c_2`, `c_3`, `size_t_1`, `size_t_2`, `size_c_1_t_1`, `size_c_1_t_2`, `size_c_2_t_1`, `size_c_3_t_1`, `size_c_3_t_2`, `regno`, `phno`, `blck_name`, `blck_numb`, `paid_status`, `delivery_status`, `amount`) VALUES ('$t_1','$t_2','$c_1','$c_2','$c_3','$size_t_1','$size_t_2','$size_c_1_t_1','$size_c_1_t_2','$size_c_2_t_1','$size_c_3_t_1','$size_c_3_t_2','$regno','$numb','$blck_name','$room_no','$paid_status','0','$amount');";
	$res_sales=mysqli_query($mysqli,$sql_sales);
	
	if($res_sales)//added into order_sales now add combos in combo table
	{
		//echo "Added into sales";
		$q4 = "INSERT INTO `combos`(`reg_id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES ('$regno','$combo_array[0]','$combo_array[1]','$combo_array[2]','$combo_array[3]','$combo_array[4]','$combo_array[5]','$combo_array[6]','$combo_array[7]','$combo_array[8]','$combo_array[9]')";
		$res=mysqli_query($mysqli,$q4);
		if($res)
		{
			if($paid_status)
				echo "<h5>Added and money paid!!</h5>";
			else
				echo "<h5>Added and money not paid!!</h5>";
		}

	}
	else
		echo "<h5>Not added in sales</h5>";

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