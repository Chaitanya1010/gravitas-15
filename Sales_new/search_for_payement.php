<?php
	session_start();
	if((isset($_SESSION['regno']))&&(isset($_REQUEST['value'])))//session_variable verification
	{
		require('sql_con.php');

		$value=$_REQUEST['value'];

		$value=strtolower($value);

		//echo $value;

		$sql_search="SELECT * FROM  `order_sales` WHERE LOWER(regno) LIKE '".$value."%' and paid_status='0'";
		$res_search=mysqli_query($mysqli,$sql_search);
		if(mysqli_num_rows($res_search)>0)
		{
			//	echo "Im inside while";
			echo "<TABLE class='striped container centered'><thead><TR><TH>Category</TH><TH>Quantity</TH><TH>Size</TH><TH>Cost</TH><TH>Approval</TH></TR></thead>";
			while($t1=mysqli_fetch_array($res_search))
			{
				$id=$t1['unique_id'];
				$regno = $t1["regno"];
				$phno=$t1['phno'];
				$blck_name=$t1['blck_name'];
				$blck_numb=$t1['blck_numb'];
				$amount=$t1['amount'];

				$t_1=$t1['t_1'];
				$t_2=$t1['t_2'];
				$c_1=$t1['c_1'];
				$c_2=$t1['c_2'];
				$c_3=$t1['c_3'];

				$size_t_1=$t1['size_t_1'];
				$size_t_2=$t1['size_t_2'];

				$size_c_1_t_1=$t1['size_c_1_t_1'];
				$size_c_1_t_2=$t1['size_c_1_t_2'];

				$size_c_2_t_1=$t1['size_c_2_t_1'];

				$size_c_3_t_1=$t1['size_c_3_t_1'];
				$size_c_3_t_2=$t1['size_c_3_t_2'];

				if($t_1==0)
				{
					$size_t_1='';
				}

				if($t_2==0)
				{
					$size_t_2='';
				}

				if($c_1==0)
				{
					$size_c_1_t_1='';
					$size_c_1_t_2='';
				}

				if($c_2==0)
				{
					$size_c_2_t_1='';
				}

				if($c_3==0)
				{
					$size_c_3_t_1='';
					$size_c_3_t_2='';
				}


					echo "
					<tr><td></td><td></td><td></td>
				<td><h6><b>".strtoupper($regno)."</b></h6></td><td></td>
					</tr>
						<TR>
							<TD>";
							// echo "<h4 class='header light'>$regno</h4>";
						if($c_1!=0)
							echo "Combo-1</br>";
						if($c_2!=0)
							echo "Combo-2";
						if($c_3!=0)
							echo "Combo-3</br>";
							echo"</TD>
							<TD></TD>
							<TD></TD>
							<TD>
								<h5 class='header light'>&#8377;$amount</h5>

							</TD>
							<td>
							<div id='button_payement_".$id."'><button class='btn btn-flat waves-effect waves white indigo-text darken-4' onclick='return approve_payement(".$id.")'>Approve the Transaction</button></div>
							</td>
						</TR>";


			if($t_1+$c_1+$c_2+$c_3>0)
			{
				//echo $t_1+$c_1+$c_2+$c_3;
				$sum=$t_1+$c_1+$c_2+$c_3;
				echo "
					<TR>
						<TD>
							Round Neck(s)
						</TD>
						<TD>
							$sum
						</TD>
						<TD>
							$size_t_1,$size_c_1_t_1,$size_c_2_t_1,$size_c_3_t_1
						</TD>
					</TR>";
			}

			if($t_2+$c_1+$c_3>0)
			{
				$sum=$t_2+$c_1+$c_3;
				echo "<TR>
						<TD>
							Polo T-shirts(s)
						</TD>
						<TD>
							$sum
						</TD>
						<TD>
							$size_t_2,$size_c_1_t_2,$size_c_3_t_2
						</TD>
					</TR>";
			}

			}
			echo"</TABLE>";
		}
		else
		echo "<div class='container'><p class='flow-text'>No results to Display!</p></div>";
	}
	else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['value']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['value']))))
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
