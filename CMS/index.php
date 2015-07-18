 <?php
if(isset($_POST["login"]))
{
	require("../sql_con.php");
	$uname=$_POST["regno"];
	$pword=$_POST["pword"];
	$stmt = $mysqli->prepare("SELECT * FROM `login_cms` WHERE `regno`=?  AND `password`=?");
	$stmt->bind_param("ss", $uname, $pword);	
	$uname_db="";
	$pword_db="";
	if($stmt->execute())
	{
		if($rs = $stmt->get_result())
		{
			$count = mysqli_num_rows($rs);
			while ($arr = mysqli_fetch_array($rs)) 
			{
				$uname_db = $arr["regno"];
				$pword_db = $arr["password"];	
			}
			if(($count==1&&$uname!=""&&$pword!=""&&strcmp($uname,$uname_db)==0)&&(strcmp($pword,$pword_db)==0))
			{
				session_start();
				$_SESSION["regno"]=$uname;
				header("location:home.php");
			}
			else
			{
				echo 'Incorrect User Name/Password';
			}
		}
		else
			echo"Result set not fetched mysqli_error()";
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
  <style  type="text/css">
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
   body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
      
  </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  
  </head>
<body>
  <main>
  <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
    <img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
    <h4 class="header light white-text">Registration CMS</h4>
  </header>
    <form action='<?php echo $_SERVER["PHP_SELF"];?>'  method="POST">
  <label for="regno">Registration Number</label>
<input type="text" id="regno" name="regno" autocomplete="off">
  
      <label for="pword">Password</label>
<input type="password" id="pword" name="pword" autocomplete="off" >

<button id="login" name="login" id="login" class="btn waves-effect waves-light indigo darken-4">
  <i class="material-icons right">send</i>  Login
  </button>
  </form>
</main>
<footer class="page-footer indigo darken-2">
          <div class="footer-copyright">
            <div class="container">
            © COPYRIGHT GRAVITAS 2015
            </div>
          </div>
        </footer>
</body>
</html>
