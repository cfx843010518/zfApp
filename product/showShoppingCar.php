<?php
	require_once('../include/zf_shoppingCar.php');
	require_once('../include/zf_product.php');
	require_once('../unit/opUrl.php');
	$PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strpos($PHP_SELF, 'zfApp')+strlen('zfApp'));		//获取项目的url
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$sql = "select * from zf_shopping_car where user_id = $user_id";		//查询某个用户买了什么东西
		$rs = execQuery($sql);
		if(count($rs)==0){
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'购物车为空');
		}else{
			foreach($rs as $key=>$val){
				$product_id = $val['product_id'];
				$result = getProById($product_id);
				$photos = explode('/',$result[0]['product_image']);	//肢解图片路径
				$rea[$key] = array('product_id'=>$result[0]['product_id'],'pro_name'=>$result[0]['supply_product_name'],'pro_image'=>$url.'/admin/Public/images/product/'.$photos[0],'pro_price'=>$result[0]['pro_price'],'pro_num'=>$val['pro_num']);
			}
			$return = array('mes'=>$rea,'mes_num'=>count($rs));		//这个变量需要修改
			$ret = array('res'=>$return,'status'=>'success','errorMes'=>'');
		}
	}
	echo json_encode($ret);
?>
