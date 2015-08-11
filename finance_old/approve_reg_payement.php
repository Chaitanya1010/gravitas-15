<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];
		$cat=$_REQUEST['cat'];

		$mode=$_SESSION['mode'];

		if($mode==1)
		{
			if($cat==100)
				$sql_approve="UPDATE  `finance`.`data_externals` SET  `approval_1` =  '1' WHERE  `data_externals`.`unique_id_externals` =$id;";
			else if($cat==101)
				$sql_approve="UPDATE  `finance`.`data_internals` SET  `approval_1` =  '1' WHERE  `data_internals`.`unique_id_internals` =$id;";
		}
		
		else if($mode==2)
		{
			if($cat==100)
				$sql_approve="UPDATE  `finance`.`data_externals` SET  `approval_2` =  '1' WHERE  `data_externals`.`unique_id_externals` =$id;";
			else if($cat==101)
				$sql_approve="UPDATE  `finance`.`data_internals` SET  `approval_2` =  '1' WHERE  `data_internals`.`unique_id_internals` =$id;";
		}

		else if($mode==3)
		{
			if($cat==100)
				$sql_approve="UPDATE  `finance`.`data_externals` SET  `approval_3` =  '1' WHERE  `data_externals`.`unique_id_externals` =$id;";
			else if($cat==101)
				$sql_approve="UPDATE  `finance`.`data_internals` SET  `approval_3` =  '1' WHERE  `data_internals`.`unique_id_internals` =$id;";
		}

		$res_approve=mysqli_query($mysqli,$sql_approve);

		if($res_approve)
		{
			echo "</br><b>Approved</b></br>";
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