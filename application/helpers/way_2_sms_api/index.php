<?php
//refer README.md for guide
include('way2sms-api.php');
function send_sms($nos='7567934387' ,$msg='way2sms API test')
{
	$login_phone='7567934387';
	$login_password='PutYourPasswordHere';
	return sendWay2SMS ($login_phone , $login_password, $nos, $msg);
}
?>