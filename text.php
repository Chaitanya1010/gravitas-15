<?php
$paypal_url='https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp'; 
$id=2;
?>
<html>
<body>
<h4>Welcome, Guest</h4>
<div class="product">            
    <div class="name">
        PHPGang Payment
    </div>
    <div class="btn">
    <form action="<?php echo $paypal_url; ?>" method="post">
    <input type="hidden" name="id_trans" value="<?php echo $id; ?>">
    <input type="hidden" name="id_event" value="07">
    <input type="hidden" name="amt_event" value="1">
    <input type= "hidden" name="item_number" value="1">
    <input type="hidden" name="id_merchant" value="1006">
    <input type="hidden" name="id_password" value="g6v!ta$1516_V">
    <input type="hidden" name="id_name" value="GRAVITAS-2015">
    <input type="hidden" name="rturl" value="https://www.vit.ac.in">
	shankar.kr@vit.ac.in 
	
	<input type="submit" value="submit">
    </form> 
    </div>
</div>
</body>
</html>