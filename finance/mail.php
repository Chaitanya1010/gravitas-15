<?php
	$to="tetali.chaitanya@gmail.com";
	$to_1="tetalisaikrishna.chaitanya2013@vit.ac.in";
	$subject= "Approval confirmation";
	$message=$data;//regarding the present transaction.
	//$loc="excel.xls"; 

	//$data_1 = "$mode_revenue/t$mode_payement/t$id";
	//file_put_contents("excel.xls",$data_1);
	//print "$data_1";

	date_default_timezone_set('Asia/Calcutta');
								
	require 'mail/PHPMailerAutoload.php';

	//Create a new PHPMailer instance
	$mail_er = new PHPMailer();
	if($mail_er->smtpConnect())
	{
		//echo " Im in mail";	
		//Tell PHPMailer to use SMTP
		$mail_er->isSMTP();

		//Enable SMTP debugging
		$mail_er->SMTPDebug = 0;
		$mail_er->Host = 'smtp.gmail.com';
		$mail_er->IsHTML(true);
		$mail_er->addAttachment($loc); 

		//Set the SMTP port number - 465 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail_er->Port =  587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail_er->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail_er->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail_er->Username = "noreply.vitgravitas@gmail.com";

		//Password to use for SMTP authentication
		$mail_er->Password = "Sherlok123";

		//Set who the message is to be sent from
		$mail_er->setFrom('noreply.vitgravitas@gmail.com', 'GraVITas 2015');

		//Set an alternative reply-to address
		$mail_er->addReplyTo('noreply.vitgravitas@gmail.com', 'GraVITas 2015');

		//Set who the message is to be sent to
		$mail_er->addAddress($to, $to);
		$mail_er->addAddress($to_1, $to_1);
					
		//Set the subject line
		$mail_er->Subject = $subject;

		//Replace the plain text body with one created manually
		$mail_er->Body = $message;

		//send the message, check for errors
		if (!$mail_er->send())
		{
			echo "<div class='msg'>Oh Snap!! Mailer Error!  ".$mail_er->ErrorInfo."!</div>";
		}
		else
		{
			echo "<div class='msg'>Yahooo! Check your mail!!</div>";
		}
	}
	//unlink($loc);
?>