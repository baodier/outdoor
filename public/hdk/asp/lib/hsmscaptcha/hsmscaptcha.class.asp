<%
CLASS HSMSCaptcha
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
	PUBLIC FUNCTION Send(SendURL, Privatekey, Tel, IP)
		DIM Content
		Content= "&k=" & Privatekey  & "&t=" & Tel & "&ip=" & IP
		CALL Connect
	  HttpObj.Open "POST", SendURL, False
	  HttpObj.SetRequestHeader "Content-Type", "application/x-www-form-urlencoded"
	  HttpObj.Send Content
	  Result = HttpObj.ResponseText
	 	CALL DisConnect
	END FUNCTION
	PUBLIC FUNCTION Verify(VerifyURL, Privatekey, Tel, IP, AuthCode)
		DIM Content
		Content= "?&u=hsmscaptcha&s=verify&k=" & Privatekey & "&t=" & Tel & "&c=" & AuthCode & "&ip=" & IP
		CALL Connect
	  HttpObj.Open "POST", VerifyURL, False
	  HttpObj.SetRequestHeader "Content-Type", "application/x-www-form-urlencoded"
	  HttpObj.Send Content
	 	Result = HttpObj.ResponseText
	 	CALL DisConnect
	END FUNCTION
END CLASS
%>