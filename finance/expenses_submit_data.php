<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['mode'])))//session_variable verification
	{
		require('sql_con.php');

		$branch=$_REQUEST['branch'];
		$amount=$_REQUEST['amount'];
		$name=$_REQUEST['name'];
		$purpose=$_REQUEST['purpose'];
		$amount=$_REQUEST['amount'];
		$remarks=$_REQUEST['remarks_expenses'];
		$selected=$_REQUEST['mode'];
		$phno=$_REQUEST['phno'];

		$counter_flag=0;
		
		//echo"INSERT INTO `finance`.`basic_expenditure_info` (`category` ,`name_person`, `purpose_expenditure`, `amount`, `phno`, `mode`, `remarks`) VALUES('$branch', '$name', '$purpose', '$amount', '$phno', '$selected', '$remarks');";
		
		$sql_basic_add="INSERT INTO `finance`.`basic_expenditure_info` (`unique_id`, `category`, `name_person`, `purpose_expenditure`, `amount`, `phno`, `mode`, `remarks`) VALUES (NULL, '$branch', '$name', '$purpose', '$amount', '$phno', '$selected', '$remarks');";
		$res_basic_add=mysqli_query($mysqli,$sql_basic_add);

		if($res_basic_add)
		{
			$get_inserted_id="SELECT `unique_id` FROM `basic_expenditure_info` WHERE `name_person`='$name' and `purpose_expenditure`='$purpose' and `amount`='$amount' and `mode`=$selected and `category`=$branch;";
			$res_id_inserted=mysqli_query($mysqli,$get_inserted_id);

			if(mysqli_num_rows($res_id_inserted)>0)	//getting the id
			{
				while($arr=mysqli_fetch_array($res_id_inserted))
				{
					$id=$arr['unique_id'];
				}
			}
			else //the data is not added
			{
				echo "Sorry! Please try again later!";
				$counter_flag++;
			}
			
			if(($branch==16)&&(isset($id)))
			{
				$branch_1=$_REQUEST['branch_1'];
				$f_p=$_REQUEST['f_p'];
				$s_p=$_REQUEST['s_p'];
				$t_p=$_REQUEST['t_p'];

				$sql_add_prizes_info="INSERT INTO `finance`.`event_prizes_money` (`unique_id_event`, `event_name_prize`, `prize_1`, `prize_2`, `prize_3`) VALUES ('$id', '$branch_1', '$f_p', '$s_p', '$t_p');";
				$res_add_prizes_info=mysqli_query($mysqli,$sql_add_prizes_info);

				if(!$res_add_prizes_info)//delete the records inserted in the basic expenditure table
				{
					echo "Prizes info not updated";
					$counter_flag++;
				}
			}


			if($selected==0)		//cash
			{
				$note_1=$_REQUEST['note_1'];
				$note_2=$_REQUEST['note_2'];
				$note_5=$_REQUEST['note_5'];
				$note_10=$_REQUEST['note_10'];
				$note_20=$_REQUEST['note_20'];
				$note_50=$_REQUEST['note_50'];
				$note_100=$_REQUEST['note_100'];
				$note_500=$_REQUEST['note_500'];
				$note_1000=$_REQUEST['note_1000'];
			
			
				$sql_add_cash="INSERT INTO `finance`.`mode_cash_expenditure` (`note_1`, `note_2`, `note_5`, `note_10`, `note_20`, `note_50`, `note_100`, `note_500`, `note_1000`, `category`, `unique_id_basic`) VALUES ('$note_1', '$note_2', '$note_5', '$note_10', '$note_20', '$note_50', '$note_100', '$note_500', '$note_1000', '$branch', '$id');";
				$res_add_cash=mysqli_query($mysqli,$sql_add_cash);
					
				if($res_add_cash)
				{
					echo "Added!!";
				}
					
				else //revert back by deleting the basic data
				{
					echo "Please Try again later...Thank you!";
					$counter_flag++; //check at last for counter status and delete the items accordingly
				}   


			}//End of selected id case if

			else if($selected==1)	//DD
			{
				$dd_numb=$_REQUEST['dd_numb'];
				$branch_name_dd=$_REQUEST['branch_name_dd'];
				$bank_name_dd=$_REQUEST['bank_name_dd'];
				$issue_date_dd=$_REQUEST['issue_date_dd'];
				

						$sql_add_dd= "INSERT INTO `finance`.`mode_dd_expenditure` (`dd_number`, `branch_name_dd`, `bank_name_dd`, `issue_date_dd`, `category`, `unique_id_basic`) VALUES ('$dd_numb', '$branch_name_dd', '$bank_name_dd', '$issue_date_dd', '$branch', '$id');";
						$res_add_dd=mysqli_query($mysqli,$sql_add_dd);
						
						if($res_add_dd)
						{
							echo "Added!!";
						}

						else //revert back by deleting the basic data
						{
							echo "Please Try again later...Thank you!";
							$counter_flag++; //check at last for counter status and delete the items accordingly
						}   

			}//End of selected id case if


			else if($selected==2)	//cheque
			{
				$cheque_numb=$_REQUEST['cheque_numb'];
				$branch_name_chq=$_REQUEST['branch_name_chq'];
				$bank_name_chq=$_REQUEST['bank_name_chq'];
				$issue_date_chq=$_REQUEST['issue_date_chq'];

						$sql_add_chq= "INSERT INTO `finance`.`mode_cheque_expenditure` (`cheque_number`, `branch_name_chq`, `bank_name_chq`, `issue_date_chq`, `category`, `unique_id_basic`) VALUES ('$cheque_numb', '$branch_name_chq', '$bank_name_chq', '$issue_date_chq', '$branch', '$id');";
						$res_add_chq=mysqli_query($mysqli,$sql_add_chq);
						
						if($res_add_chq)
						{
							echo "Added!!";
						}

						else //revert back by deleting the basic data
						{
							echo "Please Try again later...Thank you!";
							$counter_flag++; //check at last for counter status and delete the items accordingly
						}   

			}//End of selected id case if


			else if($selected==3)	//Net
			{
				$trans_id=$_REQUEST['trans_id'];
				$bank_name_net=$_REQUEST['bank_name_net'];
				$issue_date_net=$_REQUEST['issue_date_net'];


					$sql_add_net= "INSERT INTO `finance`.`mode_net_expenditure` (`trans_id`, `bank_name_net`, `issue_date_net`, `category`, `unique_id_basic`) VALUES ('$trans_id', '$bank_name_net', '$issue_date_net', '$id');";
					$res_add_net=mysqli_query($mysqli,$sql_add_net);
						
						if($res_add_net)
						{
							echo "Added!!";
						}

						else //revert back by deleting the basic data
						{
							echo "Please Try again later...Thank you!";
							$counter_flag++; //check at last for counter status and delete the items accordingly
						}   

			}//End of selected id case if

			else if($counter_flag!=0)//delete the records from basic table
			{
				$sql_del_basic="DELETE * FROM `basic_info` WHERE unique_id='$i' and category='0';";
				$res_del_basic=mysqli_query($mysqli,$sql_del_basic);
				if($res_del_basic)
				{
					echo "Please try again later!..Thank you..";
				}	
			}

		}
		else
		{
			echo "Sorry....please try again";
			exit();
		}
	}
	else if((isset($_SESSION['name_fin']))&&(!isset($_REQUEST['mode']))||((!isset($_SESSION['name_fin']))&&(!isset($_REQUEST['mode']))))
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