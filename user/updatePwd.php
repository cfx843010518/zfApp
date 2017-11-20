<?php
	//用于忘记密码的确认后更新用户的密码
	require_once('../unit/writeLog.php');
	require_once('../include/zf_user.php');
	record();
	$ret = -1;
	if(isset($_POST['user_account'])){
		$user_account = $_POST['user_account'];
		$rs = getUserByAccount($user_account);
		if(count($rs)!=0){
			$user_password = $_POST['user_password'];
			$sql = "update zf_user set user_password='$user_password' where user_account='$user_account'";
			$ret =  execUpdate($sql);
		}else{
			$ret = 0;
		}
	}
	echo $ret
?>