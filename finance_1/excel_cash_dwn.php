<?php
	//Downloading all cash receipts 
	require 'sql_con.php';
	session_start();
	
	if(true)//use session variable
	{
		$id =$_REQUEST['id'];
		$cat =	$_REQUEST['cat']; 	
		$mode = $_SESSION['mode'];
		$cat_1=$cat;

		$i=0;
		$j=0;
		$t_price=0;

		if($cat==0)
			$cat="Sponsor's Cash";

		else if($cat==1)
			$cat="Accomodation";

		else if($cat==2)
			$cat="Stall Rents";

		else if($cat==3)
			$cat="T Shirt Sales";

		else if($cat==4)
			$cat="Workshops";

		else if($cat==5)
			$cat="Others";

		$query_basic = "SELECT * FROM `basic_info` where category = $cat_1 AND mode = 0";
		$result_basic = mysqli_query($mysqli,$query_basic);
		
		if((mysqli_num_rows($result_basic)>0)&&($id==0))
		{
			$d=date('d/m/Y');
			$file_name = "Approved_Cash_".$cat."_".$d.".xls";
			header( "Content-Type: application/vnd.ms-excel" );
			header( "Content-disposition: attachment; filename=$file_name" );
			echo   'Event Name' . "\t". 'Company Name' . "\t". 'Amount' . "\t" . 'Phone number' ."\t" . 'Email-Id' . "\t".'Remarks '."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";
			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];

				if($mode==1)
					$sql_cash = "SELECT * FROM  `mode_cash` WHERE unique_id_basic=$unique_id AND approval_1=1;";
				
				if($mode==2)
					$sql_cash = "SELECT * FROM  `mode_cash` WHERE unique_id_basic=$unique_id AND approval_2=1;";
				
				if($mode==3)
					$sql_cash = "SELECT * FROM  `mode_cash` WHERE unique_id_basic=$unique_id AND approval_3=1;";
				
				$res_cash = mysqli_query($mysqli,$sql_cash);
				if(mysqli_num_rows($res_cash)>0)
				{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
						$unique_note_id[$i]=$arr_cash['unique_id_note'];

						echo $arr_basic['event_name']. "\t".$arr_basic['company_name']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['email_id']. "\t".$arr_basic['remarks']. "\t";

						echo $arr_cash['note_1000']."\t" . $arr_cash['note_500']."\t" . $arr_cash['note_100'] ."\t" . $arr_cash['note_50'] ."\t". $arr_cash['note_20'] ."\t" . $arr_cash['note_10'] ."\t" . $arr_cash['note_5'] ."\t" . $arr_cash['note_2'] ."\t" . $arr_cash['note_1'] ."\n";

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
			$file_name = "All_Cash_".$cat."_".$d.".xls";
			header( "Content-Type: application/vnd.ms-excel" );
			header( "Content-disposition: attachment; filename=$file_name" );
			echo   'Event Name' . "\t". 'Company Name' . "\t". 'Amount' . "\t". 'Phone number' ."\t". 'Email-Id' . "\t".'Remarks '."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";

			while($arr_basic=mysqli_fetch_array($result_basic))
			{
				$unique_id=$arr_basic['unique_id'];

				$t_price+=$arr_basic['amount'];

				$sql_cash = "SELECT * FROM  `mode_cash` WHERE unique_id_basic=$unique_id;";
				$res_cash = mysqli_query($mysqli,$sql_cash);
				
				if(mysqli_num_rows($res_cash)>0)
				{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
						$unique_note_id[$i]=$arr_cash['unique_id_note'];

						echo $arr_basic['event_name']. "\t".$arr_basic['company_name']. "\t".$arr_basic['amount']. "\t".$arr_basic['phno']. "\t".$arr_basic['email_id']. "\t".$arr_basic['remarks']. "\t";

						echo $arr_cash['note_1000']."\t" . $arr_cash['note_500']."\t" . $arr_cash['note_100'] ."\t" . $arr_cash['note_50'] ."\t". $arr_cash['note_20'] ."\t" . $arr_cash['note_10'] ."\t" . $arr_cash['note_5'] ."\t" . $arr_cash['note_2'] ."\t" . $arr_cash['note_1'] ."\n";

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
		header("Location:login.php");
	}
?>