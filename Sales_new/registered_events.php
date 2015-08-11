<?php
if(isset($_SESSION["regno"]))
{
	require("sql_con.php");
	$i=1;
	$regno = $_POST["regno"];
	$q = "SELECT * FROM `sales_order` WHERE `regno` = '$regno'";
	$r = mysqli_query($mysqli,$q);
	echo "<TABLE class='striped'><TR><TH>Category</TH><TH>Size</TH></TR>";
	while($t=mysqli_fetch_array($r))
	{
		$name = $t1["name"];
		$t_1=$t1['t_1'];
		$t_2=$t1['t_2'];
		$c_1=$t1['c_1'];
		$c_2=$t1['c_2'];
		$c_3=$t1['c_3'];
		if($t_1!=0)
		{
			$size_t_1=$t1['size_t_1'];
			echo "<TR><TD>Round Neck</TD><TD>$size_t_1</TD></TR>";
		}
		if($t_2!=0)
		{
			$size_t_2=$t1['size_t_2'];
			echo "<TR><TD>Polo T-Shirt</TD><TD>$size_t_2</TD></TR>";
		}
		if($t_2!=0)
		{
			$size_t_2=$t1['size_t_2'];
			echo "<TR><TD>Polo T-Shirt</TD><TD>$size_t_2</TD></TR>";
		}
		if($c_1!=0)
		{
			$size_c_1_t_1=$t1['size_c_1_t_1'];
			$size_c_1_t_2=$t1['size_c_1_t_2'];
			
			echo "<TR><TD>Combo 1:</TD></TR>
				  <TR><TD>Round Neck</TD><TD>$size_c_1_t_1</TD></TR>
				  <TR><TD>Polo T-Shirt</TD><TD>$size_c_1_t_2</TD></TR>";
		}
		if($c_2!=0)
		{
			$size_c_2_t_1=$t1['size_c_2_t_1'];
			echo "<TR><TD>Combo 2:</TD></TR>
				  <TR><TD>Round Neck</TD><TD>$size_c_1_t_1</TD></TR>
				  <TR><TD>Workshops</TD><TD>10</TD></TR>
				  ";
		}
		if($c_3!=0)
		{
			$size_c_3_t_1=$t1['size_c_3_t_1'];
			$size_c_3_t_2=$t1['size_c_3_t_2'];
			
			echo "<TR><TD>Combo 3:</TD></TR>
				  <TR><TD>Round Neck</TD><TD>$size_c_3_t_1</TD></TR>
				  <TR><TD>Polo T-Shirt</TD><TD>$size_c_3_t_2</TD></TR>
				  <TR><TD>Workshops</TD><TD>10</TD></TR>
				  <TR><TD>Events</TD><TD>All</TD></TR>
				  ";
		}
				
	}
	echo"</TABLE>";
}
else
	require("logout.php");
?>