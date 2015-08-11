<?php
	session_start();
	if((isset($_SESSION["regno"]))&&(isset($_REQUEST['numb'])))
	{
		require("sql_con.php");		
	?>
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
	  <style>
	   /* label color */
	   .input-field label {
	     color: #1a237e;
	   }
	   /* label focus color */
	   .input-field input[type=text]:focus + label {
	     color: #303f9f;
	   }
	    /* label underline focus color */
	   .input-field input[type=text] {
	     border-bottom: 1px solid #1a237e;
	     box-shadow: 0 1px 0 0 #1a237e;
	   }
	   /* label underline focus color */
	   .input-field input[type=text]:focus {
	     border-bottom: 1px solid #303f9f;
	     box-shadow: 0 1px 0 0 #303f9f;
	   }
	    /* label underline focus color */
	   .input-field input[type=password] {
	     border-bottom: 1px solid #1a237e;
	     box-shadow: 0 1px 0 0 #1a237e;
	   }
	   /* label underline focus color */
	   .input-field input[type=password]:focus {
	     border-bottom: 1px solid #303f9f;
	     box-shadow: 0 1px 0 0 #303f9f;
	   }
	   body {
	    display: flex;
	    min-height: 100vh;
	    flex-direction: column;
	  }

	  main {
	    flex: 1 0 auto;
	  }
	  </style>

	</head>

		 <div class="container row">
			<div class="col s12">
				<div class="input-field col s5">
					<input type='text' id ='id_search' autocomplete ='off' onkeyup='search_person()' class='evesearch'><label for="id_search">Search By Registration Number..</label>
				</div>&nbsp;
				<ul class="collapsible popout col s6" style="float:right" data-collapsible="accordion">
				</ul>
			</div>
		</div>
		<div id='search_results'></div>
<?php
}
else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))))
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:index.php");
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