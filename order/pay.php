<?php
	//付款成功后
	require_once('../include/zf_pay.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_POST['order_id'])){
		$order_id = $_POST['order_id'];
		$result = pay($order_id);
		if($result==1){
			$ret = array('res'=>'','status'=>'success','errorMes'=>'');
		}
	}
	echo json_encode($ret);
?>