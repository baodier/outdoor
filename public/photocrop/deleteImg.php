<?php
	session_start();
	if(!empty($_SESSION['user_id']))
	{
		if(isset($_GET['delete'])) {
			$path_input = dirname($_GET['delete']);
			$avater_path = '/uploadfile/'.$_SESSION['sys_domainname'].'/person/'.md5($_SESSION['user_id']).'/images/avatar';
			if($path_input==$avater_path)
			{
				$path = $_SERVER['DOCUMENT_ROOT'].$_GET['delete'];	
				@unlink($path);
			}
		}
	}
?>