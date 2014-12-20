<!--#INCLUDE VIRTUAL="/example/hdk/asp/include/hsmscaptcha.inc.asp"-->
<!--#INCLUDE VIRTUAL="/example/hdk/asp/lib/hsmscaptcha/hsmscaptcha.class.asp"-->
<%
	SET HSMSCaptchaObj = NEW HSMSCaptcha
	HSMSCaptchaPrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b"
	CALL HSMSCaptchaObj.Send(HSMSCaptchaSendURL, HSMSCaptchaPrivateKey, REQUEST.FORM("HSMSCaptchaTel"), Request.ServerVariables("REMOTE_ADDR"))
	RESPONSE.WRITE HSMSCaptchaObj.Result
%>