<?php
	error_reporting(7);
	date_default_timezone_set("Asia/Shanghai");
	@header("Content-type:text/html; Charset=utf-8");
	require_once("./image.class.php");
	
	//$file = fopen("log.txt","a+");

	
	session_start();
	if(!empty($_SESSION['user_id']))
	{
		if(isset($_POST['cut'])) {
			
		
			$image = new Images("file");
			$path = $_POST['cut'];
			
			
			//fwrite($file,$path);
			//fwrite($file,"\r\n");
			
			$res = $image->thumb($path,'person',false,1);
			if($res == false){
				echo "裁剪失败";
			}elseif(is_array($res)){
			$patharr1 = explode($_SERVER['DOCUMENT_ROOT'],$res['big']); 
			$patharr2 = explode($_SERVER['DOCUMENT_ROOT'],$res['middle']); 
			$patharr3 = explode($_SERVER['DOCUMENT_ROOT'],$res['small']); 
	//			echo '<img src="'.$res['big'].'" style="margin:10px">';
	//			echo '<img src="'.$res['middle'].'" style="margin:10px">';
	//			echo '<img src="'.$res['small'].'" style="margin:10px">';
				echo json_encode(array('big'=>$patharr1[1],'middle'=>$patharr2[1],'small'=>$patharr3[1]));
			}/* elseif(is_string($res)){
				echo json_encode($res
			} */
		}
	}
	//fclose($file);
?>