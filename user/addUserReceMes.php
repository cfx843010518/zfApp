<?php
	require_once('../include/zf_delivery_mes.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$delivery_address = $_GET['delivery_address'];
		$receM_name = $_GET['receM_name'];
		$receM_phone = $_GET['receM_phone'];
		$sql = "insert into zf_delivery_mes(user_id,delivery_address,receM_name,receM_phone) value($user_id,'$delivery_address','$receM_name','$receM_phone')";
		$rs = execUpdate($sql);
		if($rs==1){
			$ret = array('res'=>'','status'=>'success','errorMes'=>'');
		}
	}
	echo json_encode($ret);
?>