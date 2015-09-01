<?php
$mysqli=new mysqli("localhost","root","","finance");
if(mysqli_connect_errno())
	{
		printf("Connection failed %s",mysqli_connect_error());
		exit();
	}
?>