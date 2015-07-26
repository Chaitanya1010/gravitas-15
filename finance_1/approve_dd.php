<?php
	session_start();
	if(true)//session_variable
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];

		$mode=$_SESSION['mode'];

		echo "
		<h3>DD approval</h3>";
		echo"
		Search by DD number:<input type='text' name='search_dd_numb' onkeyup='search_spon_dd(3,".$id.")' placeholder='DD Number' id='search_dd_numb' autocomplete='off'></br></br>
		<div id='search_results_spon_dd'>";

			echo"<button onclick='download_dd_excel(this.id,".$id.")' id='0'>Excel Download for Approved</button></br></br>
			<button onclick='download_dd_excel(this.id,".$id.")' id='1'>Excel Download for All</button></br></br>";


			if($mode==1)
				$sql_dd = "SELECT * FROM  `mode_dd` WHERE `mode_dd`.`category`=".$id." and approval_1='0' LIMIT 0,30";

			else if($mode==2)
				$sql_dd = "SELECT * FROM  `mode_dd` WHERE `mode_dd`.`category`=".$id." and approval_1='1' and approval_2='0' LIMIT 0,30";

			else if($mode==3)
				$sql_dd = "SELECT * FROM  `mode_dd` WHERE `mode_dd`.`category`=".$id." and approval_1='1' and approval_2='1' and approval_3='0' LIMIT 0,30";

			$res_dd = mysqli_query($mysqli,$sql_dd);
			if(mysqli_num_rows($res_dd)>0)
			{
				while($arr_dd=mysqli_fetch_array($res_dd))
				{
					$unique_id_basic=$arr_dd['unique_id_basic'];
					echo "ID=".$unique_id_basic."</br>";

					$dd_number=$arr_dd['dd_number'];
					$branch_dd=$arr_dd['branch_name_dd'];
					$bank_dd=$arr_dd['bank_name_dd'];
					$app_1_dd=$arr_dd['approval_1'];
					$app_2_dd=$arr_dd['approval_2'];
					$app_3_dd=$arr_dd['approval_3'];

					$dd_id=$arr_dd['unique_id_dd'];
					$issue_date_dd=$arr_dd['issue_date_dd'];

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
					

					echo "
					Event name=".$event_name."</br>Company name=".$company_name."</br>Amount=".$amount."</br>Phone number=".$phno."</br>Email=".$email_id."</br>Remarks=".$remarks."</br>";
					echo "DD number=".$dd_number."</br>Branch Name=".$branch_dd."</br>Bank Name=".$bank_dd."</br>Issue date".$issue_date_dd."</br>";
					
					//approving data

						if($mode==1)
						{
							if($app_1_dd==0)//not approved..provide a button
							{
								echo "<div id='button_spon_dd_".$dd_id."'></br><button onclick='return approve_spon_dd(".$dd_id.")'>Approve the Transaction</button></div></br>";
							}
							else
							{
								echo "</br><b>Approved</b></br>";
							}
						}
						else if($mode==2)
						{
							if(($app_1_dd==1)&&($app_2_dd==0))//not approved..provide a button
							{
								echo "<div id='button_spon_dd_".$dd_id."'></br><button onclick='return approve_spon_dd(".$dd_id.")'>Approve the Transaction</button></div></br>";
							}

							else if(($app_1_dd==1)&&($app_2_dd==1))
							{
								echo "</br><b>Approved</b></br>";
							}

							else if(($app_1_dd==0)&&($app_2_dd==0))
							{
								echo "</br><b>Waiting For 1st Approval</b></br>";
							}
						}
						
						else if($mode==3)
						{
							if(($app_1_dd==1)&&($app_2_dd==1)&&($app_3_dd==0))//not approved..provide a button
							{
									echo "<div id='button_spon_dd_".$dd_id."'></br><button onclick='return approve_spon_dd(".$dd_id.")'>Approve the Transaction</button></div></br>";
							}

							else if(($app_1_dd==1)&&($app_2_dd==1)&&($app_3_dd==1))
							{
								echo "</br><b>Approved</b></br>";
							}

							else if(($app_1_dd==0)&&($app_2_dd==0)&&($app_3_dd==0))
							{
								echo "</br><b>Waiting For 1st Approval and 2nd Approval</b></br>";
							}

							else if(($app_1_dd==1)&&($app_2_dd==0)&&($app_3_dd==0))
							{
								echo "</br><b>Waiting For 2nd Approval</b></br>";
							}
						}

					echo"</br></br>";

				}
			}
		echo "</div>";		
	}
?>