<?php
require("sql_con.php");
$name=$_POST["name"];
$regno = $_POST["regno"];
$gen= $_POST["gen"];
$college=$_POST["college"];
$ph=$_POST["ph"];
$email=$_POST["email"];
$clgref=$_POST["clgref"];
$vitref=$_POST["vitref"];

require("generate_hash.php");
$ResultStr = generateHash();
$q ="INSERT INTO `external_participants` (`name`, `regno`, `gender`, `college`, `phno`, `email`, `vitref`, `clgref`,`acc_details`,`pword`) VALUES ('$name', '$regno', '$gen', '$college', '$ph', '$email', '$vitref', '$clgref','0','$ResultStr');";
$res = mysqli_query($mysqli,$q);
if($res==true)
{
	if($mail->smtpConnect())
	{
	date_default_timezone_set('Asia/Calcutta');
	require 'mail/PHPMailerAutoload.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer();
	$to= $email;
	$subject= "GraVITas 2015 | User Authentication" ;
		
	require("mail_nu.php");

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->IsHTML(true);
	$mail->AddEmbeddedImage('../gravitaslogo.png', 'logo');
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
		//revert back
		$q ="DELETE FROM `external_participants` WHERE `email` ='$email' AND `regno` ='$regno'";
		mysqli_query($mysqli,$q);
		echo $mail->ErrorInfo;
		echo 2;
	}
	else
	{
		echo 1;
	}
}
}
else
	echo 0;

?>