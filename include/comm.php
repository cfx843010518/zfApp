<?php
require_once("config.php");//引入配置文件
/*
* 公共方法集，访问数据库
*/
date_default_timezone_set('PRC');
function get_Connect(){
	$connection = mysql_connect($GLOBALS["cfg"]["server"]["adds"],$GLOBALS["cfg"]["server"]["db_user"],$GLOBALS["cfg"]["server"]["db_psw"]) or die (header("location: ./error.php?msg=数据库服务器参数错误"));
	$db = mysql_select_db($GLOBALS["cfg"]["server"]["db_name"],$connection) or die (header("http://localhost:80/testApp/error.php?msg=数据库名不正确"));
	//$db = mysql_select_db($GLOBALS["cfg"]["server"]["db_name"],$connection); // or die (header("http://localhost:80/testApp/error.php?msg=数据库名不正确"));
	mysql_query("set names utf8");
	return $connection;
}
/**
* 执行查询操作
*/
function execQuery($strQuery){
	$results = array();
	$connection = get_Connect();
	//$rs = mysql_query($strQuery,$connection) or die (header("Location:http://localhost/zfApp/error.php?msg=查询失败"));
	$rs = mysql_query($strQuery,$connection); // or die (header("http://localhost:80/testApp/error.php?msg=查询失败"));
	if($rs){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$results[$i] = mysql_fetch_assoc($rs);//读取一条记录
		}
		mysql_free_result($rs);//释放结果集
		mysql_close();//关闭连接
		return $results;//返回查询结果
	}
}


/**
* 对数据表记录执行修改、删除和插入操作 header("location: ./error.php?msg=数据表操作失败")
* @param <type> $strUpdate  sql语句
*/
function execUpdate($strUpdate){
	$connection = get_Connect();
	//执行SQL语句
	//$rs = mysql_query($strUpdate,$connection) or die (header("http://localhost:80/testApp/error.php?msg=数据表操作失败"));
	$rs = mysql_query($strUpdate,$connection);
	mysql_close();
	if($rs){
		return 1;
	}else{
		return -1;
	}
}
//获取自增id
function getAutoId($sql){
	$rs = execQuery($sql);
	if(count($rs)!=0){
		return $rs[0]['auto_id'];
	}
}
?>