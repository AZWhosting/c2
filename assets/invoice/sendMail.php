<?php
	$MSG = $_REQUEST['msg'];
	$DS = $_REQUEST['datesend'];
	$cURL = $_REQUEST['cURL'];
	$uName = $_REQUEST['uName'];
		
	/*----------------PHP CODE MAIL BY CHOEUN----------------------*/
	//$emailTo = 'chhunhour.strinfo@gmail.com'; //Put your own email address here
	$emailTo = 'loat.choeun@gmail.com';
	$subject = 'Feedback From BanhJi app';
	$body = "User Name : $uName \n\nMessage: $MSG \n\nURL: $cURL \n\nDate Send: $DS \n\n--------------\nThis Email sended from BanhJi app";
	$headers = 'From: BanhJi app <'.$emailTo.'>' . "\r\n" . 'Reply-To: ';
	if(mail($emailTo, $subject, $body, $headers)){
		echo "Your feedback was send to us. Thank";
	}else{
		echo "Error";
	}
?>