<?php
	require_once('../include/zf_product.php');
	require_once('../include/zf_user.php');
	require_once('../include/zf_shoppingCar.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'³ÌÐò´íÎó');
	if(isset($_GET['delete_mes'])){
		$delete_mes = $_GET['delete_mes'];
		$rs = json_decode($delete_mes);
		$user_id = $rs->user_id;
		$product_ids = $rs->product_ids;
		foreach($product_ids as $key => $val){
			deleteOne_ShoppingCar($user_id,$val);
		}
		$ret = array('res'=>'','status'=>'success','errorMes'=>'');
	}
	echo json_encode($ret);
	
?>