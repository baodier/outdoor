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
        string VerifyURL = "https://api.hinsite.com/default.php?u=hcaptcha&s=verify";
        string PrivateKey = "db7c960fab64cc94fd7b83b6760d4c6b";
        Hinsite.HCaptcha HCaptchaObj = new Hinsite.HCaptcha();
        string ReturnBody = HCaptchaObj.Verify(VerifyURL, PrivateKey, Request.UserHostAddress, Request.Form["HCaptchaInput"], "");
        Response.Write(ReturnBody);
    }
}
