<%
CLASS HCaptcha
	DIM Result, HttpObj
	PRIVATE SUB Class_Initialize 
	END SUB
	PRIVATE SUB Class_Terminate 
	END SUB
	
	PUBLIC FUNCTION Connect
		SET HttpObj = SERVER.CREATEOBJECT("Msxml2.ServerXMLHTTP")
	END FUNCTION
	
	PUBLIC FUNCTION DisConnect
		SET HttpObj = NOTHING
	END FUNCTION
	
	PUBLIC FUNCTION Verify(VerifyURL, Privatekey, IP, AuthCode, Sid)
		DIM Content
		Content = "u=hcaptcha&s=verify&k=" & Privatekey & "&ip=" & IP & "&sid=" & Sid & "&c=" & AuthCode
		CALL Connect
	  HttpObj.Open "POST", VerifyURL, False
	  HttpObj.SetRequestHeader "Content-Type", "application/x-www-form-urlencoded"
	  HttpObj.Send Content
	 	Result = HttpObj.ResponseText
	 	CALL DisConnect
	END FUNCTION
END CLASS
%>