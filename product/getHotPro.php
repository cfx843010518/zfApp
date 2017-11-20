<?php
	//获取销量前2的热销商品
	require_once('../include/zf_product.php');
	require_once('../unit/writeLog.php');
	$All_Pro = array('All_Pro'=>array(),'mes_num'=>0);
	record();		//记录日志
	$PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strpos($PHP_SELF, 'zfApp')+strlen('zfApp'));		//获取项目的url
	
	$sql = "select product_id,count(product_id) num from zf_order_item group by product_id order by num desc limit 0,2;";	//统计出前15商品的product_id,用于查询
	$rs = execQuery($sql);
	if(count($rs)>=2){
		foreach($rs as $key=>$val){
			$pro_id = $val['product_id'];	
			$result = getProById($pro_id);
			//print_r($result);
			$photos = explode('/',$result[0]['product_image']);	// 以/肢解图片路径
			$res[$key] = array('product_id'=>$result[0]['product_id'],'pro_name'=>$result[0]['supply_product_name'],'pro_image'=>$url.'/admin/Public/images/product/'.$photos[0],'pro_price'=>$result[0]['pro_price']);
		}
		//print_r($res);
		$All_Pro = array('All_Pro'=>$res,'mes_num'=>count($rs));
	}
	else{
		$sql = "select * from zf_product limit 0,2";
		$rs1 = execQuery($sql);
		foreach($rs1 as $key=>$val){
			$pro_id = $val['product_id'];	
			$result = getProById($pro_id);
			//print_r($result);
			$photos = explode('/',$result[0]['product_image']);	// 以/肢解图片路径
			$res[$key] = array('product_id'=>$result[0]['product_id'],'pro_name'=>$result[0]['supply_product_name'],'pro_image'=>$url.'/admin/Public/images/product/'.$photos[0],'pro_price'=>$result[0]['pro_price']);
		}
		$All_Pro = array('All_Pro'=>$res,'mes_num'=>count($rs));
	}
	echo json_encode($All_Pro);		//返回json数据
	
?>