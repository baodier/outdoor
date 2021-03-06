<?php
/**************************************************************************
 **
 **     # HSMSCaptcha 短信验证码发送与校验类
 **
 *        版本: 1.0
 *        语言: PHP
 *        版权: 皕川科技
 *        客户服务: +86 755 26649393 +86 18922849133
 *        联系邮箱: cs@mta.cn
 *        发布日期: 2012-03-13
 *        适用平台: 皕应 http://www.hinsite.com
 *
***************************************************************************/

class HSMSCaptcha
{
    var $Address;
    var $Server;
    var $Port;
    var $PrivateKey;
    var $RequestURL;
    
    function HSMSCaptcha($RequestURL, $PrivateKey='')
    {
        if($PrivateKey == '' || $RequestURL == '')
        {
            return -1;
        }
        $this->GetServerInfoByURL($RequestURL);
        $this->PrivateKey = $PrivateKey;
        $this->RequestURL = $RequestURL;
        $this->Connect();
    }

    function Connect()
    {
        return $this->Server = fsockopen($this->Address, $this->Port, $ErrorNo, $ErrorString, 30);
    }
    
    function Disconnect()
    {
        fclose($this->Server);
    }
    
    public function Send($Tel, $IP)
    {
        if($IP == '')
        {
            return -1;
        }
        if($Tel == '')
        {
            return -2;
        }
        
        $Content = '&k='.$this->PrivateKey.'&ip='.$IP.'&t='.$Tel;
        $Out = "POST ".$this->RequestURL." HTTP/1.1\r\nHost: ".$this->Address."\r\nUser-Agent: Hinside\r\nReferer: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."\r\nContent-Type: application/x-www-form-urlencoded;\r\nContent-Length: ".strlen($Content)."\r\nConnection: close\r\n\r\n".$Content;
        fputs($this->Server, $Out);
        $ReturnHeaders = '';
        while($str = trim(fgets($this->Server, 1024)))
        {
            $ReturnHeaders .= $str."\r\n";
        }
        $ReturnBody = '';
        while(!feof($this->Server))
        {
            $ReturnBody .= fgets($this->Server, 1024);
        }
        $this->Disconnect();
        return $ReturnBody;
    }
    
    public function Verify($Tel, $IP, $AuthCode)
    {
        if($IP == '')
        {
            return -1;
        }
        if($Tel == '')
        {
            return -2;
        }
        if($AuthCode == '')
        {
            return -3;
        }
        
        $Content = '&k='.$this->PrivateKey.'&ip='.$IP.'&t='.$Tel.'&c='.$AuthCode;
        $Out = "POST ".$this->RequestURL." HTTP/1.1\r\nHost: ".$this->Address."\r\nUser-Agent: Hinside\r\nReferer: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."\r\nContent-Type: application/x-www-form-urlencoded;\r\nContent-Length: ".strlen($Content)."\r\nConnection: close\r\n\r\n".$Content;
        fputs($this->Server, $Out);
        $ReturnHeaders = '';
        while($str = trim(fgets($this->Server, 1024)))
        {
            $ReturnHeaders .= $str."\r\n";
        }
        $ReturnBody = '';
        while(!feof($this->Server))
        {
            $ReturnBody .= fgets($this->Server, 1024);
        }
        $this->Disconnect();
        return $ReturnBody;
    }
    
    public function GetServerInfoByURL($RequestURL='')
    {
        if($RequestURL == '')
        {
            return -1;
        }
        
        $URLArr = parse_url($RequestURL);
        if(isset($URLArr['host']))
        {
            $this->Address = $URLArr['host'];
        }
        else
        {
            $this->Address = '127.0.0.1';
        }
        if(isset($URLArr['port']))
        {
            $this->Port = $URLArr['port'];
        }
        else
        {
            $this->Port = 80;
        }
    }
}
?>