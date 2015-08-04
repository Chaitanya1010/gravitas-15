<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require 'sql_con.php';
		$id=$_REQUEST['id'];
		$id_1=$id;
		$d=date('d/m/Y');
		$category_sql = "SELECT * FROM  `basic_expenditure_info` WHERE category='$id'";
		$result_sql=mysqli_query($mysqli,$category_sql);
		$price=0;
		$numb=0;
		if(mysqli_num_rows($result_sql)>0)
		{
			if($id_1==11)
				$id_1="Advertisements";
			if($id_1==12)
				$id_1="Marketing_and_Publicity";
			if($id_1==13)
				$id_1="Printing";
			if($id_1==14)
				$id_1="Stationaries";
			if($id_1==15)
				$id_1="Photos_and_Videos";
			if($id_1==16)
				$id_1="Prize_Money";
			if($id_1==17)
				$id_1="Stall_Installation";
			if($id_1==18)
				$id_1="T_Shirt_Purchases";
			if($id_1==19)
				$id_1="Travel";
			if($id_1==20)
				$id_1="Workshop";
			if($id_1==21)
				$id_1="Reimburesement_to_Merit_Students";
			if($id_1==22)
				$id_1="Miscellaneous";

			$file_name = $id_1.$d.".xls";
			header("Content-Type: application/vnd.ms-excel; charset=utf-8");
			header("Content-disposition: attachment; filename=".$file_name."");
			header('Cache-Control: max-age=0');
			echo ' Cash '. "\n\n";
			echo 'Person Name ' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' . "\t". 'Remarks' ."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";			
			while($arr_basic=mysqli_fetch_array($result_sql))
			{
				$unique_id=$arr_basic['unique_id'];
				$mode=$arr_basic['mode'];

				if($mode==0)
				{
					$details_sql="SELECT * FROM  `mode_cash_expenditure` WHERE `unique_id_basic`='$unique_id' AND `approval_1`=1";
					$details_res=mysqli_query($mysqli,$details_sql);
					if(mysqli_num_rows($details_res)>0)
					{
						if($arr_cash=mysqli_fetch_array($details_res))
						{
							echo $arr_basic['name_person']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t";
						
							echo $arr_cash['note_1000']."\t" . $arr_cash['note_500']."\t" . $arr_cash['note_100'] ."\t" . $arr_cash['note_50'] ."\t". $arr_cash['note_20'] ."\t" . $arr_cash['note_10'] ."\t" . $arr_cash['note_5'] ."\t" . $arr_cash['note_2'] ."\t" . $arr_cash['note_1'] ."\n";
							
							$price+=$arr_basic['amount'];
							$numb+=1;
						}	
					}
				}
			}
			echo "\n\n Total number of Registrations :\t $numb \nTotal amount collected:\t$price";

			$numb=0;
			$price=0;

			$category_sql = "SELECT * FROM  `basic_expenditure_info` WHERE category='$id'";
			$result_sql=mysqli_query($mysqli,$category_sql);
		
			echo "\n\n\n\n". ' DD '. "\n\n";
			echo 'Person Name' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Remarks '."\t". 'DD number' . "\t" . 'Branch Name' . "\t". 'Bank Name' . "\t". 'Issue Date' . "\n\n";
			while($arr_basic_dd=mysqli_fetch_array($result_sql))
			{
				$unique_id=$arr_basic_dd['unique_id'];
				$mode=$arr_basic_dd['mode'];

				if($mode==1)
				{
					$details_sql="SELECT * FROM  `mode_dd_expenditure` WHERE `unique_id_basic`='$unique_id' AND `approval_1`=1";
					$details_res=mysqli_query($mysqli,$details_sql);
					if(mysqli_num_rows($details_res)>0)
					{
						if($arr_dd=mysqli_fetch_array($details_res))
						{
							echo $arr_basic_dd['name_person']. "\t".$arr_basic_dd['purpose_expenditure']. "\t".$arr_basic_dd['amount']. "\t".$arr_basic_dd['phno']. "\t".$arr_basic_dd['remarks']. "\t";
							echo $arr_dd['dd_number']."\t" . $arr_dd['branch_name_dd']."\t" . $arr_dd['bank_name_dd'] ."\t" . $arr_dd['issue_date_dd'] ."\n";
						
							$price+=$arr_basic_dd['amount'];
							$numb+=1;
						}	
					}
				}
			}

			echo "\n\n Total number of Registrations :\t $numb \nTotal amount collected:\t$price";

			$numb=0;
			$price=0;

			$category_sql = "SELECT * FROM  `basic_expenditure_info` WHERE category='$id'";
			$result_sql=mysqli_query($mysqli,$category_sql);
		
			echo "\n\n\n\n". ' Cheque '. "\n\n";
			echo 'Event Name' . "\t". 'Company Name' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Email-Id' . "\t".'Remarks '."\t". 'Cheque number' . "\t" . 'Branch Name' . "\t". 'Bank Name' . "\t". 'Issue Date' . "\n\n";
			while($arr_basic=mysqli_fetch_array($result_sql))
			{
				$details_sql="SELECT * FROM  `mode_cheque_expenditure` WHERE `unique_id_basic`='$unique_id' AND `approval_1`=1";
				$details_res=mysqli_query($mysqli,$details_sql);
				if(mysqli_num_rows($details_res)>0)
					{
						if($arr_cash=mysqli_fetch_array($details_res))
						{
							echo $arr_basic['name_person']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t";
							echo $arr_cash['cheque_number']."\t" . $arr_cash['branch_name_chq']."\t" . $arr_cash['bank_name_chq'] ."\t" . $arr_cash['issue_date_chq'] ."\n";
						
							$price+=$arr_basic['amount'];
							$numb+=1;
						}	
					}
			}

			echo "\n\n Total number of Registrations :\t $numb \nTotal amount collected:\t$price";


			$numb=0;
			$price=0;

			$category_sql = "SELECT * FROM  `basic_expenditure_info` WHERE category='$id'";
			$result_sql=mysqli_query($mysqli,$category_sql);
		
			echo "\n\n\n\n". ' Net Banking '. "\n\n";
			echo 'Event Name' . "\t". 'Company Name' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Email-Id' . "\t".'Remarks '."\t". ' Transaction ID ' . "\t". 'Bank Name' . "\t". 'Issue Date' . "\n\n";
			while($arr_basic=mysqli_fetch_array($result_sql))
			{
				$details_sql="SELECT * FROM  `mode_net_expenditure` WHERE `unique_id_basic`='$unique_id'";
				$details_res=mysqli_query($mysqli,$details_sql);
				if(mysqli_num_rows($details_res)>0)
					{
						if($arr_cash=mysqli_fetch_array($details_res))
						{
							echo $arr_basic['name_person']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t";
							echo $arr_cash['trans_id']."\t" . $arr_cash['bank_name_net'] ."\t" . $arr_cash['issue_date_chq'] ."\n";
						
							$price+=$arr_basic['amount'];
							$numb+=1;
						}	
					}
			}

			echo "\n\n Total number of Registrations :\t $numb \nTotal amount collected:\t$price";
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