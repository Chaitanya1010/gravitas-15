<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		
		$event_name=$_REQUEST['name'];
		$id=$_REQUEST['id'];
		$category=$_REQUEST['cat'];
		
		$event_name=strtolower($event_name);
	
		$mode=$_SESSION['mode'];

		if($id==1)
			$sql_cash_basic="SELECT * FROM  `basic_info` WHERE LOWER(event_name) LIKE '".$event_name."%' and mode='0' and category=".$category.";";

		else if($id==2)
			$sql_cash_basic="SELECT * FROM  `basic_info` WHERE LOWER(company_name) LIKE '".$event_name."%' and mode='0' and category=".$category.";";	
			

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
				$unique_id=$arr_basic['unique_id'];
			
				$sql_cash = "SELECT * FROM  `mode_cash` WHERE unique_id_basic=$unique_id;";
				$res_cash = mysqli_query($mysqli,$sql_cash);
				if(mysqli_num_rows($res_cash)>0)
				{
					while($arr_cash=mysqli_fetch_array($res_cash))
					{
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
						
						echo "
						ID=".$unique_id."</br>
						Event name=".$event_name."</br>Company name=".$company_name."</br>Amount=".$amount."</br>Phone number=".$phno."</br>Email=".$email_id."</br>Remarks=".$remarks."</br>";
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
				else//no results to display
				{
						echo "No results to display";
				}
			}
		}
		else //no results found
		{
			echo "No results to display";
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