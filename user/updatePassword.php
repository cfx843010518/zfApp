<?php
	//用于用户登陆后直接修改密码
	require_once('../unit/writeLog.php');
	require_once('../include/zf_user.php');
	record();
	$ret = -1;
	if(isset($_POST['user_id'])){
		$user_id = $_POST['user_id'];
		$rs = getUserById($user_id);
		if(count($rs)!=0){
			$user_password = $_POST['user_password'];
			$sql = "update zf_user set user_password = $user_password where user_id=$user_id";
			$ret = execUpdate($sql);
		}
	}
	echo $ret;
?>