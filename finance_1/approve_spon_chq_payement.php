<?php
	session_start();
	if(isset($_SESSION['name_fin']))//session_variable
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];
		
		$mode=$_SESSION['mode'];

		if($mode==1)
			$sql_approve="UPDATE  `finance`.`mode_cheque` SET  `approval_1` =  '1' WHERE  `mode_cheque`.`unique_id_chq` =$id;";
		
		else if($mode==2)
			$sql_approve="UPDATE  `finance`.`mode_cheque` SET  `approval_2` =  '1' WHERE  `mode_cheque`.`unique_id_chq` =$id;";

		else if($mode==3)
			$sql_approve="UPDATE  `finance`.`mode_cheque` SET  `approval_3` =  '1' WHERE  `mode_cheque`.`unique_id_chq` =$id;";

		$res_approve=mysqli_query($mysqli,$sql_approve);

		if($res_approve)
		{
			echo "</br><b>Approved</b></br>";
		}
	}
	else//logout
	{

	}
?>