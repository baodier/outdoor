/*******全局变量******/
var jcrop_api, boundx, boundy, scale=0, imgWidth=0, imgHeight=0,first=true,imgPath='',cutPath,picval;

/**********JQuery**********/
jQuery(function($){

	picval = $(".l_pic").html();
	$(".save").click(function() {
		$(".l_pic").empty();
		$(".photo1").empty();
		$(".photo2").empty();
		$(".photo3").empty();
	});
	
	/***点击保存剪切图片****/
	$("#cutForm").submit(function(){
		if(cutPath) {
			var val = cutPath+"&"+$(this).serialize();
			//alert(val);
			$.ajax({
				type:'POST',
				url:BASEURL+"public/photocrop/p_imageCut.php",
				data:val,
				dataType:"json",
				//cache:false,
				//beforeSend:function(){alert("sending");},
				success:function(json){
					//alert('here');
					$(".l_pic").removeAttr("style").html(picval);
					$('.photo1').append('<img src="'+json.big+'">');
					$('.photo2').append('<img src="'+json.middle+'">');
					$('.photo3').append('<img src="'+json.small+'">');
					//$('.path').append('大头像地址: '+json.big+'<br/>'+'中头像地址: '+json.middle+'<br/>'+'小头像地址: '+json.small+'<br/>');
					
					$.ajax({
						type:'post',
						url:UPLOADHOST+BASEURL+'setting/insertavatar',
						data:{url:$.toJSON(json),userid:$(".content").attr('id')},
						//cache:false,
						aysnc:false,
						success:function(bck){
						if(bck)
						{
							//$(".avatar").hide();
							//$(".l_pic").text("设置头像成功")
						}
					}
					})
					
				}
			});
		}/*  else {
			alert('none');
		} */
		return false;
	});
	
	/**取消按钮**/
	$(".cancel").click(function() {
		deleteImg(imgPath);
		$(".l_pic").empty();
		$(".photo1").empty();
		$(".photo2").empty();
		$(".photo3").empty();
	});
});
/***********end JQuery************/

/**********Jcrop控件设置**********/
function initialJcrop() {
	$('#target').Jcrop({
		bgColor: '#F00',
		bgOpacity: 0.7,
		allowSelect:false,
		minSize: [20,20],
		setSelect: [0,0,140,140],
		onChange: updatePreview,
		onSelect: updatePreview,
		onSelect: updateCoords,
		aspectRatio: 1,
		sideHandles: false,
		dragEdges: false
	},function(){
		var bounds = this.getBounds();
		boundx = bounds[0];
		boundy = bounds[1];
		jcrop_api = this;
	});
};
	
function updateCoords(c) {
	$('#x').val(Math.round(c.x/scale));
	$('#y').val(Math.round(c.y/scale));
	$('#w').val(Math.round(c.w/scale));
	$('#h').val(Math.round(c.h/scale));
};
				
function checkCoords() {
	if (parseInt($('#w').val())) return true;
	alert('请选择一个剪切区域然后点击保存!');
	return false;
};
				
function updatePreview(c) {
	if (parseInt(c.w) > 0) {
        {
          var rx = 140 / c.w;		//大尺寸头像预览Div的大小
          var ry = 140 / c.h;

          $('#preview1').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
        }
	    {
          var rx = 50 / c.w;		//中尺寸头像预览Div的大小
          var ry = 50 / c.h;
          $('#preview2').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
        }
        {
          var rx = 30 / c.w;		//小尺寸头像预览Div的大小
          var ry = 30 / c.h;

          $('#preview3').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
        }
	}
};
/**********Jcrop end*********/

/**********文件上传设置**********/
function ajaxFileUpload() {
	$("#loading").ajaxStart(function(){
		$(this).show();
	}).ajaxComplete(function(){
		$(this).hide();
	});
	//文件名字
	var filename = $("#file").val();
	var ext = filename.split(".");
	//上传文件类型
	var houzui = ext[ext.length-1].toLowerCase();
	
	if(!first) {
		if(imgPath)
		{
			deleteImg(imgPath);	
		}
	} else {
		$(".buttonUpload").text("重新上传");
	}	
	first = false;
	if(houzui=="gif"||houzui=="jpg"||houzui=="png"||houzui=="jpeg")
	{
		$.ajaxFileUpload( {
			url:'/photocrop/p_imageUpload.php',
			secureuri:false,
			fileElementId:'file',
			dataType: 'json',
			//cache:false,
			data:{userid:$("#hidden_userid").val()},
			success: function (data, status){

				if(typeof(data.error) != 'undefined'){
					if(data.error != ''){
						alert(data.error);
					} else {
						imgPath = data.msg;
						imgWidth = data.width;
						imgHeight = data.height;
						
						$(".photo1").empty().append("<img id='preview1' src='"+imgPath+"'/>");
						$(".photo2").empty().append("<img id='preview2' src='"+imgPath+"'/>");
						$(".photo3").empty().append("<img id='preview3' src='"+imgPath+"'/>");
						adjustImg();
						initialJcrop();
						$('#x').val(0);
						$('#y').val(0);
						$('#w').val(Math.round(100/scale));
						$('#h').val(Math.round(100/scale));
					}
				}
			},
			error: function (data, status, e){
				alert('上传文件不能大于5M');
			}
		});	
	}
	else
	{
		alert("您上传的文件类型不对");
	}
	return false;
}

/*******删除上传的图片*******/
function deleteImg(path) {
	$.get(
		BASEURL+"public/photocrop/deleteImg.php",{"delete":path},
		function(data) {
		//	alert(data);
		}
	);
}

/********图片调整显示**********/
function adjustImg() {
	var src = $("#preview1").attr("src");
	
	$(".l_pic").empty();	//消除jcrop					
	var init_full = "";	//初始需填充满的方向
	var init_fill="";	//初始没有填充满的方向
	var adjust = 0;		//未填充满方向需要调整的像素数
	var padding_1="",padding_2="";
	if(imgWidth>imgHeight) {
		init_full = "width";
		init_fill = "height";
		padding_1 = "padding-top";
		padding_2 = "padding-left";
		scale = 300/imgWidth;
		adjust = Math.round(scale*imgHeight);	//需要校正的宽度或高度 -浏览器图片显示区域为300px
		boundx = 300;
		boundy = scale*imgHeight;
	} else {
		init_full = "height"
		init_fill = "width";
		padding_1 = "padding-left";
		padding_2 = "padding-top";
		scale = 300/imgHeight;
		adjust = Math.round(scale*imgWidth);
		boundx = scale*imgWidth;
		boundy = 300;
	}
	
	var confix = Math.round((300-adjust)/2);			//调整外框
	var short_l = 300-confix;
	$(".l_pic").css(init_full,"300px")
				 .css(init_fill,short_l+"px")
				 .css(padding_1,confix+"px")
				 .css(padding_2,"0px")
				 .append("<img id='target' style='"+init_full+":300px;"+init_fill+":"+adjust+"px;' src='"+src+"'/>");
	
	//$(".cutForm").attr("action","imageCut.php?cut="+src);
	//src = removehttp(src);
	cutPath = "cut="+src;
	imgPath = src;
	
}


function removehttp(src)
{
	var str = src.replace(UPLOADHOSTREG,'');
	return str;
}