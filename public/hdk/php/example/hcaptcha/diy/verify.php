<?php
include("../../../include/hcaptcha.inc.php");

	$_HCaptchaPrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b";
	$HCaptchaObj = new HCaptcha($_HCaptchaVerifyURL, $_HCaptchaPrivateKey);
	echo $HCaptchaObj->Verify($_SERVER['REMOTE_ADDR'], isset($_POST['HCaptchaInput']) ? $_POST['HCaptchaInput'] : "", isset($_POST['HCaptchaSid'])? $_POST['HCaptchaSid'] : "");
?>