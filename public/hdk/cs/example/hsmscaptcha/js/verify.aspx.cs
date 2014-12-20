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

public partial class verify : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string VerifyURL = "https://api.hinsite.com/default.php?u=hsmscaptcha&s=verify";
        string PrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b";
        Hinsite.HSMSCaptcha HSMSCaptchaObj = new Hinsite.HSMSCaptcha();
        string ReturnBody = HSMSCaptchaObj.Verify(VerifyURL, PrivateKey, Request.Form["HSMSCaptchaTel"], Request.Form["HSMSCaptchaRemoteAddr"], Request.Form["HSMSCaptchaValue"]);
        Response.Write(ReturnBody);
    }
}
