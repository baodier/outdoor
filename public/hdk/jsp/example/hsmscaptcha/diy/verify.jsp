<%
	String PrivateKey  = "db7c960fab64cc94fd7b83b6760d4c6b";
  String HSMSCaptchaTel = request.getParameter("HSMSCaptchaTel"); 
  String HSMSCaptchaValue = request.getParameter("HSMSCaptchaValue"); 
  String SecurityPath = (request.getSession().getServletContext().getRealPath("/") + "hdk/jsp/security/hinsite").replaceAll("\\\\","/");
	Hinsite.HSMSCaptcha HSMSCaptchaObj = new Hinsite.HSMSCaptcha(SecurityPath);
	String ReturnString = HSMSCaptchaObj.Verify("https://api.hinsite.com/default.php?&u=hsmscaptcha&s=verify", PrivateKey, HSMSCaptchaTel, request.getRemoteAddr(), new String(HSMSCaptchaValue.getBytes("ISO-8859-1"), "UTF-8"));
	out.print(ReturnString);
%>