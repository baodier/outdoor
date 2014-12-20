<?php
/**************************************************************************
 ** 
 **     # HDK 配置文件
 ** 
 *        版本: 1.0
 *        语言: PHP
 *        版权: 皕川科技有限公司[Hdriver]
 *        版权: 皕川科技技术部
 *        客户服务: +86 755 26649393 +86 18922849133
 *        联系邮箱: cs@mta.cn
 *        发布日期: 2012-03-13
 *        适用平台: 皕应 http://www.hinsite.com
 *
***************************************************************************/

/***
 *
 * HDK 基本参数
 *
 # @param string $_HDKPath : HDK 的安装绝对路径，注意请与反斜杠[/]结束 [如：/usr/local/apache/htdocs/hdk/];
 *
 ***/
    $_HDKPath = '';
     $PathArr = explode("\\", dirname(__FILE__));
     for($i=0; $i<count($PathArr)-1; $i++)
     {
         $_HDKPath .= $PathArr[$i]."\\";
     }

/***
 *
 * HCaptcha 基本参数
 *
 # @param string $_HCaptchaVerifyServer : HCaptcha 的校验服务器地址；
 *
 ***/

    $_HSMSCaptchaSendURL = 'https://api.hinsite.com/default.php?u=hsmscaptcha&s=send';
    $_HSMSCaptchaVerifyURL = 'https://api.hinsite.com/default.php?u=hsmscaptcha&s=verify';
    
/***
 *
 * 包含HCaptcha校验类库
 * 
 ***/
 
    include($_HDKPath.'lib/hsmscaptcha/hsmscaptcha.class.php');

?>