<?php
	//获取所有商品的类别
	require_once('../include/comm.php');
	$ret = array("pro_type"=>array(),'res_num'=>0,'status'=>'lose');
	$sql = "select * from zf_pro_type";
	$rs = execQuery($sql);
	if(count($rs)!=0){
		$ret = array("pro_type"=>$rs,"res_num"=>count($rs),'status'=>'success');
	}
	echo json_encode($ret);
?>