<?php
	require_once('../include/comm.php');
	//可能会有的一步
	if($_GET['user_account']){
		$user_account = $_GET['user_account'];
		$sql = "select * from zf_user where user_account='$user_account'";
		$rs = execQuery($sql);
		if(count($rs)!=0){
			$user_id = $rs[0]['user_id'];
			//$sql = "select * from zf_order,zf_order_item,zf_order_status,zf_product,zf_supplier_supply where user_id=$user_id and zf_order.order_id=zf_order_item.order_id and zf_order.order_status_id = zf_order_status.order_status_id and zf_order_item.product_id = zf_product.product_id and zf_supplier_supply.supplier_supply_id = zf_product.supplier_supply_id";
			$sql = "select order_status,product_image,left(supply_product_name,20) supply_product_name,zf_product.pro_price from zf_order,zf_order_item,zf_order_status,zf_product,zf_supplier_supply where user_id=$user_id and zf_order.order_id=zf_order_item.order_id and zf_order.order_status_id = zf_order_status.order_status_id and zf_order_item.product_id = zf_product.product_id and zf_supplier_supply.supplier_supply_id = zf_product.supplier_supply_id";
			$rs = execQuery($sql);
			print_r($rs);
		}
	}
?>