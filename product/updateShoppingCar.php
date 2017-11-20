<?php
	//修改购物车中商品的数量
	require_once('../include/zf_product.php');
	require_once('../include/zf_user.php');
	require_once('../include/zf_shoppingCar.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$product_id = $_GET['product_id'];
		$pro_num = $_GET['pro_num'];
		// 首先判断商品和用户是否存在
		$rs1 = checkProById($product_id);
		$rs2 = getUserById($user_id);
		if(count($rs1)!=0&&count($rs2)!=0){
			//判断购物车表中是否有该数据
			$rs = getOneShoppingCarMes($user_id,$product_id);
			if(count($rs)!=0){			
			//修改购物车中商品的数量
				$sql = "update zf_shopping_car set pro_num = $pro_num where product_id = $product_id and user_id = $user_id";
				$ret = execUpdate($sql);
				if($ret==1){
					$sql = "select pro_num from zf_shopping_car where user_id=$user_id and product_id=$product_id";//此查询为了保证购物车的数量不能超过100
					$rs = execQuery($sql);		//如果购物车数量超过一百，改为100;
					if($rs[0]['pro_num']>100){
						$sql = "update zf_shopping_car set pro_num = 100 where product_id = $product_id and user_id = $user_id";
						$ret = execUpdate($sql);
					}else if($rs[0]['pro_num']==0){		//如果数量等于零，移除该商品
						$ret = deleteOne_ShoppingCar($user_id,$product_id);
					}
				}
			}else{
				//没有购物数据，添加购物数据
				$ret = addShoppingCar($user_id,$product_id,$pro_num);
			}
			$ret = array('res'=>'','status'=>'success','errorMes'=>'');	
		}else{
			$ret = array('res'=>'','status'=>'lose','errorMes'=>'用户或商品不存在');
		}
	}
	echo json_encode($ret);
?>