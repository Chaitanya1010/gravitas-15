<?php
	require("sql_con.php");
	$uname = $_POST["uname"];
	$pword = base64_encode($_POST["pword"]);
	$q="SELECT * FROM `login` WHERE `uname` = '$uname' AND `pword` ='$pword'";
	$res = mysqli_query($mysqli,$q);
	if($res)
	{
		$arr = mysqli_fetch_array($res);
		$c = mysqli_num_rows($res);
		if($c==1)
		{
			session_start();
			$_SESSION["id"]=$uname;
			if($uname=="skk@gravitas15"||$uname=="naiju@gravitas15"||$uname=="preetika@gravitas15")
				echo 2;
			else
				echo 1;
		}
		else
		{
			echo 0;
		}
	}
	else
		echo 0;
		
?>