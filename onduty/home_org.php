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
	function post()
	{
		var regno = document.getElementById("regno").value;
		var name = document.getElementById("name").value;
		var work = document.getElementById("work").value;
		var date = document.getElementById("od_date").value;
		var from_time = document.getElementById("from_time").value;
		var to_time = document.getElementById("to_time").value;
		var school = document.getElementById("school").value;
		var year = document.getElementById("year").value;
		var pattern = '^[1-9]{2}[a-zA-Z]{3}[0-9]{4}$';
		if(regno==""||name==""||work==""||date==""||from_time==""||to_time==""||school==""||year==""||!regno.match(pattern))
		{
			Materialize.toast("Enter Correct Details!",3000,'rounded');
			return false;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("regno").value="";
				document.getElementById("name").value="";
				document.getElementById("work").value="";
				if(xmlhttp.responseText==0)	
					Materialize.toast("Voila!! Successfully Added!!", 3000, 'rounded');
				else
					Materialize.toast(xmlhttp.responseText+"Oh Snap!! Something fishy, try again!!", 3000, 'rounded');
			}
		}
		xmlhttp.open("POST","post.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("regno="+regno+"&name="+name+"&work="+work+"&date="+date+"&from_time="+from_time+"&to_time="+to_time+"&school="+school+"&year="+year);
	}
	</script>
</head>
<body>
	<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
		<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
		<h4 class="header light white-text"> Organizers OnDuty - <?php echo ucfirst($committee)?> Committee </h4>
		<a class="indigo darken-1 btn waves-effect z-depth-3 right"   title="Logout" href="logout.php">
			<i class="material-icons">power_settings_new</i>
		</a>
		<br/>
	</header>
	<main>
		<br/>
		<div id="all">
		<div class='container'>
			<div class='col s6 indigo darken-2'>
				<ul class='tabs indigo darken-1 z-depth-1'>
					<li class='tab col s3  white-text'><a href='#sub' class="white-text waves-effect waves-light" >Submit OD</a></li>
					<li class='tab col s3  white-text'><a href='#list'  class="white-text waves-effect waves-light">OD Status</a></li>
				</ul>
			</div>
			<div id="sub">
			<div class="card">
    		<div class="card-content">
      			<div class="row">
      				<div class="input-field col s12">
						<Label for="regno">Regno:</Label> <input type="text" name="regno" id="regno" autocomplete="off">
					</div>
				</div>
				<div class="row">
		        	<div class="input-field col s12">
		        		<Label for="name">Name:</Label> <input type="text" name="name" id="name" autocomplete="off">
		        	</div>
		        </div>
				<div class="row indigo-text">
					<div class="input-field col s12">School:
						<select id="school" name="school">
						<option value="sas">SAS</option>
						<option value="site" selected>SITE</option>
						<option value="ssl">SCSE</option>
						<option value="ssl">SSL</option>
						<option value="select">SELECT</option>
						<option value="sense">SENSE</option>
						<option value="vitbs">VITBS</option>
						<option value="smbs">SMBS</option>
						<option value="sbst">SBST</option>
						<option value="tifac">TIFAC</option>
						</select>
					</div>
				</div>
				<div class="row indigo-text">
		        	<div class="input-field col s12">Date: 
		        		<input type="date" name="od_date" id="od_date" class="datepicker">
		        	</div>
		        </div>
				<div class="row indigo-text">
		        	<div class="input-field col s12">From time: 
		        		<input type="time" name="from_time" id="from_time" value="08:00:00">
		        	</div>
		        </div>
				<div class="row indigo-text">
		        	<div class="input-field col s12">To Time: 
		        		<input type="time" name="to_time" id="to_time" value="18:00:00">
		        	</div>
		        </div>
				<div class="row indigo-text">
		        	<div class="input-field col s12">Year:
		        		<select id="year" name="year">
						<option value="1">I</option>
						<option value="2">II</option>
						<option value="3">III</option>
						<option value="4" selected>IV</option>
						<option value="5">V</option>
						</select>
					</div>
				</div>
		 		<div class="row">
		        	<div class="input-field col s12">
		        		<Label for="work">Work Done:</Label>
		        		<textarea name="work" id="work" class="materialize-textarea"></textarea>
		        	</div>
		        </div>
		        <div class="row">
		        	<div class="input-field col s12">
						<button id="login" name="login" type='submit' class="btn waves-effect waves-light indigo darken-2 left" onclick="post()">
				   				<i class="material-icons right">send</i>Post
				 		</button>
					</div>
				</div>
			</div>
		</div>
		</div>
		
		<div id="list"><br/><br/>
		<TABLE class="striped hoverable">
		<TR><TH>S.No</TH><TH>Name</TH><th>Regno</th><th>Date</th><th>Status</th></TR>
		<?php
			require("sql_con.php");
			$f=0;
			$q = "SELECT * FROM `od_list` WHERE `committee` ='$committee'";
			$res = mysqli_query($mysqli,$q);
			
			if(mysqli_num_rows($res)!=0)
			{
				while($arr = mysqli_fetch_array($res))
				{
					$status="";
					if($arr["dsw"]=="1")
						$status = "DSW";
					else if($arr["skk"]=="1")
						$status = "Prof. Karthikeyan";
					else if($arr["naiju"]=="1")
						$status = "Prof. Naiju";
					else if($arr["preetika"]=="1")
						$status = "Prof. Preetika";
					else 
						$status = "--NULL--";
					$f++;
					echo '<tr><td>'.$f.'</td><td>'.$arr["name"].'</td><td>'.$arr["regno"].'</td><td>'.$arr["od_date"].'</td><td>'.$status.'</td></tr>';
				}
			}
			else
				echo "<tr><td>No data</td></tr>";
		?>
		</TABLE>
		</div><br/>
		
		</div>
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
<script>
  $(document).ready(function() {
    $('select').material_select();
  });
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
</script>
<?php
}
else
	header("Location:logout.php");
?>