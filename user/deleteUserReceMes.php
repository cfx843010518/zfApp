<?php
	require_once('../include/zf_delivery_mes.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['delivery_mes_id'])){
		$delivery_mes_id = $_GET['delivery_mes_id'];
		$rs = getUserReceMesByKey($delivery_mes_id);
		if(count($rs)!=0){
			$sql = "delete from zf_delivery_mes where delivery_mes_id = $delivery_mes_id";
			$ret = execUpdate($sql);
			$ret = array('res'=>'','status'=>'success','errorMes'=>'');
		}
		else{
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'记录不存在');
		}
	}
	echo json_encode($ret);

?>