<?php
	require_once('../include/zf_delivery_mes.php');
	require_once('../include/zf_user.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$rs = getUserById($user_id);
		if(count($rs)!=0){
			$rs = getUserReMesById($user_id);
			if(count($rs)!=0){
				$res = array('mes'=>$rs,'mes_num'=>count($rs));
				$ret = array('res'=>$res,'status'=>'success','errorMes'=>'');
			}
		}
	}
	echo json_encode($ret);
?>