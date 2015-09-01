<!DOCTYPE html>
<html lang="en">
<head>
	<title>GraVITas'15</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
 	<style type="text/css">
		 .msg
		 {
		 	background: #e53935;
		 	color: #ffffff;
		 	position: absolute;
    		left: 400px;
    		bottom: 110px;
    		padding: 2px 7px;
    		border-radius: 25px;
		 }
		 body
		 {
    		display: flex;
    		min-height: 100vh;
    		flex-direction: column;
  		}
  		main 
  		{
    		flex: 1 0 auto;
 		}
		/* label color */
   		.input-field label 
   		{
     		color: #7986cb;
   		}
	   /* label focus color */
	   .input-field input[type=text]:focus + label 
	   {
	   		color: #1a237e;
	   }
	   /* label underline focus color */
	   .input-field input[type=text]:focus 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label underline color */
	   .input-field input[type=text] 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label focus color */
	   .input-field input[type=password]:focus + label 
	   {
	   		color: #1a237e;
	   }
	   /* label underline focus color */
	   .input-field input[type=password]:focus 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label underline color */
	   .input-field input[type=password] 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	</style>
</head>
<body>
	<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
		<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
		<h4 class="header light white-text">External Registration</h4>
	</header>
	<main>
		<br/>
			<br/>
		<div class='container'>
		<div class='card hoverable'>
<?php
session_start();
if((isset($_SESSION["id"]))&&(isset($_REQUEST["Refno"])))
{
	require("sql_con.php");
	$refno = $_REQUEST["Refno"];
	$tpsl = $_REQUEST["tpsltranid"];
	$bankref = $_REQUEST["bankrefno"];
	$txndate = $_REQUEST["txndate"];
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
					echo "Your Transaction was Successfully Completed Paid";
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
?>
<br><a href='event_list.php' class="waves-effect waves-light indigo darken-2 btn z-depth-1"></a>
</div>
</div>
</main>
</body>
</head>
</html>
<?php
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
s