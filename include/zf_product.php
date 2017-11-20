<?php
	require_once('comm.php');
	//通过商品id查找商品的基本信息
	function getProById($pro_id){
		$sql = "select product_id,supply_product_name,product_image,pro_price from zf_product,zf_supplier_supply where zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id and product_id=$pro_id";
		$rs = execQuery($sql);
		return $rs;
	}
	
	//用于检查是否有这个商品
	function checkProById($product_id){
		$sql = "select * from zf_product where product_id=$product_id";
		$rs = execQuery($sql);
		return $rs;
	}

?>