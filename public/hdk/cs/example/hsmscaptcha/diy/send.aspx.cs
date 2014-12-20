using System;
using System.Data;
using System.Configuration;
using System.Collections;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using Hinsite;

public partial class send : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string SendURL = "https://api.hinsite.com/default.php?u=hsmscaptcha&s=send";
        string PrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b";
        Hinsite.HSMSCaptcha HSMSCaptchaObj = new Hinsite.HSMSCaptcha();
        string ReturnBody = HSMSCaptchaObj.Send(SendURL, PrivateKey, Request.Form["HSMSCaptchaTel"], Request.UserHostAddress);
        Response.Write(ReturnBody);
    }
}
