<?php
session_start();
if((isset($_SESSION["id"]))&&(isset($_REQUEST["Tpsltranid"])))
{
	require("sql_con.php");
	$refno = $_REQUEST["Refno"];
	$tpsl = $_REQUEST["Tpsltranid"];
	$bankref = $_REQUEST["Bankrefno"];
	$txndate = $_REQUEST["Txndate"];
	$status = $_REQUEST["status"];
	echo "$refno\n$tpsl\n$bankref\n$txndate\n$status";
	$q = "SELECT `trans_id` FROM `online_payment` WHERE `trans_id`='$refno'";
	$res = mysqli_query($mysqli,$q);
	$c = mysqli_num_rows($res);
	if($c==1)
	{
		if($status=="0300")
		{
			$q1 = "UPDATE `online_payment` SET `tpslid`='$tpsl',`bankrefno`='$bankref',`txndate`='$txndate',`status`='$status',`paid_status`='1',`progress_level`= 'success' WHERE `trans_id`='$refno'";
			if(mysqli_query($mysqli,$q1))
			{
				$q2 = "UPDATE `external_registration` SET `paid_status`='1' WHERE `trans_id`='$refno'";
				if(mysqli_query($mysqli,$q2))
					echo "Successfully Paid";
				else
				{
					//needs to be coded
				}
			}
			else
			{
				//needs to be coded
			}
		}
		else if($status=="0399")
		{
			$q2 = "UPDATE `online_payment` SET `tpslid`='$tpsl',`bankrefno`='$bankref',`txndate`='$txndate',`status`='$status',`paid_status`='0',`progress_level`= 'failure' WHERE `trans_id`='$refno'";
			if(mysqli_query($mysqli,$q2))
			{
				$q2 = "UPDATE `external_registration` SET `paid_status`='0' WHERE `trans_id`='$refno'";
				if(mysqli_query($mysqli,$q2))
					echo"Error in processing Transaction";
				else
				{
					//needs to be coded
				}
			}
			else
			{
				//needs to be coded
			}
		}		
	}
}
else
{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:index.php");
}
?>