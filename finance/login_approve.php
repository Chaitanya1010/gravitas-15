<?php
	session_start();
	require 'sql_con.php';
	if(isset($_SESSION['name_fin']))
	{
		$mode=$_SESSION['mode'];
		if($mode==0)
		{
			header('Location:index.php');
		}

		else if(($mode==1)||($mode==2)||($mode==3))
		{
			header('Location:approve_home_1.php');
		}

		else if($mode==55)
		{
			header('Location:approve_expenses.php');
		}
	}
	else if(isset($_POST['admin_login']))
	{
		if(isset($_POST['name'])&&$_POST['pass'])
		{
			$name=$_POST['name'];
			$pass=$_POST['pass'];
			$sql_login="SELECT * FROM `admin_login` WHERE name='$name' and pass='$pass';";
			$res_login=mysqli_query($mysqli,$sql_login);
			if(mysqli_num_rows($res_login)>0)
			{
				while($arr=mysqli_fetch_array($res_login))
					$mode=$arr['mode'];

				$_SESSION['name_fin']=$name;
				$_SESSION['mode']=$mode;

				if($mode==0)
				{
					header('Location:index.php');
				}

				else if($mode==55)
				{
					header('Location:approve_expenses.php');
				}

				else
				{
					header('Location:approve_home_1.php');
				}

			}
			else
			{
				echo "Sorry..Either wrong username or password!</br>";
				echo "<a href='login_approve.php'>Click here to login</login>";
			}

		}
	}
	else
	{
		?>
		<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>GraVITas'15</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
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
			.input-field input[type=password]:focus + label {
				color: #303f9f;
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

		</head>
	<body>
		<main>
		<header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
			<img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
			<h4 class="header light white-text">Finance Portal</h4>
		</header>
		<br /><br />
		<div class='container'>
	    <div class='card'>
	      <div class='card-content'>
		<form action=""  method='POST'>
			<div class='input-field col s12'>
				<label for='name'>Enter Name</label>
			<input type='text' name='name' id='name'/>
		</div>
		<div class='input-field col s12'>
			<label for='pass'>Password</label>
			<input type='password' name='pass' id='pass' />
		</div>
			<button type="submit"  name="admin_login" onclick="return submit_login()" class="btn waves-effect waves-light indigo darken-4">
			  <i class="material-icons right">send</i>  Login
			  </button>
<br /><br />
		</form>
	</div>
</div>
</div>
</main>
	<footer class="page-footer indigo darken-4">
  <div class="footer-copyright">
    <div class="container">
     © COPYRIGHT GRAVITAS 2015
       <a class='modal-trigger white-text right' href='#credits'>Meet the developers</a>
      </div>
  </div>
</footer>
<div id="credits" class="modal">
  <div class="modal-content" style='padding:0'>
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-image">
            <img src="credits.jpg">
            <span class="card-title">Developers</span>
          </div>
          <div class="card-content" style='padding:0'>
            <div class='row'>
              <div class='col s6'>
              <h5 class='header light'><a href="https://in.linkedin.com/pub/chaitanya-tetali/86/763/aa2" target='_blank'>Tetali Chaitanya</a></h5>
                Back End
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://www.linkedin.com/in/rajalakshmisenthil" target='_blank'>Rajalakshmi Senthil</a></h5>
                Back End
              </div>
              <div class='col s6'>
                <h5 class='header light'><a href="https://in.linkedin.com/in/shubhodeep9" target='_blank'>Shubhodeep Mukherjee</a></h5>
                Front End
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
	</body>
	</html>
		<?php
	}
?>
<style>

.modal { max-height: 90%; max-width:90%; }
</style>
<script>
$(document).ready(function(){
// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal-trigger').leanModal();
});
</script>
<script type="text/javascript">

function submit_login()
{
	var name=document.getElementById('name').value;
	var pass=document.getElementById('pass').value;
	if(name=='' || pass=='')
	{
		alert("Please fill all the details");
		return false;
	}
	return true;
}

</script>