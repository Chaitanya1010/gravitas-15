<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];

		$mode=$_SESSION['mode'];

		if($id==0)//sponsors
		{
			$first_data="Company Name";
			$second_data="Person Name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="Email-ID";
			$sixth_data="Remarks";
		}

		if($id==1)	//Accomodation
		{
			$first_data="Event Name";
			$second_data="Institute Name and Place";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="No.of days";
			$sixth_data="Remarks";
		}
		
		if($id==2)	//Stall - Rent
		{
			$first_data="Purpose of Stall";
			$second_data="Person Name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="No.of days";
			$sixth_data="Remarks";
		}
		
		if($id==3)	//Stall - Rent
		{
			$first_data="Person Name";
			$second_data="Date";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="No.of T-shirts ordered";
			$sixth_data="Remarks";
		}

		if($id==4)	//Workshops
		{
			$first_data="Name of Workshop";
			$second_data="Workshop Conducting Company Name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="Email-ID";
			$sixth_data="Remarks";
		}

		if($id==5)	//Others
		{
			$first_data="Name/Event name";
			$second_data="Sponsor Company/Person name";
			$third_data="Amount";
			$fourth_data="Phone Number";
			$fifth_data="Email-ID";
			$sixth_data="Remarks";
		}

		echo "
		<h3>Cheque approval</h3>";
		echo"
		Search by Cheque number:<input type='text' name='search_chq_numb' onkeyup='search_spon_chq(3,".$id.")' placeholder='Cheque Number' id='search_chq_numb' autocomplete='off'></br></br>
		<div id='search_results_spon_chq'>";
			
			echo"<button onclick='download_chq_excel(this.id,".$id.")' id='0'>Excel Download for Approved</button></br></br>
			<button onclick='download_chq_excel(this.id,".$id.")' id='1'>Excel Download for All</button></br></br>";


			if($mode==1)
				$sql_chq = "SELECT * FROM  `mode_cheque` WHERE `mode_cheque`.`category`=".$id." and approval_1='0' LIMIT 0,30";
			
			else if($mode==2)
				$sql_chq = "SELECT * FROM  `mode_cheque` WHERE `mode_cheque`.`category`=".$id." and approval_1='1' and approval_2='0' LIMIT 0,30";

			else if($mode==3)
				$sql_chq = "SELECT * FROM  `mode_cheque` WHERE `mode_cheque`.`category`=".$id." and approval_1='1' and approval_2='1' and approval_3='0' LIMIT 0,30";

			
			$res_chq = mysqli_query($mysqli,$sql_chq);
			if(mysqli_num_rows($res_chq)>0)
			{
				while($arr_chq=mysqli_fetch_array($res_chq))
				{
					$unique_id_basic=$arr_chq['unique_id_basic'];
					echo "ID=".$unique_id_basic."</br>";

					$chq_number=$arr_chq['cheque_number'];
					$branch_chq=$arr_chq['branch_name_chq'];
					$bank_chq=$arr_chq['bank_name_chq'];
					$app_1_chq=$arr_chq['approval_1'];
					$app_2_chq=$arr_chq['approval_2'];
					$app_3_chq=$arr_chq['approval_3'];
					$chq_id=$arr_chq['unique_id_chq'];
					$issue_date_chq=$arr_chq['issue_date_chq'];

					$sql_cash_basic="SELECT * FROM  `basic_info` WHERE unique_id='$unique_id_basic' and category=".$id."";
					$res_cash_basic=mysqli_query($mysqli,$sql_cash_basic);

					if(mysqli_num_rows($res_cash_basic)>0)
					{
						while($arr_basic=mysqli_fetch_array($res_cash_basic))
						{
							$event_name=$arr_basic['event_name'];
							$company_name=$arr_basic['company_name'];
							$amount=$arr_basic['amount'];
							$phno=$arr_basic['phno'];
							$email_id=$arr_basic['email_id'];
							$remarks=$arr_basic['remarks'];
						}
					}
					else
					{
						echo "<br/>No selected DATA<br/>";
					}
					
					echo 
					$first_data."=".$event_name."</br>".$second_data."=".$company_name."</br>".$third_data."=".$amount."</br>".$fourth_data."=".$phno."</br>".$fifth_data."=".$email_id."</br>".$sixth_data."=".$remarks."</br>";
					
					echo "Cheque number=".$chq_number."</br>Branch Name=".$branch_chq."</br>Bank Name=".$bank_chq."</br>Issue date".$issue_date_chq."</br>";
					
					//approving data

						if($mode==1)
						{
							if($app_1_chq==0)//not approved..provide a button
							{
								echo "<div id='button_spon_chq_".$chq_id."'></br><button onclick='return approve_spon_chq(".$chq_id.")'>Approve the Transaction</button></div></br>";
							}

							else
							{
								echo "</br><b>Approved</b></br>";
							}
						}
						else if($mode==2)
						{
							if(($app_1_chq==1)&&($app_2_chq==0))//not approved..provide a button
							{
								echo "<div id='button_spon_chq_".$chq_id."'></br><button onclick='return approve_spon_chq(".$chq_id.")'>Approve the Transaction</button></div></br>";
							}

							else if(($app_1_chq==1)&&($app_2_chq==1))
							{
								echo "</br><b>Approved</b></br>";
							}

							else if(($app_1_chq==0)&&($app_2_chq==0))
							{
								echo "</br><b>Waiting For 1st Approval</b></br>";
							}
						}
						else if($mode==3)
						{
							if(($app_1_chq==1)&&($app_2_chq==1)&&($app_3_chq==0))//not approved..provide a button
							{
								echo "<div id='button_spon_chq_".$chq_id."'></br><button onclick='return approve_spon_chq(".$chq_id.")'>Approve the Transaction</button></div></br>";
							}

							else if(($app_1_chq==1)&&($app_2_chq==1)&&($app_3_chq==1))
							{
								echo "</br><b>Approved</b></br>";
							}

							else if(($app_1_chq==0)&&($app_2_chq==0)&&($app_3_chq==0))
							{
								echo "</br><b>Waiting For 1st Approval and 2nd Approval</b></br>";
							}

							else if(($app_1_chq==1)&&($app_2_chq==0)&&($app_3_chq==0))
							{
								echo "</br><b>Waiting For 2nd Approval</b></br>";
							}
						}

					echo"</br></br>";

				}
			}
		echo "</div>";		
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