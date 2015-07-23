<?php
session_start();
//Login automatically if a session already exists
if(isset($_SESSION["id"]))
{
	require("sql_con.php");
	$regno = $_SESSION["regno"];
	$stmt = $mysqli->prepare("SELECT * FROM `external_participants` WHERE `regno`=?");
	$stmt->bind_param("s", $regno);
	$uname_db="";
	$pword_db="";
	$regno_db="";
	if($stmt->execute())
	{
		if($rs = $stmt->get_result())
		{
			$count = mysqli_num_rows($rs);
			while ($arr = mysqli_fetch_array($rs))
			{
				$regno_db  = $arr["regno"];
			}
			if($count==1)
			{
				$_SESSION["id"]=$regno_db;
				header("location:event_list.php");
			}
			else
			{
				echo "OH! Snap!! Login Again! Session Expired!";
			}
		}
		else
			echo"Result set not fetched mysqli_error()";
	}
	else
		echo "Query not executed mysqli_error()";
	mysqli_close($mysqli);
}
if(isset($_POST["login"]))
{
	require("sql_con.php");
	$uname=$_POST["uname_id"];
	$pword=$_POST["pword_id"];
	$stmt = $mysqli->prepare("SELECT * FROM `external_participants` WHERE `email`=?  AND `pword`=?");
	$stmt->bind_param("ss", $uname, $pword);
	$uname_db="";
	$pword_db="";
	$regno_db="";
	if($stmt->execute())
	{
		if($rs = $stmt->get_result())
		{
			$count = mysqli_num_rows($rs);
			while ($arr = mysqli_fetch_array($rs))
			{
				$uname_db = $arr["email"];
				$pword_db = $arr["pword"];
				$regno_db  = $arr["regno"];
			}
			if(($count==1&&$uname!=""&&$pword!=""&&strcmp($uname,$uname_db)==0)&&(strcmp($pword,$pword_db)==0))
			{

				$_SESSION["id"]=$regno_db;
				header("location:event_list.php");
			}
			else
			{
				echo "Incorrect User Name/Password";
			}
		}
		else
			echo"Result set not fetched mysqli_error()";
	}
	else
		echo "Query not executed mysqli_error()";
	mysqli_close($mysqli);
}
//forgot_password
else if(isset($_POST["forget_password"]))
{
	require("sql_con.php");

	$email_f = $_POST["email_forgot"];
	$regno_f = $_POST["regno_forgot"];

	$regno_db="";
	$email_db="";

	$stmt = $mysqli->prepare("SELECT * FROM `external_participants` WHERE `email`=? AND `regno`=? ");
	$stmt->bind_param("ss", $email_f,$regno_f);
	if($stmt->execute())
	{
		if($rs = $stmt->get_result())
		{
			$count = mysqli_num_rows($rs);
			while ($arr = mysqli_fetch_array($rs))
			{
				$email_db =  $arr["email"];
				$regno_db = $arr["regno"];
			}
			if($count==1&&$email_f!=""&&$regno_f!="")
			{
				require("generate_hash.php");
				$ResultStr = generateHash();
				$stmt = $mysqli->prepare("UPDATE `external_participants` SET `pword`= ? WHERE `email`=? AND `regno` =?");
				$stmt->bind_param("sss", $ResultStr, $email_db, $regno_db);
				if($stmt->execute())
				{
					date_default_timezone_set('Asia/Calcutta');
					require 'mail/PHPMailerAutoload.php';
					//Create a new PHPMailer instance
					$mail = new PHPMailer();
							$to= $email_db;
							$subject= "GraVITas 2015 | Password Reset" ;
							require("mail_fp.php");
							echo $to;
							//Tell PHPMailer to use SMTP
							$mail->isSMTP();

							//Enable SMTP debugging
							$mail->SMTPDebug = 0;
							$mail->Host = 'smtp.gmail.com';
							$mail->IsHTML(true);

							//Set the SMTP port number - 465 for authenticated TLS, a.k.a. RFC4409 SMTP submission
							$mail->Port =  587;

							//Set the encryption system to use - ssl (deprecated) or tls
							$mail->SMTPSecure = 'tls';

							//Whether to use SMTP authentication
							$mail->SMTPAuth = true;

							//Username to use for SMTP authentication - use full email address for gmail
							$mail->Username = "noreply.vitgravitas@gmail.com";

							//Password to use for SMTP authentication
							$mail->Password = "Gravitas15";

							//Set who the message is to be sent from
							$mail->setFrom('noreply.vitgravitas@gmail.com', 'GraVITas 2015');

							//Set an alternative reply-to address
							$mail->addReplyTo('noreply.vitgravitas@gmail.com', 'GraVITas 2015');

							//Set who the message is to be sent to
							$mail->addAddress($to, $to);

							//Set the subject line
							$mail->Subject = $subject;

							//Replace the plain text body with one created manually
							$mail->Body = $message;

							//send the message, check for errors
							if (!$mail->send())
							{
								echo "Mailer Error: " . $mail->ErrorInfo;
							}
							else
							{
								echo "Message sent! Check your mail for resetting your password";
							}

				}
				else
				{
					echo "Error in inserting the data into forget_passwords";
				}
			}
		}
	}
	mysqli_close($mysqli);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>GraVITas'15</title>
 <meta http-equiv="content-type" content="text/html;charset=UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
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
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
 <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

 </head>
<body>
 <main>
 <header class="header indigo darken-4 z-depth-1" style="text-align:center;padding-top:0.3em;padding-bottom:0.02em">
	 <img src="../gravitaslogo.png" alt class="responsive-img" width="350px">
	 <h4 class="header light white-text">External Registration</h4>
 </header><br />
 <div class='container'>
	 <div class='col s12'>
		 <ul class='tabs'>
			 <li class='tab col s6'><a href='#log' >Login</a></li>
			 <li class='tab col s6'><a href='#fgpwd' >Forgot Password</a></li>
		 </ul>
	 </div>
<div id='log' class='card'>
 <FORM action='<?php echo $_SERVER["PHP_SELF"];?>' class='card-content' method="POST">
	 <div class='input-field'><label for="uname_id">Username</label>
 <input name="uname_id" id="uname_id" type="text" autocomplete="off">
 </div>
 <div class='input-field'>
       <label for="pword_id">Password</label>
 <input id="pword_id" name="pword_id" type="password" autocomplete="off">
 </div>
 <button id="login" name="login" type='submit' class="btn waves-effect waves-light indigo darken-4 right">
   <i class="material-icons right">send</i>  Login
 </button><br /><br />
</FORM>
</div>
<div id='fgpwd' class='card'>
 <FORM action='<?php echo $_SERVER["PHP_SELF"];?>' class='card-content' method="POST">
	 <div class='input-field'><label for="email_forgot">Email</label>
 <input name="email_forgot" id="email_forgot" type="text" autocomplete="off">
 </div>
 <div class='input-field'>
       <label for="regno_forgot">Registration Number</label>
 <input id="regno_forgot" name="regno_forgot" type="text" autocomplete="off">
 </div>
 <button type="submit" name="forget_password" id="forget_password" class="btn waves-effect waves-light indigo darken-4 right">
   <i class="material-icons right">send</i>  Forget Password
 </button><br /><br />
 </FORM>
 </div>
<a href="external_reg.php"><h5>New User?</h5></a>
</div>
</BODY>
