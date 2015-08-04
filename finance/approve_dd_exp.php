<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];

		$mode=$_SESSION['mode'];

		$first_data="Name of Person";
		$second_data="Purpose";
		$third_data="Amount";
		$fourth_data="Phone Number";
		$fifth_data="Remarks";

		echo "
		<h5>DD approval</h5>";
		echo"<div class='row'><div class='input-field col s12 m6'>
		<label for='search_dd_numb'>Search by DD number</label><input type='text' name='search_dd_numb' onkeyup='search_spon_dd_exp(".$id.")'  id='search_dd_numb' autocomplete='off'></div></div>
		<div id='search_results_spon_dd_exp'>";

			echo"<button class='btn waves-effect waves white indigo-text darken-4' onclick='download_dd_excel(this.id,".$id.")' id='0'>Excel Download for Approved</button>
			<button class='btn waves-effect waves white indigo-text darken-4' onclick='download_dd_excel(this.id,".$id.")' id='1'>Excel Download for All</button><br />";


			if($mode==55)
				$sql_dd = "SELECT * FROM  `mode_dd_expenditure` WHERE `mode_dd_expenditure`.`category`=".$id." and approval_1='0' LIMIT 0,30";

			$res_dd = mysqli_query($mysqli,$sql_dd);
			if(mysqli_num_rows($res_dd)>0)
			{
				while($arr_dd=mysqli_fetch_array($res_dd))
				{
					$unique_id_basic=$arr_dd['unique_id_basic'];
					//echo "ID=".$unique_id_basic."</br>";
		?>
		<div class='card'>
			<div class='card-content'>
		<?php
					$dd_number=$arr_dd['dd_number'];
					$branch_dd=$arr_dd['branch_name_dd'];
					$bank_dd=$arr_dd['bank_name_dd'];
					$app_1_dd=$arr_dd['approval_1'];

					$dd_id=$arr_dd['unique_id_dd'];
					$issue_date_dd=$arr_dd['issue_date_dd'];

					$sql_cash_basic="SELECT * FROM  `basic_expenditure_info` WHERE unique_id='$unique_id_basic' and category=".$id."";
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
						}
					}
					else
					{
						echo "<br/>No selected DATA<br/>";
					}
						echo "<h5 class='header light'>".$event_name."</h5>".$second_data."=".$company_name."<span class='right'>".$third_data."=".$amount."</span><br />".$fourth_data."=".$phno."<span class='right'>".$fifth_data."=".$remarks."</span></br>";
						echo "<b>DD number=".$dd_number."</b></br>Branch Name=".$branch_dd."</br>Bank Name=".$bank_dd."</br>Issue date".$issue_date_dd."</br>";

					//approving data

						if($mode==55)
						{
							if($app_1_dd==0)//not approved..provide a button
							{
								echo "<div id='button_spon_dd_exp_".$dd_id."'></br><button  class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_spon_dd_exp(".$dd_id.")'>Approve the Transaction</button></div></br>";
							}
							else
							{
								echo "</br><b>Approved</b></br>";
							}
						}
						
					echo"</div></div>";

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
