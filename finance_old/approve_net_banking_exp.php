<?php
	session_start();
	if((isset($_SESSION['name_fin']))&&(isset($_REQUEST['id'])))//session_variable verification
	{
		require('sql_con.php');
		$id=$_REQUEST['id'];

		$mode=$_SESSION['mode'];

		?>
		<script>
		$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15
		});
		</script>
		<?php
		echo "
			<h5>NET Banking approval</h5>";
		
		echo"<button class='btn waves-effect waves white indigo-text darken-4' onclick='download_net_excel_exp(this.id,".$id.")' id='1'>Excel Download for All</button><br/>";

		echo "<div id='search_results_spon_net_exp'>";

		echo "</div>";
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
