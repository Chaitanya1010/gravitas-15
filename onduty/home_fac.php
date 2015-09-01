<?php
session_start();
if(isset($_SESSION["id"]))
{
	$uname = $_SESSION["id"];
	$committee = substr($uname,"0","-11");
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
 	<style type="text/css">
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
	      /* label focus color */
	   .input-field input[type=time]:focus + label 
	   {
	   		color: #1a237e;
	   }
	   /* label underline focus color */
	   .input-field input[type=time]:focus 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label underline color */
	   .input-field input[type=time] 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	      /* label focus color */
	   .input-field textarea:focus + label 
	   {
	   		color: #1a237e;
	   }
	   /* label underline focus color */
	   .input-field textarea:focus 
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	    /* label underline color */
	   .input-field textarea
	   {
	    	border-bottom: 1px solid #1a237e;
	    	box-shadow: 0 1px 0 0 #1a237e;
	   }
	</style>
	<script type="text/javascript">
	function approve(id)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("all").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","approve.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+id);
	}
	</script>
	</head>
<body>
	<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
		<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
		<h4 class="header light white-text"> Organizers OnDuty - <?php echo ucfirst($committee)?></h4>
		<a class="indigo darken-1 btn waves-effect z-depth-3 right"   title="Logout" href="logout.php">
			<i class="material-icons">power_settings_new</i>
		</a>
		<br/>
	</header>
	<main>
	<div class="container"><br/>
	<div id="all">
	<?php 
	if($committee=="skk")
	{
	?>
		<a class="indigo darken-1 btn waves-effect z-depth-3 center"   title="Excel Download" href="excel_od.php">
				Download
			</a>
	<?php
	}
	?>
	<TABLE class="striped hoverable">
	<TR><TH>S.No</TH><TH>Name</TH><TH>Regno</TH><TH>Work</TH><TH>Date</TH><TH>From Time</TH><TH>To Time</TH><TH>Committee</TH><TH>Approve</TH></TR>
	<?php
			require("sql_con.php");
			$f=0;
			$q=0;
			if($committee=="skk")
				$q = "SELECT * FROM `od_list` WHERE `preetika` ='1' AND `naiju` = '1' AND `skk`='0' AND `dsw`='0'";
			else if($committee=="naiju")
				$q = "SELECT * FROM `od_list` WHERE `preetika` ='1' AND `naiju` = '0' AND `skk`='0' AND `dsw`='0'";
			else if($committee=="preetika")
				$q = "SELECT * FROM `od_list` WHERE `preetika` ='0' AND `naiju` = '0' AND `skk`='0' AND `dsw`='0'";
			$res = mysqli_query($mysqli,$q);
			if(mysqli_num_rows($res)!=0)
			{
				while($arr = mysqli_fetch_array($res))
				{
					$f++;
					echo '<tr><td>'.$f.'</td><td>'.$arr["name"].'</td><td>'.$arr["regno"].'</td><td>'.$arr["work_done"].'</td><td>'.$arr["od_date"].'</td><td>'.$arr["from_time"].'</td><td>'.$arr["to_time"].'</td><td>'.$arr["committee"].'</td><td><button id='.$arr["id"].' class="green darken-3 btn-floating z-depth-1" onclick="approve(this.id)"><i class="material-icons">done</i></button></td></tr>';
				}
			}
			else
				echo "<tr><td>No data</td></tr>";
	?>

	</TABLE>
	</div>
	</div>
	</main>
	<footer class="page-footer indigo darken-4">
		<div class="footer-copyright">
			<div class="container center-align">
				© COPYRIGHT GRAVITAS 2015
			</div>
		</div>
	</footer>
</body>
</html>
<?php
}
else
	header("Location:logout.php");
?>