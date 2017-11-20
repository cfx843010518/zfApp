<?php
	require_once('../include/zf_user.php');
	require_once('../unit/writeLog.php');
	require_once('../unit/opUrl.php');
	session_start();
	$ret = array('res'=>null,'status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$rs = updateOnline(0,$user_id);		 //注销
		if($rs==1){
			$ret = array('res'=>null,'status'=>'success','errorMes'=>'');
		}
	}
	echo json_encode($ret);  
?>