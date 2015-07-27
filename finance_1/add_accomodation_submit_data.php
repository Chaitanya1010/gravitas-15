<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['amount'])))//session_variable verification
	{
		require('sql_con.php');

		$selected=$_REQUEST['mode'];
		$event_name=$_REQUEST['e_name'];
		$company_name=$_REQUEST['c_name'];
		$amount=$_REQUEST['amount'];
		$phno=$_REQUEST['phno'];
		$remarks=$_REQUEST['remarks'];
		$numb_days=$_REQUEST['numb_days'];

		$counter_flag=0;
		
			$sql_basic_add="INSERT INTO `finance`.`basic_info` (`category`,`event_name`, `company_name`, `amount`, `phno`, `email_id`, `mode`, `remarks`) VALUES ('1', '$event_name', '$company_name', '$amount', '$phno', '$numb_days', '$selected', '$remarks');";

			$res_basic_add=mysqli_query($mysqli,$sql_basic_add);
			
			if($res_basic_add)
			{
				$get_inserted_id="SELECT `unique_id` FROM `basic_info` WHERE `event_name`='$event_name' and `company_name`='$company_name' and `amount`='$amount' and `mode`=$selected and `category`='1';";
				$res_id_inserted=mysqli_query($mysqli,$get_inserted_id);
				
				if(mysqli_num_rows($res_id_inserted)>0)	//getting the id
				{
					while($arr=mysqli_fetch_array($res_id_inserted))
					{
						$id=$arr['unique_id'];
					}

				}
			}

			else //the data is not added
			{
				echo "Sorry! Please try again later!";
				exit();
			}

		if($res_basic_add)
		{
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
				
				
						$sql_add_cash="INSERT INTO `finance`.`mode_cash` (`note_1`, `note_2`, `note_5`, `note_10`, `note_20`, `note_50`, `note_100`, `note_500`, `note_1000`, `category`, `unique_id_basic`, `approval_1`, `approval_2`, `approval_3`) VALUES ('$note_1', '$note_2', '$note_5', '$note_10', '$note_20', '$note_50', '$note_100', '$note_500', '$note_1000',	'1', '$id', 0, 0, 0);";
						$res_add_cash=mysqli_query($mysqli,$sql_add_cash);
						
						if($res_add_cash)
						{
							echo "Added!!";
						}
						
						else //revert back by deleting the basic data
						{
							$counter_flag++; //check at last for counter status and delete the items accordingly
						}   


			}//End of selected id case if

			if($counter_flag!=0)//delete the records from basic table
			{
				$sql_del_basic="DELETE * FROM `basic_info` WHERE unique_id='$i' and category='0';";
				$res_del_basic=mysqli_query($mysqli,$sql_del_basic);
				if($res_del_basic)
				{
					echo "Please try again later!..Thank you..";
				}	
			}
		}
//********************************************************************************************************
	}
	else if((isset($_SESSION['name_fin']))&&(!isset($_REQUEST['amount']))||((!isset($_SESSION['name_fin']))&&(!isset($_REQUEST['amount']))))
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