<!--#INCLUDE VIRTUAL="/example/hdk/asp/include/hcaptcha.inc.asp"-->
<!--#INCLUDE VIRTUAL="/example/hdk/asp/lib/hcaptcha/hcaptcha.class.asp"-->
<%
	DIM HCaptchaPrivateKey
	HCaptchaPrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b"
	SET HCaptchaObj = NEW HCaptcha
	CALL HCaptchaObj.Verify(HCatpchaVerifyURL, HCaptchaPrivateKey, Request.ServerVariables("REMOTE_ADDR") , REQUEST.FORM("HCaptchaInput"), "")
	RESPONSE.WRITE HCaptchaObj.Result
%>