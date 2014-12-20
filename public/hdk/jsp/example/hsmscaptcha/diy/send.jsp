<%
	String PrivateKey  = "db7c960fab64cc94fd7b83b6760d4c6b";
  String HSMSCaptchaTel = request.getParameter("HSMSCaptchaTel"); 
  String SecurityPath = (request.getSession().getServletContext().getRealPath("/") + "hdk/jsp/security/hinsite").replaceAll("\\\\","/");
	Hinsite.HSMSCaptcha HSMSCaptchaObj = new Hinsite.HSMSCaptcha(SecurityPath);
	String ReturnString = HSMSCaptchaObj.Send("https://api.hinsite.com/default.php?&u=hsmscaptcha&s=send", PrivateKey, HSMSCaptchaTel, request.getRemoteAddr());
	out.print(ReturnString);
%>