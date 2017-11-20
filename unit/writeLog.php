<?php
	//记录访问者的简单日志文件读写
	date_default_timezone_set('PRC');
	function record(){
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("log.txt","a");
		$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s");
		fwrite($file,$record."\r");  
		fclose($file);  
	}
	
	//记录注册信息
	function recordReg($user_register){
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("reg_log.txt","a");
		$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s");
		fwrite($file,$record.'   访问变量：'.$user_register."\r");  
		fclose($file); 
	}
	
	//记录上传的照片信息
	function recoreImg($target_path,$img_type,$img_size){
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("reg_Img.txt","a");
		$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s");
		fwrite($file,$record."   上传图片是：".$target_path."  图片类型：".$img_type."  图片大小是：".$img_size."\r");  
		fclose($file); 
	}
	
	//记录登录的用户信息
	function recordLogin($user){
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("reg_Log.txt","a");
		$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s");
		fwrite($file,$record."   用户id：".$user['user_id']."  用户昵称：".$user['user_name']."\r");  
		fclose($file); 
	}
	
	//记录多商品订单信息
	function recordManyOrder($array){
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("recordManyOrder_Log.txt","a");
		$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s");
		fwrite($file,$record."   json数据是 ".$array."\r");  
		fclose($file); 
	}
	
?>