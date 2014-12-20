<?php
include("../../../../../hdk/php/include/hsmscaptcha.inc.php");
	$_HSMSCaptchaPrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b";
	$HSMSCaptchaObj = new HSMSCaptcha($_HSMSCaptchaSendURL, $_HSMSCaptchaPrivateKey);
	echo $HSMSCaptchaObj->Send(isset($_POST['HSMSCaptchaTel']) ? $_POST['HSMSCaptchaTel']:"", $_SERVER['REMOTE_ADDR']);
?>