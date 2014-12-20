**************************************************************************
**
**  # HDK(Hinsite Development Kit) 说明文档
**
*    版本: 1.0.3
*    支持语言: PHP\ASP\VB.NET\C#.NET\JSP
*    版权: 皕川科技有限公司
*    制作: 皕川科技技术部
*    客户服务: +86 755 26649393 +86 18922849133
*    联系邮箱: cs@mta.cn
*    发布日期: 2013-06-18
*    适用平台: 皕应 http://www.hinsite.com
*
***************************************************************************


1. 安装
将整个hdk目录文件放到网站根目录下。

2. 设置
如果您将hdk放到网站根目录下，不需要做任何更改，如果将hdk放到其他目录，您需要更改嵌入与实现代码的相应路径。


3. 文件结构

 hdk 
  │       ├example ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  hdk实例目录
  │       │  │
  │       │  ├ hcaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │
  │       │  ├ hsmscaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HSMSCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  ├ asp   │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例          
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     │
  │       ├ include ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  包含文件
  │       │  │
  │       │  ├ hcaptcha.inc.asp
  │       │  │
  │       │  ├ hsmscaptcha.inc.asp
  │       │ 
  │       ├ lib ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 库文件
  │       │  │     
  │       │  ├ hcaptcha
  │       │  │   │
  │       │  │   ├ hcaptcha.lib.asp ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HCaptcha校验类目录
  │       │  │    
  │       │  ├ hsmscaptcha
  │       │  │   │
  │       │  │   ├ hsmscaptcha.class.asp ┈┈┈┈┈┈┈┈┈┈┈┈ HSMSCaptcha校验类目录
  │       │  │   


  │       ├ bin ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 库文件
  │       │  │
  │       │  ├ Hinsite.dll
  │       │  ├ Hinsite.pdb
  │       │
  │       ├example ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  hdk实例目录
  │       │  │
  │       │  ├ hcaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  ├ cs    │  │     │  ├ verify.asp
  │       │  │     │
  │       │  ├ hsmscaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HSMSCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例          
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     │


  │       ├example ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   hdk实例目录
  │       │  │
  │       │  ├ hcaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  HCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   JS支持案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  │       │  │     │
  │       │  ├ hsmscaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  HSMSCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  ├ jsp   │  │     │  ├ send.jsp
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ JS支持案例          
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  │       │  │     │  ├ send.jsp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  │       │  │     │  ├ send.jsp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.jsp
  │       │  │     │  ├ send.jsp
  │       │  │     │
  │       ├lib ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 库文件
  │       │  │
  │       │  ├ hinsite.jar
  │       │  
  │       ├security
  │       │  │
  │       │  ├ hinsite ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HTTPS安全文件


  │       ├example ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  hdk实例目录
  │       │  │
  │       │  ├ hcaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     │
  │       │  ├ hsmscaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HSMSCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     │  ├ send.php
  ├ php   │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例          
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     │  ├ send.php
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     │  ├ send.php
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.php
  │       │  │     │  ├ send.php
  │       │  │     │
  │       ├ include ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  包含文件
  │       │  │
  │       │  ├ hcaptcha.inc.php
  │       │  ├ hsmscaptcha.inc.php
  │       │
  │       ├ lib ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 库文件
  │       │  │
  │       │  ├ hcaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  hcaptcha库文件
  │       │  │    ├ hcaptcha.class.php
  │       │  ├ hsmscaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  hsmscaptcha库文件
  │       │  │    ├ hsmscaptcha.class.php


  │       ├ bin ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 库文件
  │       │  │
  │       │  ├ Hinsite.dll
  │       │  ├ Hinsite.pdb
  │       │
  │       ├example ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  hdk实例目录
  │       │  │
  │       │  ├ hcaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  ├ vb    │  │     │  ├ verify.asp
  │       │  │     │
  │       │  ├ hsmscaptcha ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ HSMSCaptcha实例目录
  │       │  │     │
  │       │  │     ├ diy ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ 自定义样式案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ js ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  JS支持案例          
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ module ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈  组件展出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     ├ popup ┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈   组件弹出案例
  │       │  │     │  ├ index.html
  │       │  │     │  ├ verify.asp
  │       │  │     │  ├ send.asp
  │       │  │     │


  


      
 