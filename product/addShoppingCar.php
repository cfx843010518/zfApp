<?php
	require_once('../include/zf_product.php');
	require_once('../include/zf_user.php');
	require_once('../include/zf_shoppingCar.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$product_id = $_GET['product_id'];
		$pro_num = $_GET['pro_num'];
		// 首先判断商品和用户是否存在
		$rs1 = checkProById($product_id);
		$rs2 = getUserById($user_id);
		if(count($rs1)!=0&&count($rs2)!=0){
			$rs = getOneShoppingCarMes($user_id,$product_id);
			if(count($rs)==0){
				//如果不存在说明是第一次购买
				$ret = addShoppingCar($user_id,$product_id,$pro_num);
			}
			else{
				//如果存在，则数量往上加
				$sql = "update zf_shopping_car set pro_num = pro_num+$pro_num where product_id = $product_id and user_id = $user_id";
				$ret = execUpdate($sql);
				if($ret==1){
					$sql = "select pro_num from zf_shopping_car where user_id=$user_id and product_id=$product_id";//此查询为了保证购物车的数量不能超过100
					$rs = execQuery($sql);	
					if($rs[0]['pro_num']>100){
						$sql = "update zf_shopping_car set pro_num = 100 where product_id = $product_id and user_id = $user_id";
						execUpdate($sql);
					}
				}	
			}
			$ret = array('res'=>'','status'=>'success','errorMes'=>'');
		}else{
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'用户或商品不存在');
		}
		
	}
	echo json_encode($ret);
?>