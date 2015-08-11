<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require 'sql_con.php';
		$id =$_REQUEST['id'];
		$cat =	$_REQUEST['cat']; 	
		$mode = $_SESSION['mode'];
		$id_1='';
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

		$query_basic = "SELECT * FROM `basic_expenditure_info` where category = $cat_1 AND mode = 0";
		$result_basic = mysqli_query($mysqli,$query_basic);
		
		if((mysqli_num_rows($result_basic)>0)&&($id==0))
		{
			$d=date('d/m/Y');
			if($cat!=16)
			{
				$file_name = "Approved_Cash_".$cat."_".$d.".xls";
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-disposition: attachment; filename=$file_name" );
				
				echo   'Name' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Remarks '."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";
			}

			else if($cat==16)
			{
				$file_name = "Approved_Cash_".$cat."_".$d.".xls";
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-disposition: attachment; filename=$file_name" );
			
				echo   'Name' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Remarks '."\t" . 'First Prize'."\t" . 'Second Prize'."\t" . 'Third Prize '."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";
			}
			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];

				if($mode==55)
					$sql_cash = "SELECT * FROM  `mode_cash_expenditure` WHERE unique_id_basic=$unique_id AND approval_1=1;";
				
				$res_cash = mysqli_query($mysqli,$sql_cash);
				if(mysqli_num_rows($res_cash)>0)
				{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
						$unique_note_id[$i]=$arr_cash['unique_id_note'];


						if($cat==16)
						{
							$sql_prize="SELECT * FROM  `event_prizes_money` WHERE `unique_id_event`=$unique_id;";
							$res_prize=mysqli_query($mysqli,$sql_prize);
							if(mysqli_num_rows($res_prize)>0)
							{
								while($arr_prize=mysqli_fetch_array($res_prize))
								{
									echo $arr_prize['event_name_prize']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t" .$arr_prize['prize_1']. "\t".$arr_prize['prize_2']. "\t".$arr_prize['prize_3']. "\t";
								}
							}

						}
						else
							echo $arr_basic['name_person']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t";


						echo $arr_cash['note_1000']."\t" . $arr_cash['note_500']."\t" . $arr_cash['note_100'] ."\t" . $arr_cash['note_50'] ."\t". $arr_cash['note_20'] ."\t" . $arr_cash['note_10'] ."\t" . $arr_cash['note_5'] ."\t" . $arr_cash['note_2'] ."\t" . $arr_cash['note_1'] ."\n";

						$t_price+=$arr_basic['amount'];
						$i++;
					}
				}

		}
		echo "\n\n Total number of Registrations :\t $i \nTotal amount collected:\t$t_price";
		}//end of if


		else if((mysqli_num_rows($result_basic)>0)&&($id==1))
		{
			$d=date('d/m/Y');
			if($cat!=16)
			{
				$file_name = "All_Cash_".$cat."_".$d.".xls";
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-disposition: attachment; filename=$file_name" );
				
				echo   'Name' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Remarks '."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";
			}

			else if($cat==16)
			{
				$file_name = "All_Cash_".$cat."_".$d.".xls";
				header( "Content-Type: application/vnd.ms-excel" );
				header( "Content-disposition: attachment; filename=$file_name" );
			
				echo   'Name' . "\t". 'Purpose' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Remarks '."\t" . 'First Prize'."\t" . 'Second Prize'."\t" . 'Third Prize '."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";
			}
			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];

				if($mode==55)
					$sql_cash = "SELECT * FROM  `mode_cash_expenditure` WHERE unique_id_basic=$unique_id;";
				
				$res_cash = mysqli_query($mysqli,$sql_cash);
				if(mysqli_num_rows($res_cash)>0)
				{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
						$unique_note_id[$i]=$arr_cash['unique_id_note'];


						if($cat==16)
						{
							$sql_prize="SELECT * FROM  `event_prizes_money` WHERE `unique_id_event`=$unique_id;";
							$res_prize=mysqli_query($mysqli,$sql_prize);
							if(mysqli_num_rows($res_prize)>0)
							{
								while($arr_prize=mysqli_fetch_array($res_prize))
								{
									echo $arr_prize['event_name_prize']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t" .$arr_prize['prize_1']. "\t".$arr_prize['prize_2']. "\t".$arr_prize['prize_3']. "\t";
								}
							}

						}
						else
							echo $arr_basic['name_person']. "\t".$arr_basic['purpose_expenditure']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['remarks']. "\t";


						echo $arr_cash['note_1000']."\t" . $arr_cash['note_500']."\t" . $arr_cash['note_100'] ."\t" . $arr_cash['note_50'] ."\t". $arr_cash['note_20'] ."\t" . $arr_cash['note_10'] ."\t" . $arr_cash['note_5'] ."\t" . $arr_cash['note_2'] ."\t" . $arr_cash['note_1'] ."\n";

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