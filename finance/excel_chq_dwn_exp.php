<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require 'sql_con.php';

		$id =$_REQUEST['id'];
		$cat =	$_REQUEST['cat']; 	
		$mode = $_SESSION['mode'];
		$id_1=$cat;
		$cat_1=$cat;

		$i=0;
		$j=0;
		$t_price=0;

		if($cat==11)
				$id_1="Advertisements";
			if($cat==12)
				$id_1="Marketing_and_Publicity";
			if($cat==13)
				$id_1="Printing";
			if($cat==14)
				$id_1="Stationaries";
			if($cat==15)
				$id_1="Photos_and_Videos";
			if($cat==16)
				$id_1="Prize_Money";
			if($cat==17)
				$id_1="Stall_Installation";
			if($cat==18)
				$id_1="T_Shirt_Purchases";
			if($cat==19)
				$id_1="Travel";
			if($cat==20)
				$id_1="Workshop";
			if($cat==21)
				$id_1="Reimburesement_to_Merit_Students";
			if($cat==22)
				$id_1="Miscellaneous";
			
		$query_basic = "SELECT * FROM `basic_expenditure_info` where category = $cat_1 AND mode = 2";
		$result_basic = mysqli_query($mysqli,$query_basic);
		
		
		if((mysqli_num_rows($result_basic)>0)&&($id==0))
		{
			$d=date('d/m/Y');
			$file_name = "Approved_Cheque_".$cat."_".$d.".xls";
			header( "Content-Type: application/vnd.ms-excel" );
			header( "Content-disposition: attachment; filename=$file_name" );
			echo   'Name' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Remarks '."\t". 'Cheque number' . "\t" . 'Branch Name' . "\t". 'Bank Name' . "\t". 'Issue Date' . "\n\n";
			
			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];

				if($mode==55)
					$sql_cash = "SELECT * FROM  `mode_dd_expenditure` WHERE unique_id_basic=$unique_id AND approval_1=1;";
				
				$res_cash = mysqli_query($mysqli,$sql_cash);
				if(mysqli_num_rows($res_cash)>0)
				{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
						echo $arr_basic['name_person']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t";
						echo $arr_cash['cheque_number']."\t" . $arr_cash['branch_name_chq']."\t" . $arr_cash['bank_name_chq'] ."\t" . $arr_cash['issue_date_chq'] ."\n";

						$t_price+=$arr_basic['amount'];
						$i++;
					}
				}
			}
			echo "\n\n Total number of Registrations :\t $i \nTotal amount collected:\t$t_price";
		}


		else if((mysqli_num_rows($result_basic)>0)&&($id==1))
		{
			$d=date('d/m/Y');
			$file_name = "All_Cheque_".$cat."_".$d.".xls";
			header( "Content-Type: application/vnd.ms-excel" );
			header( "Content-disposition: attachment; filename=$file_name" );
			echo   'Name' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Email-Id' . "\t".'Remarks '."\t". 'Cheque number' . "\t" . 'Branch Name' . "\t". 'Bank Name' . "\t". 'Issue Date' . "\n\n";
			
			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];

				$sql_cash = "SELECT * FROM  `mode_dd_expenditure` WHERE unique_id_basic=$unique_id;";
				$res_cash = mysqli_query($mysqli,$sql_cash);
				
				if((mysqli_num_rows($res_cash)>0)&&($res_cash))
					{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
						echo $arr_basic['name_person']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t";
						echo $arr_cash['cheque_number']."\t" . $arr_cash['branch_name_chq']."\t" . $arr_cash['bank_name_chq'] ."\t" . $arr_cash['issue_date_chq'] ."\n";

						$t_price+=$arr_basic['amount'];
						$i++;
					}
				}
			}

			echo "\n\n Total number of Registrations :\t $i \nTotal amount collected:\t$t_price";
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