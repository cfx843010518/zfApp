<?php
require_once("config.php");//���������ļ�
/*
* �������������������ݿ�
*/
date_default_timezone_set('PRC');
function get_Connect(){
	$connection = mysql_connect($GLOBALS["cfg"]["server"]["adds"],$GLOBALS["cfg"]["server"]["db_user"],$GLOBALS["cfg"]["server"]["db_psw"]) or die (header("location: ./error.php?msg=���ݿ��������������"));
	$db = mysql_select_db($GLOBALS["cfg"]["server"]["db_name"],$connection) or die (header("http://localhost:80/testApp/error.php?msg=���ݿ�������ȷ"));
	//$db = mysql_select_db($GLOBALS["cfg"]["server"]["db_name"],$connection); // or die (header("http://localhost:80/testApp/error.php?msg=���ݿ�������ȷ"));
	mysql_query("set names utf8");
	return $connection;
}
/**
* ִ�в�ѯ����
*/
function execQuery($strQuery){
	$results = array();
	$connection = get_Connect();
	//$rs = mysql_query($strQuery,$connection) or die (header("Location:http://localhost/zfApp/error.php?msg=��ѯʧ��"));
	$rs = mysql_query($strQuery,$connection); // or die (header("http://localhost:80/testApp/error.php?msg=��ѯʧ��"));
	if($rs){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$results[$i] = mysql_fetch_assoc($rs);//��ȡһ����¼
		}
		mysql_free_result($rs);//�ͷŽ����
		mysql_close();//�ر�����
		return $results;//���ز�ѯ���
	}
}


/**
* �����ݱ��¼ִ���޸ġ�ɾ���Ͳ������ header("location: ./error.php?msg=���ݱ����ʧ��")
* @param <type> $strUpdate  sql���
*/
function execUpdate($strUpdate){
	$connection = get_Connect();
	//ִ��SQL���
	//$rs = mysql_query($strUpdate,$connection) or die (header("http://localhost:80/testApp/error.php?msg=���ݱ����ʧ��"));
	$rs = mysql_query($strUpdate,$connection);
	mysql_close();
	if($rs){
		return 1;
	}else{
		return -1;
	}
}
//��ȡ����id
function getAutoId($sql){
	$rs = execQuery($sql);
	if(count($rs)!=0){
		return $rs[0]['auto_id'];
	}
}
?>