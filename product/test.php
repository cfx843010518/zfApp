<?php
//把相关类别的商品查出来
	 // require_once('../include/comm.php');
	 // if(isset($_GET['product_id'])){
		// $product_id = $_GET['product_id'];
		// $sql ="select pro_type_id from zf_product,zf_supplier_supply where product_id=$product_id and zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id";
		// $rs = execQuery($sql);
		// $pro_type_id =  $rs[0]['pro_type_id'];	//得到pro_type_id
		// $sql = "select supply_product_name,pro_price,product_image,product_id from zf_supplier_supply,zf_product where pro_type_id=$pro_type_id and zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id";
		// $rs = execQuery($sql);
		// foreach($rs as $key=>$val){
			// $photos = explode('/',$val['product_image']);
			// $photo = $photos[0];
			// $same_type_pro[$key] = array('product_id'=>$val['product_id'],'pro_image'=>$photo,'pro_price'=>$val['pro_price']);
		// }
		// $recommended = array('recommended'=>$same_type_pro);
		// echo json_encode($recommended);
	 // }
	 //echo $_SERVER['HTTP_REFERER'];
	
	
	//拿出所有商品的算法
	/*
	require_once('../include/comm.php');	
	require_once('../unit/writeLog.php');
	record();		//记录日志
	$PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF, '/')+1);		//获取项目的url
	$sql = "select product_id,supply_product_name,product_image,pro_price from zf_product,zf_supplier_supply where zf_product.supplier_supply_id=zf_supplier_supply.supplier_supply_id";
	$rs = execQuery($sql);
	foreach($rs as $key=>$value){
		$photos = explode('/',$value['product_image']);
		//print_r($photos[0]);
		$res[$key] = array('product_id'=>$value['product_id'],'pro_name'=>$value['supply_product_name'],'pro_image'=>$url.'image/'.$photos[0],'pro_price'=>$value['pro_price']);
	}
	//print_r($res);
	$All_Pro = array('All_Pro'=>$res,'mes_num'=>count($rs));
	echo json_encode($All_Pro);*/
	
















	
?>