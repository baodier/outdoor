<?php
include("../../../include/hsmscaptcha.inc.php");

	$_HSMSCaptchaPrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b";
	$HSMSCaptchaObj = new HSMSCaptcha($_HSMSCaptchaVerifyURL, $_HSMSCaptchaPrivateKey);
	echo $HSMSCaptchaObj->Verify(isset($_POST['HSMSCaptchaTel']) ? $_POST['HSMSCaptchaTel']:"", isset($_POST['HSMSCaptchaRemoteAddr'])? $_POST['HSMSCaptchaRemoteAddr'] :$_SERVER['REMOTE_ADDR'], isset($_POST['HSMSCaptchaValue'])? $_POST['HSMSCaptchaValue'] :"");
?>