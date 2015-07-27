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

		if($id==3)
			echo "
		<h3>Cash approval</h3>
		Search by Name of Person:<input type='text' name='search_per_name' onkeyup='search_spon(1,".$id.")' placeholder='Name of Event' id='search_per_name' autocomplete='off'></br>or</br>
		Search by Date:<input type='date' name='search_comp_name' onkeyup='search_spon(2,".$id.")' placeholder='Name of Company' id='search_comp_name' autocomplete='off'>(*Please Enter the complete date)</br></br>";
		
		else
			echo "
			<h3>Cash approval</h3>
			Search by Name of Event:<input type='text' name='search_per_name' onkeyup='search_spon(1,".$id.")' placeholder='Name of Event' id='search_per_name' autocomplete='off'></br>or</br>
			Search by Name of Company:<input type='text' name='search_comp_name' onkeyup='search_spon(2,".$id.")' placeholder='Name of Company' id='search_comp_name' autocomplete='off'></br></br>";
		

		echo "<div id='search_results_spon'>";

		echo"<button onclick='download_cash_excel(this.id,".$id.")' id='0'>Excel Download for Approved</button></br></br>
			<button onclick='download_cash_excel(this.id,".$id.")' id='1'>Excel Download for All</button></br></br>";

			if($mode==1)
				$sql_cash = "SELECT * FROM  `mode_cash` WHERE `mode_cash`.`category`=".$id." and approval_1='0' LIMIT 0,30";
			
			else if($mode==2)
				$sql_cash = "SELECT * FROM  `mode_cash` WHERE `mode_cash`.`category`=".$id." and approval_1='1' and approval_2='0' LIMIT 0,30";

			else if($mode==3)
				$sql_cash = "SELECT * FROM  `mode_cash` WHERE `mode_cash`.`category`=".$id." and approval_1='1' and approval_2='1' and approval_3='0' LIMIT 0,30";
			
			$res_cash = mysqli_query($mysqli,$sql_cash);
			if(mysqli_num_rows($res_cash)>0)
			{
				while($arr_cash=mysqli_fetch_array($res_cash))
				{
					$unique_id_basic=$arr_cash['unique_id_basic'];
					echo "ID=".$unique_id_basic."</br>";
					$note_1=$arr_cash['note_1'];
					$note_2=$arr_cash['note_2'];
					$note_5=$arr_cash['note_5'];
					$note_10=$arr_cash['note_10'];
					$note_20=$arr_cash['note_20'];
					$note_50=$arr_cash['note_50'];
					$note_100=$arr_cash['note_100'];
					$note_500=$arr_cash['note_500'];
					$note_1000=$arr_cash['note_1000'];
					$app_1=$arr_cash['approval_1'];
					$app_2=$arr_cash['approval_2'];
					$app_3=$arr_cash['approval_3'];
					$cash_id=$arr_cash['unique_id_note'];

					$sql_cash_basic="SELECT * FROM  `basic_info` WHERE unique_id='$unique_id_basic' and category=$id";
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
					echo "Denomination:<br/>";
					if($note_1!=0)
						echo"1 X".$note_1."</br>";
					if($note_2!=0)
						echo"2 X".$note_2."</br>";
					if($note_5!=0)
						echo"5 X".$note_5."</br>"."</br>";
					if($note_10!=0)
						echo"10 X".$note_10."</br>";
					if($note_20!=0)
						echo"20 X".$note_20."</br>";
					if($note_50!=0)
						echo"50 X".$note_50."</br>";
					if($note_100!=0)
						echo"100 X".$note_100."</br>";
					if($note_500!=0)
						echo"500 X".$note_500."</br>";
					if($note_1000!=0)
						echo"1000 X".$note_1000."</br>";


					//approving data

						if($mode==1)
						{
							if($app_1==0)//not approved..provide a button
							{
								echo "<div id='button_spon_".$cash_id."'></br><button onclick='return approve_spon_cash(".$cash_id.")'>Approve the Transaction</button></div></br>";
							}
							else
							{
								echo "</br><b>Approved</b></br>";
							}
						}

						else if($mode==2)
						{
							if(($app_1==1)&&($app_2==0))//not approved..provide a button
							{
								echo "<div id='button_spon_".$cash_id."'></br><button onclick='return approve_spon_cash(".$cash_id.")'>Approve the Transaction</button></div></br>";
							}
							else if(($app_1==1)&&($app_2==1))
							{
								echo "</br><b>Approved</b></br>";
							}
							else if(($app_1==0)&&($app_2==0))
							{
								echo "</br><b>Waiting For 1st Approval</b></br>";
							}
						}

						else if($mode==3)
						{
							if(($app_1==1)&&($app_2==1)&&($app_3==0))//not approved..provide a button
							{
								echo "<div id='button_spon_".$cash_id."'></br><button onclick='return approve_spon_cash(".$cash_id.")'>Approve the Transaction</button></div></br>";
							}
							else if(($app_1==1)&&($app_2==1)&&($app_3==1))
							{
								echo "</br><b>Approved</b></br>";
							}
							else if(($app_1==0)&&($app_2==0)&&($app_3==0))
							{
								echo "</br><b>Waiting For 1st Approval and 2nd Approval</b></br>";
							}
							else if(($app_1==1)&&($app_2==0)&&($app_3==0))
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