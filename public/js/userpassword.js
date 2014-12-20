$(function(){	
	var focus_old_pwd = 0;//当前密码输入框是否获得过焦点
	var focus_new_pwd = 0;
	var focus_new_pwd_sure = 0;
	var PWD_LEN_ERROR = '密码长度不正确，应为6～16个字符';
    var PWD_LEN_ERROR_NAME = '昵称长度不正确，应为2～16个字符，汉字按1个字符计算';
	var PWD_VALUE_ERROR = '密码错误';
	var PWD_MATCH_ERROR = '新密码与原密码一致，请重新输入';
	var PWD_NOT_MATCH_ERROR = '两次输入的密码不一致，请重新输入';
	var PWD_OLD_NULL_ERROR = '密码不能为空';
	var PWD_NEW_NULL_ERROR = '新密码不能为空';
	var PWD_NEW_SURE_NULL_ERROR = '确认密码不能为空';
	var PWD_UPDATE_SUCCESS = '密码修改成功!';
	//输入框获得失去焦点 
	$('.tab_input input').focus(function(){
		var password = $("#old_pwd").val();
    	var password1 = $("#new_pwd").val();
    	var password2 = $("#new_pwd_sure").val();

		if ($(this).attr('id') == 'old_pwd') {
			focus_old_pwd++;
			if (password1 == '') {
				if (focus_new_pwd > 0) {
					add_error_msg('new_pwd', PWD_LEN_ERROR);
				}
	    	}
	    	if (password2 == '') {
	    		if (focus_new_pwd_sure > 0) {
	    			add_error_msg('new_pwd_sure', PWD_LEN_ERROR);
	    		}
	    	}
		} else if ($(this).attr('id') == 'new_pwd') {
			if (password == '') {
				if (focus_old_pwd > 0) {
					add_error_msg('old_pwd', PWD_VALUE_ERROR);
				}
	    	}
	    	if (password2 == '') {
	    		if (focus_new_pwd_sure > 0) {
	    			add_error_msg('new_pwd_sure', PWD_LEN_ERROR);
	    		}
	    	}
		} else if ($(this).attr('id') == 'new_pwd_sure') {
			if (password == '') {
				if (focus_old_pwd > 0) {
					add_error_msg('old_pwd', PWD_VALUE_ERROR);
				}
	    	}
	    	if (password1 == '') {
	    		if (focus_new_pwd > 0) {
	    			add_error_msg('new_pwd', PWD_LEN_ERROR);
	    		}
	    	}
		}
		$(this).closest('.tab_row').find('.focus_info').show().siblings('.error_info').hide();
		$(this).closest('.tab_row').find('.success_info').hide();
	}).blur(function(){
		var id = $(this).attr("id");
		show_info_status(id);
	});
	
	//修改密码
	$("#registerBtn").click(function(){

        var new_pwd_is_hidden = $('#new_pwd').closest('.tab_row').find('.error_info').is(":hidden");
        var new_pwd_sure_is_hidden = $('#new_pwd_sure').closest('.tab_row').find('.error_info').is(":hidden");
        var new_name_is_hidden = $('#new_name').closest('.tab_row').find('.error_info').is(":hidden");

        var password = $('#new_pwd').val();
        var password_sure = $('#new_pwd_sure').val();
        var name = $('#new_name').val();
        var email = $('#emailVal').val();

    	if (password != "" && password_sure != "" && name != "" & new_pwd_is_hidden && new_pwd_sure_is_hidden && new_name_is_hidden && name.length >= 2 && name.length <=16) {

            $.post('/register',{email:email, pwd:password, name:name},function(data){
                if (data) {
                    if (data == 'success') {
                        document.getElementById('change_title').innerHTML = '注册成功，请登录网站！';
                        document.getElementById('registerTable').style.display = 'none';

                    } else if (data == 'exit') {
                        document.getElementById('change_title').innerHTML = '已经存在的用户，请直接登录！';
                        document.getElementById('registerTable').style.display = 'none';

                    }else if (data == 'fail'){
                        document.getElementById('change_title').innerHTML = '服务器繁忙，请稍后再尝试注册！';
                    }
                }
            });

    	} else {
            show_info_status('new_pwd');
            show_info_status('new_pwd_sure');
            show_info_status('new_name');
    	}
	})
	
	//修改错误信息显示
	function add_error_msg(id, msg)
	{
		var $error_info = $('#'+id).closest('.tab_row').find('.error_info');
		$error_info.find('.errorinfo_txt').html(msg);
		$error_info.show();
	}
	
	//隐藏提示信息
	function hide_focus_info(id)
	{
		var $focus_info = $('#'+id).closest('.tab_row').find('.focus_info');
		$focus_info.hide();
	}
	
	//显示提示信息
	function show_focus_info(id)
	{
		var $focus_info = $('#'+id).closest('.tab_row').find('.focus_info');
		$focus_info.show();
	}
	
	//隐藏错误信息
	function hide_error_info(id)
	{
		var $error_info = $('#'+id).closest('.tab_row').find('.error_info');
		$error_info.hide();
	}
	
	//显示错误信息
	function show_error_info(id)
	{
		var $error_info = $('#'+id).closest('.tab_row').find('.error_info');
		$error_info.show();
	}
	
	//隐藏成功信息
	function hide_success_info(id)
	{
		var $success_info = $('#'+id).closest('.tab_row').find('.success_info');
		$success_info.hide();
	}
	
	//显示成功信息
	function show_success_info(id)
	{
		var $success_info = $('#'+id).closest('.tab_row').find('.success_info');
		$success_info.show();
	}
	
	//判断当前元素的提示信息显示状态
	function show_info_status(id)
	{
		var $focus_info = $('#'+id).closest('.tab_row').find('.focus_info');
		var $error_info = $('#'+id).closest('.tab_row').find('.error_info');
		var $success_info = $('#'+id).closest('.tab_row').find('.success_info');

        if(id == "new_name"){
            if ($('#'+id).val().length < 2) {
                $focus_info.hide();
                $success_info.hide();
                add_error_msg(id, PWD_LEN_ERROR_NAME);
            }else if($('#'+id).val().length > 16){
                $focus_info.hide();
                $success_info.hide();
                add_error_msg(id, PWD_LEN_ERROR_NAME);
            }else {
                $focus_info.hide();
                $error_info.hide();
                $success_info.show();
            }
        }
        else {
            if ($('#'+id).val().length < 6) {
                $focus_info.hide();
                $success_info.hide();
                if ($('#'+id).attr('id') != 'old_pwd') {
                    add_error_msg(id, PWD_LEN_ERROR);
                }
            }else if($('#'+id).val().length > 16){
                $focus_info.hide();
                $success_info.hide();
                if ($('#'+id).attr('id') != 'old_pwd') {
                    add_error_msg(id, PWD_LEN_ERROR);
                }
            } else {
                if (id == 'new_pwd_sure') {
                    if ($('#new_pwd').val().length > 0) {
                        if ($('#new_pwd').val() == $('#new_pwd_sure').val()) {
                            $focus_info.hide();
                            $error_info.hide();
                            $success_info.show();
                        } else {
                            add_error_msg(id, PWD_NOT_MATCH_ERROR);
                            $focus_info.hide();
                            $success_info.hide();
                        }
                    }
                } else if (id == 'new_pwd') {
                    $focus_info.hide();
                    $error_info.hide();
                    $success_info.show();
                }
            }
        }
	}
	
	
	
});