<?php
	//通过商品id获取单个商品的详细信息
	require_once('../include/comm.php');
	require_once('../unit/writeLog.php');
	record();		//记录日志
	$PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strpos($PHP_SELF, 'zfApp')+strlen('zfApp'));		//获取项目的url
	$ret = array('res'=>'','statut' => 'lose','errorMes'=>'程序错误');
	if(isset($_GET['product_id'])){
		$product_id = $_GET['product_id'];
		//$sql = "select * from zf_product,zf_supplier_supply,zf_pro_supply where zf_product.product_id=$product_id and zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id and zf_product.product_id = zf_pro_supply.product_id";
		$sql = "select pro_type_id,product_image,supply_product_name,pro_price,salesPromotion,groupBuying,HolidayPreferences,product_introduce from zf_product,zf_supplier_supply,zf_pro_supply,zf_discount where zf_product.product_id=$product_id and zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id and zf_product.product_id = zf_pro_supply.product_id and zf_product.product_id = zf_discount.product_id";
		$rs = execQuery($sql);
		if(count($rs)==0){
			$ret = array('res'=>'','statu' => 'lose','errorMes'=>'商品不存在');
		}
		else{
			$photos = explode('/',$rs[0]['product_image']);
			// var_dump($photos);
			for($i=1;$i<count($photos)-1;$i++){
				$photoes[] = array('image'=>$url.'/admin/Public/images/product/'.$photos[$i]);	//把除第一张图片拿出来
			}
			if(!isset($photoes)){
				$photoes = null;
			}
			//将用户评价找出来
			$sql2 = "select appraise_id,product_id,user_name,appraise_grade,appraise,date from zf_appraise,zf_user where product_id = $product_id and zf_appraise.user_id = zf_user.user_id";
			$rs2 = execQuery($sql2);
			//var_dump($rs2);
			$ret_array = array('pro_image'=>$photoes,'pro_name'=>$rs[0]['supply_product_name'],'pro_price'=>$rs[0]['pro_price'],'salesPromotion'=>$rs[0]['salesPromotion'],'groupBuying'=>$rs[0]['groupBuying'],'HolidayPreferences'=>$rs[0]['HolidayPreferences'],'pro_introduce'=>$rs[0]['product_introduce'],'user_appraise'=>$rs2,'appraise_num'=>count($rs2),'image_num'=>count($photos)-2);		//封装数据
			
			//将同类商品也找出来
			$pro_type_id = $rs[0]['pro_type_id'];
			$sql3 = "select product_id,product_image,supply_product_name,pro_price from zf_product,zf_supplier_supply where zf_supplier_supply.pro_type_id=$pro_type_id and zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id";
			$rs3 = execQuery($sql3);
			//重新封装下数据
			foreach($rs3 as $key => $val){
				$myPhotoS = $val['product_image'];
				$myPhoto = explode('/',$myPhotoS);
				//echo $myPhoto[0];
				$rs3[$key]['product_image'] = $url.'/admin/Public/images/product/'.$myPhoto[0];
			}
			$ret = array('res'=>$ret_array,'res_same'=>$rs3,'res_same_num' =>count($rs3),'statut' => 'success','errorMes'=>'');
		}
	}
	echo json_encode($ret);
?>