<?php
/*
* 初始变量
*/
//数据库服务器参数配置
$cfg["server"]["adds"]="localhost";
$cfg["server"]["db_user"]="root";
$cfg["server"]["db_psw"]="123";
$cfg["server"]["db_name"]="zf_shop";
$cfg["server"]["page_size"]=20;
/**
*论坛错误处理方法
* @param <type> $errno 错误编号
* @param <type> $errstr 错误信息
*/
function bbsError($errno,$errstr){
	//使用header函数将错误信息转发到错误显示页面
	die(header("location: ./error.php?msg=$errstr"));	
}
//设置错误捕获器
//set_error_handler("bbsError",E_ERROR);
?>
