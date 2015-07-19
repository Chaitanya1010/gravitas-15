<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require 'sql_con.php';
	$q = "SELECT * FROM `events`";
	$res = mysqli_query($mysqli,$q);
	echo"<input type='text' id='search_events' name='search_events' onkeyup='search_events(this.value)' placeholder='Search Event...'>";
	echo "<DIV ID='event_table'>";
	echo"<TABLE><TR><TH>ID</TH><TH>Name</TH><TH>Price</TH><TH>Total Seats (Internals)</TH><TH>Filled seats (Internals)</TH><TH>Total Seats (Externals)</TH><TH>Filled seats (Externals)</TH><TH>Team</TH><TH>Min</TH><TH>Max</TH><TH>Category</TH><TH>Download</TH></TR>";
	while($arr = mysqli_fetch_array($res))
	{
		$cat ="";
		$t ="";
		$min="";
		$max="";
		switch($arr[10])
		{
			case 0: $cat ="Premium";
				break;
			case 1: $cat ="Workshop";
				break;
			case 2: $cat ="Technical";
				break;
			case 3: $cat ="Management";
				break;
			case 4: $cat ="Informal";
				break;
			case 5: $cat ="Combos";
				break;
		}
		if($arr[7]==0)
			$t = "Variable";
		else
			$t=$arr[7];
		if($arr[8]==0)
			$min = "N/A";
		else
			$min = $arr[8];
		if($arr[9]==0)
			$max = "N/A";
		else
			$max=$arr[9];
		echo "<TR><TD>$arr[0]</TD><TD>$arr[1]</TD><TD>$arr[2]</TD><TD>$arr[3]</TD><TD>$arr[4]</TD><TD>$arr[5]</TD><TD>$arr[6]</TD><TD>$t</TD><TD>$min</TD><TD>$max</TD><TD>$cat</TD>
		<TD><button id='$arr[0]' name ='$arr[0]' onclick='excel_eventlist(this.id)'>Download</button></TD></TR>";
	}
	echo"</TABLE>
	</div>";
}
else
{
	require 'logout.php';
}
	