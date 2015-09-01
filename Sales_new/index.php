<?php
session_start();
if(isset($_SESSION["regno"]))
{
    header("Location:event_list.php");
}
if(isset($_POST["login"]))
{
	require("sql_con.php");
	$uname=$_POST["regno"];
	$pword=$_POST["pword"];

	$stmt = "SELECT * FROM `login_sales` WHERE `regno`='$uname'  AND `password`='$pword'";
	$uname_db="";
	$pword_db="";
    $rs = mysqli_query($mysqli,$stmt);
	if($rs)
	{
		$count = mysqli_num_rows($rs);
		while ($arr = mysqli_fetch_array($rs))
		{
			$uname_db = $arr["regno"];
			$pword_db = $arr["password"];
		}
		if(($count==1&&$uname!=""&&$pword!=""&&strcmp($uname,$uname_db)==0)&&(strcmp($pword,$pword_db)==0))
		{
			$_SESSION["regno"]=$uname;
			
			header("Location:event_list.php");
		}
		else
		{
			echo "<div class='msg'>Incorrect User Name/Password</div>";
		}
	}
	else
		echo "Query not executed mysqli_error()";

mysqli_close($mysqli);
}
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
     .msg
     {
      background: #e53935;
      color: #ffffff;
      position: absolute;
        left: 400px;
        bottom: 110px;
        padding: 2px 7px;
        border-radius: 25px;
     }
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
  </style>
  </head>
<body>
  <main>
  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
    <img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
    <h4 class="header light white-text">Sales Registration</h4>
  </header>
  <br /><br />
  <div class='container'>
    <div class='card'>
      <div class='card-content'>
    <form action='<?php echo $_SERVER["PHP_SELF"];?>'  method="POST">
  <div class='input-field'><label for="regno">Registration Number</label>
<input type="text" id="regno" name="regno" autocomplete="off" maxlength="9">
</div>
<div class='input-field'>
      <label for="pword">Password</label>
<input type="password" id="pword" name="pword" autocomplete="off" >
</div>
<button id="login" name="login" id="login" class="btn waves-effect waves-light indigo darken-4">
  <i class="material-icons right">send</i>  Login
  </button>
  </form>
</div>
</div>
</div>
</main>
<footer class="page-footer indigo darken-4">
  <div class="footer-copyright">
    <div class="container">
      © COPYRIGHT GRAVITAS 2015
      <a class='modal-trigger right white-text' href='#credits'>Developers</a>
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
<style>

.modal { max-height: 90%; max-width:90%; }
</style>
<script>
$(document).ready(function(){
// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('.modal-trigger').leanModal();
});
</script>

</body>
</html>