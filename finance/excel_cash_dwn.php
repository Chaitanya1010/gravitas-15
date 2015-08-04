<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require 'sql_con.php';
		$id =$_REQUEST['id'];
		$cat =	$_REQUEST['cat']; 	
		$mode = $_SESSION['mode'];
		$cat_1=$cat;

		$i=0;
		$j=0;
		$t_price=0;

		if($cat==0)//sponsors
		{
			$cat="Sponsors";
			$first_data="Company Name";
			$second_data="Person Name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="Email-ID";
			$sixth_data="Remarks";
		}

		else if($cat==1)	//Accomodation
		{
			$cat="Accomodation";
			$first_data="Event Name";
			$second_data="Institute Name and Place";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="No.of days";
			$sixth_data="Remarks";
		}

		else if($cat==2)	//Stall - Rent
		{
			$cat="Stall_Rent";
			$first_data="Purpose of Stall";
			$second_data="Person Name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="No.of days";
			$sixth_data="Remarks";
		}

		else if($cat==3)	//T-shirts
		{
			$cat="T_Shirts";
			$first_data="Person Name";
			$second_data="Date";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="No.of T-shirts ordered";
			$sixth_data="Remarks";
		}

		else if($cat==4)	//Workshops
		{
			$cat="Workshops";
			$first_data="Name of Workshop";
			$second_data="Workshop Conducting Company Name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="Email-ID";
			$sixth_data="Remarks";
		}

		else if($cat==5)	//Others
		{
			$cat="Others";
			$first_data="Name/Event name";
			$second_data="Sponsor Company/Person name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="Email-ID";
			$sixth_data="Remarks";
		}

		$query_basic = "SELECT * FROM `basic_info` where category = $cat_1 AND mode = 0";
		$result_basic = mysqli_query($mysqli,$query_basic);
		
		if((mysqli_num_rows($result_basic)>0)&&($id==0))
		{
			$d=date('d/m/Y');
			$file_name = "Approved_Cash_".$cat."_".$d.".xls";
			header( "Content-Type: application/vnd.ms-excel" );
			header( "Content-disposition: attachment; filename=$file_name" );
			echo   $first_data . "\t". $second_data . "\t". $third_data . "\t" . $fourth_data ."\t" . $fifth_data . "\t". $sixth_data."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";
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
			echo   $first_data . "\t". $second_data . "\t". $third_data . "\t" . $fourth_data ."\t" . $fifth_data . "\t" . $sixth_data . "\t" . '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";."\t". '1000X' . "\t" . '500X' . "\t". '100X' . "\t". '50X' . "\t". '20X' . "\t". '10X' . "\t". '5X' . "\t". '2X' . "\t". '1X' ."\n\n";

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
		header("Location:login_approve.php");
	}
?>