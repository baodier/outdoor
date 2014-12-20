<?php
	error_reporting(7);
	date_default_timezone_set("Asia/Shanghai");
	@header("Content-type:text/html; Charset=utf-8");
	require_once("./image.class.php");
	
	$error = "";
	$msg = "";
	$file = 'file';
	if($_FILES[$file]==NULL)
	{
		$error = '文件大小不能超过5M!';
		break;
	}else{
		if(!empty($_FILES[$file]['error'])) {
			switch($_FILES[$file]['error']) {
				case '1':
					$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
					break;
				case '2':
					$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
					break;
				case '3':
					$error = 'The uploaded file was only partially uploaded';
					break;
				case '4':
					$error = 'No file was uploaded.';
					break;
	
				case '6':
					$error = 'Missing a temporary folder';
					break;
				case '7':
					$error = 'Failed to write file to disk';
					break;
				case '8':
					$error = 'File upload stopped by extension';
					break;
				case '999':
				default:
					$error = 'No error code avaiable';
			}
		}elseif(empty($_FILES[$file]['tmp_name']) || $_FILES[$file]['tmp_name'] == 'none') {
			$error = 'No file was uploaded..';
		}else {
			session_start();
			if(!empty($_SESSION['user_id']))
			{
				$images = new Images($file,'','','/uploadfile/'.$_SESSION['sys_domainname'].'/group/'.md5($_POST['groupid']).'/images/avatar/');
				$path = $images->move_uploaded();
				$images->thumb($path,false,0);	//文件比规定的尺寸大则生成缩略图，小则保持原样
				if($path == false){
					$images->get_errMsg();
				}else{
					$msg .= $path;
					$info = $images->getImageInfo($_SERVER['DOCUMENT_ROOT'].$path);
					$width = $info['width'];
					$height = $info['height'];
				}			
				@unlink($_FILES[$file]);	
			}	
		}	
	}	
	echo "{";
	echo		"error: '" . $error . "',\n";
	echo		"msg: '" . $msg . "',\n";
	echo		"width: '". $width . "',\n";
	echo		"height: '". $height . "'\n";
	echo "}";		
?>