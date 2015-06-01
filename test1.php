<?php
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,"https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"id_trans=1&id_event=07&amt_event=0.5&id_merchant=1006&id_password=g6v!ta$1516_V&id_name=GRAVITAS-2015&rturl=https://localhost/gravitas-15/test");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //Needs to be included if no *.crt is available to verify SSL certificates
$result = curl_exec ($ch); 
curl_close ($ch);
?>