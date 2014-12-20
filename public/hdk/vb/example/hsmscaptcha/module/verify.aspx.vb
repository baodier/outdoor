Imports System
Imports System.IO
Imports System.ComponentModel
Imports System.Data
Imports System.Web
Imports System.Web.UI
Imports Hinsite

Partial Class verify
    Inherits System.Web.UI.Page

    Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Init

        Dim VerifyURL As String = "https://api.hinsite.com/default.php?u=hsmscaptcha&s=verify"
        Dim PrivateKey As String = "db7c960fab64cc94fd7b83b6760d4c6b"
        Dim HSMSCaptchaObj As New Hinsite.HSMSCaptcha()
        Dim ReturnBody As String = HSMSCaptchaObj.Verify(VerifyURL, PrivateKey, Request.Form("HSMSCaptchaTel"), Request.Form("HSMSCaptchaRemoteAddr"), Request.Form("HSMSCaptchaValue"))
        Response.Write(ReturnBody)

    End Sub

End Class
