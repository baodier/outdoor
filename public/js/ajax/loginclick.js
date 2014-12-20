/**
 * Created with JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-13
 * Time: 下午12:49
 * To change this template use File | Settings | File Templates.
 */
function loginClick(){
    var email = $('#login_email').val();
    var password = $('#login_pwd').val();

    $.post('/login/check',{email:email, pwd:password},function(data){
        var obj = jQuery.parseJSON(data);
        if (obj.code == 'success') {
            window.location.href="/login";
        } else{
            document.getElementById('login_pwd').value = '';
            document.getElementById('login_pwd').placeholder = '用户名密码不匹配！';
            document.getElementById('login_pwd').style.fontWeight = 'bold';
        }

    });
    return;
}

$('#login_pwd').focus(function(){
    document.getElementById('login_pwd').style.fontWeight = 'normal';
    document.getElementById('login_pwd').placeholder = '请输入密码';
});