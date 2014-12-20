<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-5
 * Time: 下午4:52
 * To change this template use File | Settings | File Templates.
 */

//生成分页的html代码
function getSepHtml($page, $totalNum,  $curPage = 1, $perPageNum  = 5 ){
    $resultHtml = "";
    $resultHtml .= "<ul>";


    $pageNum = ceil($totalNum/$perPageNum);

    if($curPage>1)
        $resultHtml .= "<li class=\"PagedList-skipToPrevious\"><a href=\"".$page."&page=".($curPage - 1)."\">上一页</a></li>";

    if($pageNum <= 5){

        for($i = 1; $i <= $pageNum ; $i++){
            if($i ==  $curPage)
                $resultHtml .= "<li class=\"PagedList-disabled PagedList-currentPage PagedList-skipToPage\"><a>".$i."</a></li>";
            else
                $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=".$i."\">".$i."</a></li>";
        }
    }else if($pageNum > 5){
        if($curPage <= 3){
            for($i = 1; $i <= 5 ; $i++){
                if($i ==  $curPage)
                    $resultHtml .= "<li class=\"PagedList-disabled PagedList-currentPage PagedList-skipToPage\"><a>".$i."</a></li>";
                else
                    $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=".$i."\">".$i."</a></li>";
            }
            $resultHtml .= "<li class=\"PagedList-ellipses\"><span>...</span></li>";

            $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=".$pageNum."\">".$pageNum."</a></li>";

        }
        else if($curPage + 2 >= $pageNum){
            $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=1\">1</a></li>";
            $resultHtml .= "<li class=\"PagedList-ellipses\"><span>...</span></li>";

            for($i = $pageNum - 4; $i <= $pageNum ; $i++){
                if($i ==  $curPage)
                    $resultHtml .= "<li class=\"PagedList-disabled PagedList-currentPage PagedList-skipToPage\"><a>".$i."</a></li>";
                else
                    $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=".$i."\">".$i."</a></li>";
            }
        }else{
            $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=1\">1</a></li>";
            $resultHtml .= "<li class=\"PagedList-ellipses\"><span>...</span></li>";

            for($i = $curPage - 2; $i <= $curPage + 2 ; $i++){
                if($i ==  $curPage)
                    $resultHtml .= "<li class=\"PagedList-disabled PagedList-currentPage PagedList-skipToPage\"><a>".$i."</a></li>";
                else
                    $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=".$i."\">".$i."</a></li>";
            }

            $resultHtml .= "<li class=\"PagedList-ellipses\"><span>...</span></li>";
            $resultHtml .= "<li class=\"PagedList-skipToPage\"><a href=\"".$page."&page=".$pageNum."\">".$pageNum."</a></li>";

        }
    }


    if($curPage<$pageNum)
        $resultHtml .= "<li class=\"PagedList-skipToNext\"><a href=\"".$page."&page=".($curPage + 1)."\">下一页</a></li>";
    $resultHtml .= "</ul>";

    return $resultHtml;
    //<li class="PagedList-skipToPrevious"><a href="/book?sort=newest&amp;page=0">上一页</a></li>
    //<li class="PagedList-disabled PagedList-currentPage PagedList-skipToPage"><a>1</a></li>
    //<li class="PagedList-skipToPage"><a href="/book/ebook?sort=updated&amp;page=1">2</a></li>
    //<li class="PagedList-skipToPage"><a href="/book/ebook?sort=updated&amp;page=2">3</a></li>
    //<li class="PagedList-skipToPage"><a href="/book/ebook?sort=updated&amp;page=3">4</a></li>
    //<li class="PagedList-skipToPage"><a href="/book/ebook?sort=updated&amp;page=4">5</a></li>
    //<li class="PagedList-ellipses"><span>...</span></li>
    //<li class="PagedList-skipToLast"><a href="/book/ebook?sort=updated&amp;page=13">14</a></li>
    //<li class="PagedList-skipToNext"><a href="/book/ebook?sort=updated&amp;page=1">下一页</a></li>
    //</ul>
}



