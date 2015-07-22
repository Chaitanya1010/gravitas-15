<?php
session_start();
//Login automatically if a session already exists
if(isset($_SESSION["regno"]))
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
				$_SESSION["regno"]=$regno_db;
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
	$pword=md5($_POST["pword_id"]);
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

				$_SESSION["regno"]=$regno_db;
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
	
	echo"1";
	$stmt = $mysqli->prepare("SELECT * FROM `external_participants` WHERE `email`=? AND `regno`=? ");
	$stmt->bind_param("ss", $email_f,$regno_f);	
	if($stmt->execute())
	{
		echo ";";
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
<HTML>
 <HEAD>
 </HEAD>
 <BODY>
 <FORM action='<?php echo $_SERVER["PHP_SELF"];?>'  method="POST">
  <input name="uname_id" id="uname_id" type="text" autocomplete="off">
  <label for="uname_id">Username</label>
  <input id="pword_id" name="pword_id" type="password" autocomplete="off">
  <label for="pword_id">Password</label>
  <button  type="submit" name="login" id="login">Login</button>
</FORM>
 <FORM action='<?php echo $_SERVER["PHP_SELF"];?>'  method="POST">
   <input name="email_forgot" id="email_forgot" type="text" autocomplete="off">
  <label for="email_forgot">Email</label>
  <input id="regno_forgot" name="regno_forgot" type="text" autocomplete="off">
  <label for="regno_forgot">Registration Number</label>
 <button  type="submit" name="forget_password" id="forget_password">Forget Password</button>
 </FORM>
<a href="external_reg.php">New User?</a>
</BODY>