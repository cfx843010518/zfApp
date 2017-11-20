<?php
	//获得某一类的所有商品
	require_once('../include/zf_product.php');
	$PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strpos($PHP_SELF, 'zfApp')+strlen('zfApp'));		//获取项目的url
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['pro_type_id'])){
		$pro_type_id = $_GET['pro_type_id'];
		$sql = "select product_id,supply_product_name,product_image,pro_price from zf_supplier_supply,zf_product where pro_type_id=$pro_type_id and zf_supplier_supply.supplier_supply_id = zf_product.supplier_supply_id";
		$rs = execQuery($sql);		//通过类别查找商品
		//echo count($rs);
		if(count($rs)!=0){
			foreach($rs as $key=>$value){		//把图片路径的第一张图片拿出来
				$photos = explode('/',$value['product_image']);
				//print_r($photos[0]);
				$res[$key] = array('product_id'=>$value['product_id'],'pro_name'=>$value['supply_product_name'],'pro_image'=>$url.'/admin/Public/images/product/'.$photos[0],'pro_price'=>$value['pro_price']);
			}
			$All_Pro = array('All_Pro'=>$res,'mes_num'=>count($rs));
			$ret = $ret = array('res'=>$All_Pro,'status'=>'success','errorMes'=>'');
		}
		else{
			//echo '来到这里';
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'无该类型商品');		//一般都有
		}
	}
	echo json_encode($ret);		//返回重新封装好的json数据
?>