<?php
	require_once('../include/zf_order.php');
	$ret = array('res'=>array(),'status'=>'lose','mes_num'=>0);
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		//$sql = "select * from zf_order left join zf_order_item ON zf_order_item.order_id = zf_order.order_id ";
		//$sql = "select * from zf_order,zf_order_item where zf_order.user_id = $user_id and zf_order.order_id = zf_order_item.order_id";
		$sql = "select * from zf_order,zf_order_status where user_id = $user_id and zf_order.order_status_id = zf_order_status.order_status_id";
		$rs1 = execQuery($sql);
		if(count($rs1)!=0){
			foreach($rs1 as $key=>$val){
				$order_id = $val['order_id'];
				$order_status = $val['order_status'];		//获取订单状态
				$sql = "select zf_order.order_id,supply_product_name,zf_order_item.pro_prices,pro_num from zf_order,zf_order_item,zf_product,zf_supplier_supply where zf_order.order_id = $order_id and zf_order.order_id = zf_order_item.order_id and zf_order_item.product_id = zf_product.product_id and zf_supplier_supply.supplier_supply_id = zf_product.supplier_supply_id";
				$rs2 = execQuery($sql);
				$ret = array('order_id'=>$order_id,'order_status'=>$order_status,'products'=>$rs2,'product_num'=>count($rs2));		//将该订单的商品放入
				$list[$key] = $ret;
			}
			$ret = array('res'=>$list,'mes_num'=>count($rs1),'status'=>'success');
		}
		
		//$sql = "select zf_order.order_id,supply_product_name,zf_order_item.pro_price,pro_num from zf_order,zf_order_item,zf_product,zf_supplier_supply where user_id = $user_id and zf_order.order_id = zf_order_item.order_id and zf_order_item.product_id = zf_product.product_id and zf_supplier_supply.supplier_supply_id = zf_product.supplier_supply_id";
		//$rs = execQuery($sql);
		//var_dump($rs);
		//$ret = array('res'=>$rs,'status'=>'success','mes_num'=>count($rs));
	}
	echo json_encode($ret);

?>