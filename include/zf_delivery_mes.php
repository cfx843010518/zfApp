<?php
	require_once('comm.php');
	//通过用户id获取用户收获信息
	function getUserReMesById($user_id){
		$sql = "select * from zf_delivery_mes where user_id=$user_id";
		$rs = execQuery($sql);
		return $rs;
	}
	
	//通过收获id获取用户收获信息
	function getUserReceMesByKey($delivery_mes_id){
		$sql = "select * from zf_delivery_mes where delivery_mes_id = $delivery_mes_id";
		$rs = execQuery($sql);
		return $rs;
	}
	
?>