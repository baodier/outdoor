<?php	
include("../../../../hkd/php/include/hsmscaptcha.inc.php");
	$_HSMSCaptchaPrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b";
	$HSMSCaptchaObj = new HSMSCaptcha($_HSMSCaptchaVerifyURL, $_HSMSCaptchaPrivateKey);
	echo $HSMSCaptchaObj->Verify(isset($_POST['HSMSCaptchaTel']) ? $_POST['HSMSCaptchaTel']:"", $_SERVER['REMOTE_ADDR'], $_POST['HSMSCaptchaValue'])? $_POST['HSMSCaptchaValue'] :"");
?>