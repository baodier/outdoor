﻿Imports System
Imports System.IO
Imports System.ComponentModel
Imports System.Data
Imports System.Web
Imports System.Web.UI
Imports Hinsite


Partial Class verify
    Inherits System.Web.UI.Page

    Sub Page_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Init

        Dim VerifyURL = "https://api.hinsite.com/default.php?u=hcaptcha&s=verify"
        Dim PrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b"
        Dim HCaptchaObj As New Hinsite.HCaptcha()
        Dim ReturnBody As String = HCaptchaObj.Verify(VerifyURL, PrivateKey, Request.Form("HCaptchaRemoteAddr"), Request.Form("HCaptchaInput"), Request.Form("HCaptchaSid"))
        Response.Write(ReturnBody)

    End Sub

End Class
