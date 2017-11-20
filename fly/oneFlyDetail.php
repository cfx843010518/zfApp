<?php
	require_once('../include/zf_fly.php');
	require_once('../unit/opUrl.php');
	$ret = array('res'=>null,'status'=>'lose');
	$url = getUrl();		//获取项目url
	// substr($url,0,strpos($url, 'flight'));
	$url = substr($url,0,strpos($url, 'fly'));	//获取项目url
	$photoPath = $url.'admin/Public/images/fly/';
	if(isset($_GET['fly_id'])){
		$fly_id = $_GET['fly_id'];
		$sql = "select product_id from zf_fly where fly_id = $fly_id";
		$rs = execQuery($sql);
		if(count($rs)!=0){
			$product_id = $rs[0]['product_id'];
			$sql = "select product_image,supply_product_name,pro_price,is_discount,discount_price,product_introduce from zf_product,zf_supplier_supply,zf_pro_supply where zf_product.product_id=$product_id and zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id and zf_product.product_id = zf_pro_supply.product_id";
			$rs = execQuery($sql);
			if(count($rs)==0){
				$ret = array('res'=>null,'status'=>'lose');
			}
			else{
				$photos = explode('/',$rs[0]['product_image']);
				// var_dump($photos);
				for($i=0;$i<count($photos)-2;$i++){
					$photoes[$i] = array('image'=>$url.'/admin/Public/images/product/'.$photos[$i+1]);	//把除第一张图片拿出来
				}
				if(!isset($photoes)){
					$photoes = null;
				}
				$ret_array = array('pro_image'=>$photoes,'pro_name'=>$rs[0]['supply_product_name'],'pro_price'=>$rs[0]['pro_price'],'is_discount'=>$rs[0]['is_discount'],'dis_price'=>$rs[0]['discount_price'],'pro_introduce'=>$rs[0]['product_introduce'],'image_num'=>count($photos)-2,'one_image'=>$url.'/admin/Public/images/product/'.$photos[0]);		//封装数据
				$ret = array('ret'=>$ret_array,'status'=>'success'); 
			}	
		}
	}
	echo json_encode($ret);


?>