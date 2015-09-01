<?php
	session_start();
	if((isset($_SESSION['regno']))&&(isset($_REQUEST['numb'])))//session_variable verification
	{
		require 'sql_con.php';
		
		$i=0;
		$j=0;

		$paid_price=0;
		$unpaid_price=0;

		$unpaid_combo_1=0;
		$unpaid_combo_2=0;
		$unpaid_combo_3=0;

		$paid_combo_1=0;
		$paid_combo_2=0;
		$paid_combo_3=0;

		$unpaid_t_shirts=0;
		$unpaid_round_neck=0;

		$paid_t_shirts=0;
		$paid_round_neck=0;		

		$query_basic = "SELECT * FROM `order_sales` WHERE paid_status=1;";//paid
		$result_basic = mysqli_query($mysqli,$query_basic);
		

		$d=date('d/m/Y');
			$file_name = "Sales_Excel_".$d.".xls";
			header( "Content-Type: application/vnd.ms-excel" );
			header( "Content-disposition: attachment; filename=$file_name" );


		if(mysqli_num_rows($result_basic)>0)
		{
			echo "Paid Accounts\n\n";
			//echo   'Unique Id' . "\t". 'Registration Number' . "\t". 'Amount' ."\t". 'Phone Number' ."\t".'Combo 1' . "\t" . 'Combo 2' ."\t" . 'Combo 3' . "\t". 'Round Neck Shirts' ."\t". 'Collar Shirts' . "\t" . 'Sizes of Round-Neck' . "\t". 'Sizes of Collar' ."\n\n";
			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];


				//echo $arr_basic['unique_id']."\t".$arr_basic['regno']."\t".$arr_basic['amount']."\t".$arr_basic['phno']. "\t".$arr_basic['c_1']. "\t".$arr_basic['c_2']. "\t".$arr_basic['c_3']. "\t".$arr_basic['t_1']+$arr_basic['c_1']+$arr_basic['c_2']+$arr_basic['c_3']. "\t".$arr_basic['t_2']+$arr_basic['c_1']+$arr_basic['c_3']."\t".$arr_basic['size_t_1'],$arr_basic['size_c_1_t_1'],$arr_basic['size_c_2_t_1'],$arr_basic['size_c_3_t_1']. "\t".$arr_basic['size_t_2'],$arr_basic['size_c_1_t_2'],$arr_basic['size_c_3_t_2']. "\n";

				$paid_price+=$arr_basic['amount'];

				$paid_combo_1+=$arr_basic['c_1'];
				$paid_combo_2+=$arr_basic['c_2'];
				$paid_combo_3+=$arr_basic['c_3'];

				$paid_t_shirts=$paid_t_shirts+$arr_basic['t_2']+$arr_basic['c_1']+$arr_basic['c_3'];
				$paid_round_neck=$paid_round_neck+$arr_basic['t_1']+$arr_basic['c_1']+$arr_basic['c_2']+$arr_basic['c_3'];

			}
			
		echo "\n\n Total Amount paid :\t $paid_price \nCombo 1:\t$paid_combo_1\nCombo 2:\t$paid_combo_2\nCombo 3:\t$paid_combo_3
		\nRound Neck:\t$paid_round_neck\nCollar Neck:\t$paid_t_shirts\n\n\n\n";
		}


		$query_un_basic = "SELECT * FROM `order_sales` WHERE paid_status=0;";//unpaid
		$result_un_basic = mysqli_query($mysqli,$query_un_basic);
		
		if(mysqli_num_rows($result_un_basic)>0)
		{
			echo "Un-Paid Accounts\n\n";
			//echo   'Unique Id' . "\t". 'Registration Number' . "\t". 'Amount' ."\t". 'Phone Number' ."\t".'Combo 1' . "\t" . 'Combo 2' ."\t" . 'Combo 3' . "\t". 'Round Neck Shirts' ."\t". 'Collar Shirts' . "\t" . 'Sizes of Round-Neck' . "\t". 'Sizes of Collar' ."\n\n";
			while($arr_basic_er=mysqli_fetch_array($result_un_basic))
			{
				$unique_id=$arr_basic_er['unique_id'];

				//echo $arr_basic_er['unique_id']. "\t".$arr_basic_er['regno']. "\t".$arr_basic_er['amount']. "\t".$arr_basic_er['phno']. "\t".$arr_basic_er['c_1']. "\t".$arr_basic_er['c_2']. "\t".$arr_basic_er['c_3']. "\t".$arr_basic_er['t_1']+$arr_basic_er['c_1']+$arr_basic_er['c_2']+$arr_basic_er['c_3']. "\t".$arr_basic_er['t_2']+$arr_basic_er['c_1']+$arr_basic_er['c_3']."\t".$arr_basic_er['size_t_1'],$arr_basic_er['size_c_1_t_1'],$arr_basic_er['size_c_2_t_1'],$arr_basic_er['size_c_3_t_1']. "\t".$arr_basic_er['size_t_2'],$arr_basic_er['size_c_1_t_2'],$arr_basic_er['size_c_3_t_2']. "\n";

				$unpaid_price+=$arr_basic_er['amount'];

				$unpaid_combo_1+=$arr_basic_er['c_1'];
				$unpaid_combo_2+=$arr_basic_er['c_2'];
				$unpaid_combo_3+=$arr_basic_er['c_3'];

				$unpaid_t_shirts=$unpaid_t_shirts+$arr_basic_er['t_2']+$arr_basic_er['c_1']+$arr_basic_er['c_3'];
				$unpaid_round_neck=$unpaid_round_neck+$arr_basic_er['t_1']+$arr_basic_er['c_1']+$arr_basic_er['c_2']+$arr_basic_er['c_3'];

			}
			
		echo "\n\n Total Amount unpaid :\t $unpaid_price \nCombo 1:\t$unpaid_combo_1\nCombo 2:\t$unpaid_combo_2\nCombo 3:\t$unpaid_combo_3\nRound Neck:\t$unpaid_round_neck\nCollar Neck:\t$unpaid_t_shirts\n";


	/*	echo "\n\n\nTotal Accounts\n\n";
		echo"Total Amount :\t $unpaid_price+$paid_price \nCombo 1:\t".$unpaid_combo_1+$paid_combo_1."\nCombo 2:\t".$unpaid_combo_2+$paid_combo_2."\nCombo 3:\t".$unpaid_combo_3+$paid_combo_3."\nRound Neck:\t".$unpaid_round_neck+$paid_round_neck."\nCollar Neck:\t".$unpaid_t_shirts+$paid_t_shirts;*/
	}
	

}
	else 
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:login_approve.php");
	}
?>