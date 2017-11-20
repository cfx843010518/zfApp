<?php
	require_once('../include/zf_product.php');
	require_once('../include/zf_user.php');
	require_once('../include/zf_shoppingCar.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$product_id = $_GET['product_id'];
		$rs1 = checkProById($product_id);	//判断是否有这个用户和这个商品
		$rs2 = getUserById($user_id);
		if(count($rs1)!=0&&count($rs2)!=0){
			$rs = getOneShoppingCarMes($user_id,$product_id);					//判断是否有这条数据
			if(count($rs)!=0){
				$ret = deleteOne_ShoppingCar($user_id,$product_id);
				$ret = array('res'=>'','status'=>'success','errorMes'=>'');
			}
			else{
				$ret = array('res'=>'','status'=>'lose','errorMes'=>'该记录不存在');
			}
			
		}
		else{
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'用户或商品不存在');
		}
	}
	echo json_encode($ret);
?>