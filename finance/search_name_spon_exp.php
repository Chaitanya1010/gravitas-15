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

		$first_data="Name of Person";
		$second_data="Purpose";
		$third_data="Amount";
		$fourth_data="Phone Number";
		$fifth_data="Remarks";

		
		$sql_cash_basic="SELECT * FROM  `basic_expenditure_info` WHERE LOWER(name_person) LIKE '".$event_name."%' and mode='0' and category=".$category.";";
		$res_cash_basic=mysqli_query($mysqli,$sql_cash_basic);

		if(mysqli_num_rows($res_cash_basic)>0)
		{
			while($arr_basic=mysqli_fetch_array($res_cash_basic))
			{
				$event_name=$arr_basic['name_person'];
				$company_name=$arr_basic['purpose_expenditure'];
				$amount=$arr_basic['amount'];
				$phno=$arr_basic['phno'];
				$remarks=$arr_basic['remarks'];
				$unique_id=$arr_basic['unique_id'];
			
				$sql_cash = "SELECT * FROM  `mode_cash_expenditure` WHERE unique_id_basic=$unique_id;";
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
						$cash_id=$arr_cash['unique_id_note'];
						?>

						<div class='card'>
						<div class='card-content'>
						
						<?php
						echo "
						ID=".$unique_id."</br>";
						
					echo "<h5 class='header light'>".$event_name."</h5>".$second_data."=".$company_name."<span class='right'>".$third_data."=".$amount."</span><br />".$fourth_data."=".$phno."<span class='right'>".$fifth_data."=".$remarks."</span></br>";
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

						if($mode==55)
						{
							if($app_1==0)//not approved..provide a button
							{
								echo "<div id='button_spon_exp_".$cash_id."'></br><button class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_spon_cash_exp(".$cash_id.")'>Approve the Transaction</button></div></br>";
							}
							else
							{
								echo "</br><b>Approved</b></br>";
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
			echo "No results to display here";
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