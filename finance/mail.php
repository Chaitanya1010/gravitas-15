<?php

$to="";
$subject= "" ;
$message="";
$loc="excel.xls"; 

	$data = "name\tchaitanya\tis\ta\tnut";
	file_put_contents("excel.xls",$data);
	print "$data";


	date_default_timezone_set('Asia/Calcutta');
	require 'mail/PHPMailerAutoload.php';
			
	//Create a new PHPMailer instance
	$mail = new PHPMailer();
if($mail->smtpConnect())
{
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->IsHTML(true);
	$mail->addAttachment($loc); 

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
		echo "<div class='msg'>Oh Snap!! Mailer Error!!</div>";
	}
	else
	{
		echo "<div class='msg'>Yahooo! Check your mail!!</div>";
	}
}
unlink($loc);
?>