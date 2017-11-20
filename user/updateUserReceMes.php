<?php
	date_default_timezone_set('PRC');
	require_once('../include/zf_delivery_mes.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['delivery_mes_id'])){
		$delivery_mes_id = $_GET['delivery_mes_id'];
		$delivery_address = $_GET['delivery_address'];
		$receM_name = $_GET['receM_name'];
		$receM_phone = $_GET['receM_phone'];
		$sql = "select * from zf_delivery_mes where delivery_mes_id=$delivery_mes_id";	//先查询表中是否有这个记录
		$rs = execQuery($sql);
		if(count($rs)!=0){
			$sql = "update zf_delivery_mes set delivery_address='$delivery_address',receM_name = '$receM_name',receM_phone='$receM_phone' where delivery_mes_id=$delivery_mes_id";
			$rs = execUpdate($sql);
			//echo $rs;
			if($rs==1){
				$ret = array('res'=>'','status'=>'success','errorMes'=>'');
			}
		}
		else{
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'无该地址信息');
		}
	}
	echo json_encode($ret);
?>