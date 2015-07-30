<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];

		$mode=$_SESSION['mode'];

		if($id==100)//External
			echo "
		<h5 class='header light'>Externals</h5>";
		else
			echo "
		<h5 class='header light'>Internals</h5>";

		echo"<div class='row'><div class='input-field col s12 m6'>
		<label for='id_reg'>ID For excel download</label><input type='text' name='id_reg' id='id_reg' autocomplete='off' onkeypress='return isNumber(event)'></div><div class='col s12 m4'>
		<button  class='btn waves-effect waves white indigo-text darken-4' onclick='submit_reg_app(".$id.");'>Submit!</button></div></div>
		";

			if($mode==1)
			{
				if($id==100)
					$sql_reg = "SELECT * FROM  `data_externals` WHERE approval_1='0' LIMIT 0,30";

				else
					$sql_reg = "SELECT * FROM  `data_internals` WHERE approval_1='0' LIMIT 0,30";
			}

			if($mode==2)
			{
				if($id==100)
					$sql_reg = "SELECT * FROM  `data_externals` WHERE approval_2='0' LIMIT 0,30";

				else
					$sql_reg = "SELECT * FROM  `data_internals` WHERE approval_2='0' LIMIT 0,30";
			}

			if($mode==3)
			{
				if($id==100)
					$sql_reg = "SELECT * FROM  `data_externals` WHERE approval_3='0' LIMIT 0,30";

				else
					$sql_reg = "SELECT * FROM  `data_internals` WHERE approval_3='0' LIMIT 0,30";
			}

			$res_reg = mysqli_query($mysqli,$sql_reg);
			if(mysqli_num_rows($res_reg)>0)
			{
				if($id==100)
				{
					while($arr_reg=mysqli_fetch_array($res_reg))
					{
						?>
						<div class='card'>
							<div class='card-content'>
						<?php
							$reg_id=$arr_reg['unique_id_externals'];
							$number_externals=$arr_reg['number_external'];
							$amount_external=$arr_reg['amount_external'];
							$update_ext_date=$arr_reg['update_ext_date'];
							$update_ext_id=$arr_reg['update_ext_id'];
							$remarks=$arr_reg['remarks_external'];
							$app_1=$arr_reg['approval_1'];
							$app_2=$arr_reg['approval_2'];
							$app_3=$arr_reg['approval_3'];

							echo "
							Updated ID=".$update_ext_id."</br>Amount=".$amount_external."</br>
							Number of Externals=".$number_externals."</br>Updated Date=".$update_ext_date."</br>
							Remarks=".$remarks;

							if($mode==1)
							{
								if($app_1==0)//not approved..provide a button
								{
									echo "<div id='button_reg_".$reg_id."'></br><button class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_register(".$reg_id.",".$id.")'>Approve the Transaction</button></div></br>";
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
									echo "<div id='button_reg_".$reg_id."'></br><button class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_register(".$reg_id.",".$id.")'>Approve the Transaction</button></div></br>";
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
									echo "<div id='button_reg_".$reg_id."'></br><button class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_register(".$reg_id.",".$id.")'>Approve the Transaction</button></div></br>";
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


					echo"</div></div>";
					}
				}
				else
				{
					while($arr_reg=mysqli_fetch_array($res_reg))
					{
						?>
						<div class='card'>
							<div class='card-content'>
						<?php
							$reg_id=$arr_reg['unique_id_internals'];
							$number_externals=$arr_reg['number_internal'];
							$amount_external=$arr_reg['amount_internal'];
							$update_ext_date=$arr_reg['update_int_date'];
							$update_ext_id=$arr_reg['update_int_id'];
							$remarks=$arr_reg['remarks_internal'];
							$app_1=$arr_reg['approval_1'];
							$app_2=$arr_reg['approval_2'];
							$app_3=$arr_reg['approval_3'];

							echo "
							Updated ID=".$update_ext_id."</br>Amount=".$amount_external."</br>
							Number of Externals=".$number_externals."</br>Updated Date=".$update_ext_date."</br>
							Remarks=".$remarks;

							if($mode==1)
							{
								if($app_1==0)//not approved..provide a button
								{
									echo "<div id='button_reg_".$reg_id."'></br><button class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_register(".$reg_id.",".$id.")'>Approve the Transaction</button></div></br>";
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
									echo "<div id='button_reg_".$reg_id."'></br><button class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_register(".$reg_id.",".$id.")'>Approve the Transaction</button></div></br>";
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
									echo "<div id='button_reg_".$reg_id."'></br><button class='btn waves-effect waves white indigo-text darken-4' onclick='return approve_register(".$reg_id.",".$id.")'>Approve the Transaction</button></div></br>";
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


						echo"</div></div>";

					}

				}
		}
			else
			{
				echo "<br/>No selected DATA<br/>";
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
