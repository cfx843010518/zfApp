<?php
	//用于更新某个用户的收获信息
	require_once('../include/comm.php');
	$ret = -1;
	if(isset($_GET['deliver_mes_id'])){
		$deliver_mes_id = $_GET['deliver_mes_id'];
		$delivery_address = $_GET['delivery_address'];
		$receM_name = $_GET['receM_name'];
		$receM_phone = $_GET['receM_phone'];
		//echo $receM_name;
		$sql = "update zf_delivery_mes set delivery_address='$delivery_address',receM_name='$receM_name',receM_phone='$receM_phone' where delivery_mes_id=$deliver_mes_id";
		$ret = execUpdate($sql);
	}
	echo $ret;
?>