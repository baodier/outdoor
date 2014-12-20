<%
	String PrivateKey  = "db7c960fab64cc94fd7b83b6760d4c6b";
  String HCaptchaInput = request.getParameter("HCaptchaInput"); 
  String SecurityPath = (request.getSession().getServletContext().getRealPath("/") + "hdk/jsp/security/hinsite").replaceAll("\\\\","/");
	Hinsite.HCaptcha HCaptchaObj = new Hinsite.HCaptcha(SecurityPath);
	String ReturnString = HCaptchaObj.Verify("https://api.hinsite.com/default.php?&u=hcaptcha&s=verify", PrivateKey, request.getRemoteAddr(), new String(HCaptchaInput.getBytes("ISO-8859-1"), "UTF-8"), "");
	out.print(ReturnString);
%>