<?php
	require_once('comm.php');
	//通过用户名查找用户
	function getUserByAccount($user_account){
		$sql = "select * from zf_user where user_account='$user_account'";
		$rs = execQuery($sql);
		return $rs;
	}
	
	//通过用户ID查找用户
	function getUserById($user_id){
		$sql = "select * from zf_user where user_id=$user_id";
		$rs = execQuery($sql);
		return $rs;
	}
	
	//修改用户在线状态
	function updateOnline($isline,$user_id){
		$sql = "update zf_user set user_online = $isline where user_id = $user_id";
		$rs = execUpdate($sql);
		return $rs;
	}

?>