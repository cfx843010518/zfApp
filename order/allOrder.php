<?php
	//查询用户所有订单
	require_once('../include/zf_order.php');
	require_once('../include/zf_product.php');
	date_default_timezone_set('PRC');
	$ret = array('res'=>null,'status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];	//获取用户ID
		$condition['user_id'] = $user_id;
		$sql = "select * from zf_order where user_id = $user_id";
		$rs = execQuery($sql);
		if(count($rs)!=0){
			//再去查询该订单下的所有商品
			foreach($rs as $key => $val){
				$order_id = $val['order_id'];
				$sql2 = "select supply_product_name,pro_prices,pro_num,order_item_id,order_id from zf_order_item,zf_product,zf_supplier_supply where order_id=$order_id and zf_order_item.product_id = zf_product.product_id and zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id";
				$rs2 = execQuery($sql2);		//找出该订单下的所有商品
				$rs[$key]['products'] = $rs2;
				$rs[$key]['product_num'] = count($rs2);
			}
			$ret = array('res'=>$rs,'status'=>'success','errorMes'=>'');
		}
		else{
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'该用户暂无订单');
		}
	}
	echo json_encode($ret);
?>