function get_local_ip() {
    $preg = "/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
//获取操作系统为win2000/xp、win7的本机IP真实地址
    exec("ipconfig", $out, $stats);
    if (!empty($out)) {
        foreach ($out AS $row) {
            if (strstr($row, "IP") && strstr($row, ":") && !strstr($row, "IPv6")) {
                $tmpIp = explode(":", $row);
                if (preg_match($preg, trim($tmpIp[1]))) {
                    return trim($tmpIp[1]);
                }
            }
        }
    }
//获取操作系统为linux类型的本机IP真实地址
    exec("ifconfig", $out, $stats);
    if (!empty($out)) {
        if (isset($out[1]) && strstr($out[1], 'addr:')) {
            $tmpArray = explode(":", $out[1]);
            $tmpIp = explode(" ", $tmpArray[1]);
            if (preg_match($preg, trim($tmpIp[0]))) {
                return trim($tmpIp[0]);
            }
        }
    }
    return '127.0.0.1';
}

function send_active_mail($email, $active_code){

    $_config=array('auth'=>'login',
        'username'=>'250617631@qq.com',
        'password'=>'hlt@newlife');

    $ipadr = get_local_ip();
    $link = "http://".$ipadr."/register/validate?code=".$active_code."&email=".$email;
    $title = "立刻激活你的校园百事通账号";
    $body = "
    <html>
        <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html\">
            <style>
                body{font-size:14px;line-height:1.5;padding:8px 10px;margin:0;}
                pre {
                    white-space: pre-wrap;
                    white-space: -moz-pre-wrap;
                    white-space: -pre-wrap;
                    white-space: -o-pre-wrap;
                    word-wrap: break-word;
                    font-family:'';
                }
                .rm_line{border-top:2px solid #F1F1F1; font-size:0; margin:15px 0}
                .atchImg img{border:2px solid #c3d9ff;}
                .lnkTxt{color:#0066CC;font-size:12px}
                .rm_PicArea *{ font-family:Arial, sans-serif; font-size:14px;font-weight:700;}
                .fbk3{ color:#333; line-height:160%}
                .fTip{ font-size:11px; font-weight:normal}
                body,td,pre{font-family:Arial, Verdana, sans-serif}
            </style>
        </head>
        <body>
            <table style=\"font-size:12px; width:620px; text-align:left;margin:auto; border:3px solid #2AC5E1;\">
                <tbody>
                    <tr>
                        <td>
                            <div style=\"background:#2AC5E1;height: 78px;position: relative;width: 620px; color:#fff; font-size:34px; line-height:78px; text-indent:30px;\"> 注册激活
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id=\"Div15\" style=\"font-size:14px; margin-top:20px; color:#57616D;margin-left:10px;\">
                                <p class=\"font_type1\">尊敬的用户:</p>
                                <p>您好！</p>
                                <div style=\"margin-left:20px; line-height:30px; margin-bottom:60px;\">
                                    <p>感谢注册校园百事通，点击下面链接完成注册</p>
                                    <p><a style=\"color: #007FBA;\" href=\"".$link."\" target=\"_blank\">".$link."</a></p>
                                    <p style=\"font-size:12px; color:#9A9A9A; margin-top:-20px;\">（如无法点击，请直接拷贝到浏览器地址栏中）</p>
                                    <p style=\"margin:20px 0px 30px 0px;\">您的校园百事通账号为：<span style=\" font-size:16px;color: #575E68; font-weight:bold;\">".$email."</span></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table id=\"emailFooter\" style=\"font-size:12px;margin-top:10px; color:#9A9A9A; overflow:hidden; border-top:1px solid #E2E2E4; padding-top:10px;\">
                                <tbody>
                                    <tr>
                                        <td style=\"width:430px;\" width=\"430\">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><span style=\"color: #575E6D; font-size: 12px;\"> 更多动态欢迎 <a href=\"http://".$ipadr."\" style=\"color: #007FBA; text-decoration: none;\" target=\"_blank\">点击</a> 查看</span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=\"font-size:12px; color:#9B9B9B; line-height:25px;\">
                                                            <p>客服邮箱: <p style=\"color: #007FBA; text-decoration: none;\">250617631@qq.com</p> <br>
                                                            祝您工作愉快！ </p>
                                                            <p>本邮件由系统自动发送，请勿回复！</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
    </html>";

    try {

        $transport = new Zend_Mail_Transport_Smtp('smtp.qq.com',$_config);
        $mail = new Zend_Mail('UTF-8');
        $mail->setSubject($title);
        $mail->setBodyHtml($body);
        $mail->setFrom('250617631@qq.com', '校园百事通');
        $mail->addTo($email, '亲爱的用户');
        $mail->send($transport);

    }catch(Exception $e) {
        $e->getTrace();
        return false;
    }

}