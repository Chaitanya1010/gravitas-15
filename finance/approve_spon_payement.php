<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];
		
		$mode=$_SESSION['mode'];

		if($mode==1)
			$sql_approve="UPDATE  `finance`.`mode_cash` SET  `approval_1` =  '1' WHERE  `mode_cash`.`unique_id_note` =$id;";
		
		else if($mode==2)
			$sql_approve="UPDATE  `finance`.`mode_cash` SET  `approval_2` =  '1' WHERE  `mode_cash`.`unique_id_note` =$id;";
		
		else if($mode==3)
			$sql_approve="UPDATE  `finance`.`mode_cash` SET  `approval_3` =  '1' WHERE  `mode_cash`.`unique_id_note` =$id;";
				
		$res_approve=mysqli_query($mysqli,$sql_approve);
		
		$mode_revenue=1;
		$mode_payement=0;

		if(($res_approve)&&($mode==3))
		{
			$message="";
			$sql_mail="";
			$unique_basic_id="";
			$category="";
			$dd_number="";
			$branch_name_dd="";
			$bank_name_dd="";
			$issue_date_dd="";
			$cheque_number="";
			$branch_name_chq="";
			$bank_name_chq="";
			$issue_date_chq="";
			$event_name="";
			$company_name="";
			$amount="";
			$phno="";
			$email_id="";
			$remarks="";

			$first_data="";
			$second_data="";
			$third_data="";
			$fourth_data="";
			$fifth_data="";
			$sixth_data="";

			$first_prize='';
			$second_prize='';
			$third_prize='';
			
			if($mode_revenue==1)//revenue
			{	
				if($mode_payement==0)//cash
				{
					$sql_mail="SELECT * FROM `mode_cash` WHERE `unique_id_note` = $id;";	
				}
				else if($mode_payement==1)//dd
				{
					$sql_mail="SELECT * FROM `finance`.`mode_dd` WHERE  `mode_dd`.`unique_id_dd` =$id;";
				}
				else if($mode_payement==2)//cheque
				{
					$sql_mail="SELECT * FROM `finance`.`mode_cheque` WHERE  `mode_cheque`.`unique_id_chq` =$id;";
				}
			
				$res_mail=mysqli_query($mysqli,$sql_mail);
			
				if(mysqli_num_rows($res_mail)>0)
				{
					while($arr_mail=mysqli_fetch_array($res_mail))
					{
				
						if($mode_payement==0)
						{
							$unique_basic_id=$arr_mail['unique_id_basic'];
							$category=$arr_mail['category'];
						}
						else if($mode_payement==1)
						{
							$unique_basic_id=$arr_mail['unique_id_basic'];
							$category=$arr_mail['category'];
							$dd_number=$arr_mail['dd_number'];
							$branch_name_dd=$arr_mail['branch_name_dd'];
							$bank_name_dd=$arr_mail['bank_name_dd'];
							$issue_date_dd=$arr_mail['issue_date_dd'];
						}
						else if($mode_payement==2)
						{
							$unique_basic_id=$arr_mail['unique_id_basic'];
							$category=$arr_mail['category'];
							$cheque_number=$arr_mail['cheque_number'];
							$branch_name_chq=$arr_mail['branch_name_chq'];
							$bank_name_chq=$arr_mail['bank_name_chq'];
							$issue_date_chq=$arr_mail['issue_date_chq'];
						}

						//more details
						$sql_id_basic="SELECT * FROM `basic_info` WHERE unique_id=$unique_basic_id and category=$category;";
						$res_id_basic=mysqli_query($mysqli,$sql_id_basic);
						
						if(mysqli_num_rows($res_id_basic)>0)
						{
							while($arr_det=mysqli_fetch_array($res_id_basic))
							{
								$event_name=$arr_det['event_name'];
								$company_name=$arr_det['company_name'];
								$amount=$arr_det['amount'];
								$phno=$arr_det['phno'];
								$email_id=$arr_det['email_id'];
								$remarks=$arr_det['remarks'];
							}
						}
						
						if($category==0)//sponsors
						{
							$first_data="Company Name";
							$second_data="Person Name";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="Email-ID";
							$sixth_data="Remarks";
						}

						if($category==1)	//Accomodation
						{
							$first_data="Event Name";
							$second_data="Institute Name and Place";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="No.of days";
							$sixth_data="Remarks";
						}

						if($category==2)	//Stall - Rent
						{
							$first_data="Purpose of Stall";
							$second_data="Person Name";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="No.of days";
							$sixth_data="Remarks";
						}

						if($category==3)	//Stall - Rent
						{
							$first_data="Person Name";
							$second_data="Date";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="No.of T-shirts ordered";
							$sixth_data="Remarks";
						}

						if($category==4)	//Workshops
						{
							$first_data="Name of Workshop";
							$second_data="Workshop Conducting Company Name";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="Email-ID";
							$sixth_data="Remarks";
						}

						if($category==5)	//Others
						{
							$first_data="Name/Event name";
							$second_data="Sponsor Company/Person name";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="Email-ID";
							$sixth_data="Remarks";
						}
						
						//echo "<div class='msg'>content ".$message."</div>";

						$data= "<h3>".$event_name."</h3><br/>".$second_data."=".$company_name."<br/>".$third_data."=".$amount."<br/>".$fourth_data."=".$phno."<br/>".$fifth_data."=".$email_id."<br/>".$sixth_data."=".$remarks."<br/>";
				
						//echo"<br/><b>Acknowledged</b><br/>";
						require("mail.php");
						echo "<br/><b>Acknowledged</b><br/>";
				
					}
				}
			}//end of revenue
			
			//start of expenses
			else if($mode_revenue==0)
			{
				if($mode_payement==0)//cash
				{
					$sql_mail="SELECT * FROM `mode_cash_expenditure` WHERE `unique_id_note` = $id;";	
				}
				else if($mode_payement==1)//dd
				{
					$sql_mail="SELECT * FROM `finance`.`mode_dd_expenditure` WHERE  `mode_dd_expenditure`.`unique_id_dd` =$id;";
				}
				else if($mode_payement==2)//cheque
				{
					$sql_mail="SELECT * FROM `finance`.`mode_cheque_expenditure` WHERE  `mode_cheque_expenditure`.`unique_id_chq` =$id;";
				}
			
				$res_mail=mysqli_query($mysqli,$sql_mail);
			
				if(mysqli_num_rows($res_mail)>0)
				{
					while($arr_mail=mysqli_fetch_array($res_mail))
					{
				
						if($mode_payement==0)
						{
							$unique_basic_id=$arr_mail['unique_id_basic'];
							$category=$arr_mail['category'];
						}
						else if($mode_payement==1)
						{
							$unique_basic_id=$arr_mail['unique_id_basic'];
							$category=$arr_mail['category'];
							$dd_number=$arr_mail['dd_number'];
							$branch_name_dd=$arr_mail['branch_name_dd'];
							$bank_name_dd=$arr_mail['bank_name_dd'];
							$issue_date_dd=$arr_mail['issue_date_dd'];
						}
						else if($mode_payement==2)
						{
							$unique_basic_id=$arr_mail['unique_id_basic'];
							$category=$arr_mail['category'];
							$cheque_number=$arr_mail['cheque_number'];
							$branch_name_chq=$arr_mail['branch_name_chq'];
							$bank_name_chq=$arr_mail['bank_name_chq'];
							$issue_date_chq=$arr_mail['issue_date_chq'];
						}

						//more details
						$sql_id_basic="SELECT * FROM `basic_expenditure_info` WHERE unique_id=$unique_basic_id and category=$category;";
						$res_id_basic=mysqli_query($mysqli,$sql_id_basic);
						
						if(mysqli_num_rows($res_id_basic)>0)
						{
							while($arr_det=mysqli_fetch_array($res_id_basic))
							{
								$event_name=$arr_det['name_person'];
								$company_name=$arr_det['purpose_expenditure'];
								$amount=$arr_det['amount'];
								$phno=$arr_det['phno'];
								$remarks=$arr_det['remarks'];
							}
						}
						
						if($category!=16)
						{
							$first_data="Name of Person";
							$second_data="Purpose of Expenditure";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="Remarks";
							
							$data= "<h3>".$event_name."</h3><br/>".$second_data."=".$company_name."<br/>".$third_data."=".$amount."<br/>".$fourth_data."=".$phno."<br/>".$fifth_data."=".$email_id."<br/>".$sixth_data."=".$remarks."<br/>";
				
						}
							
						
						if($category==16)//EVENTS
						{
							$sql_events_name="SELECT * FROM `event_prizes_money` WHERE `unique_id_event`='$unique_id_basic';";
							$res_events_name=mysqli_query($mysqli,$sql_events_name);
							if(mysqli_num_rows($res_events_name)>0)
							{
								while($arr_events=mysqli_fetch_array($res_events_name))
								{
									$event_name=$arr_events['event_name_prize'];
									$first_prize=$arr_events['prize_1'];
									$second_prize=$arr_events['prize_2'];
									$third_prize=$arr_events['prize_3'];
								}
							}
							$second_data="Purpose of Expenditure";
							$third_data="Amount";
							$fourth_data="Phone Number";
							$fifth_data="Remarks";
							
							$data= "<h3>".$event_name."</h3><br/>First Prize =".$first_prize."<br/>Second Prize=".$second_prize."<br/>Third Prize=".$third_prize."<br/>".$second_data."=".$company_name."<br/>".$third_data."=".$amount."<br/>".$fourth_data."=".$phno."<br/>".$fifth_data."=".$email_id."<br/>".$sixth_data."=".$remarks."<br/>";
				
						}

						
						//echo "<div class='msg'>content ".$message."</div>";

				
						//echo"<br/><b>Acknowledged</b><br/>";
						require("mail.php");
						echo "<br/><b>Acknowledged</b><br/>";
					}
				}
			}
				
			
		}//end of 3rd approval

		else if((($res_approve)&&($mode==1))||(($res_approve)&&($mode==2)))
		{
			echo "<br/><b>Approved</b><br/>";
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