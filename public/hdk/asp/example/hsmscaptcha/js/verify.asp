<!--#INCLUDE VIRTUAL="/example/hdk/asp/include/hsmscaptcha.inc.asp"-->
<!--#INCLUDE VIRTUAL="/example/hdk/asp/lib/hsmscaptcha/hsmscaptcha.class.asp"-->
<%
	DIM HCaptchaPrivateKey
	HCaptchaPrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b"
	SET HCaptchaObj = NEW HSMSCaptcha
	CALL HCaptchaObj.Verify(HSMSCatpchaVerifyURL, HCaptchaPrivateKey, REQUEST.FORM("HSMSCaptchaTel"), Request.ServerVariables("REMOTE_ADDR"), REQUEST.FORM("HSMSCaptchaValue"))
	RESPONSE.WRITE HCaptchaObj.Result 
%>