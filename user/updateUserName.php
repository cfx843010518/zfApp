<?php
	require_once('../include/comm.php');
	require_once('../include/zf_user.php');
	$ret = -1;
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$rs = getUserById($user_id);
		if(count($rs)!=0){
			$user_name = $_GET['user_name'];
			$sql = "update zf_user set user_name='$user_name' where user_id=$user_id";
			$ret = execUpdate($sql);
		}else{
			$ret = 0;
		}
	}
	echo $ret;

?>