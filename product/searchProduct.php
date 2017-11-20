<?php
	$PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF, '/')+1);		//获取项目的url
	require_once('../include/zf_product.php');
	$All_Pro = array('All_Pro'=>array(),'mes_num'=>0,'status'=>'lose');
	if(isset($_GET['searchStr'])){
		$searchStr = $_GET['searchStr'];
		
		//写日志
		date_default_timezone_set('PRC');
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("rec_searchStr.txt","a");
		$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s").'访问变量是：'.$searchStr;
		fwrite($file,$record."\r");  
		fclose($file); 
		
		
		$sql = "select product_id,supply_product_name,product_image,pro_price,discount_price,is_discount from zf_product,zf_supplier_supply where zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id and supply_product_name like '%$searchStr%';";
		$rs = execQuery($sql);
		if(count($rs)!=0){
			foreach($rs as $key=>$val){
				$pro_id = $val['product_id'];	
				$result = getProById($pro_id);
				//print_r($result);
				$photos = explode('/',$result[0]['product_image']);	// 以/肢解图片路径
				$res[$key] = array('product_id'=>$result[0]['product_id'],'pro_name'=>$result[0]['supply_product_name'],'pro_image'=>$url.'image/'.$photos[0],'pro_price'=>$result[0]['pro_price'],'is_discount'=>$result[0]['is_discount'],'dis_price'=>$result[0]['discount_price']);
			}
			//print_r($res);
			$All_Pro = array('All_Pro'=>$res,'mes_num'=>count($rs),'status'=>'success');
		}
	}
	echo json_encode($All_Pro);		//返回json数据
?>