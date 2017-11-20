<?php
	require_once('comm.php');
	//通过用户id和商品id查找某条记录
	function getOneShoppingCarMes($user_id,$product_id){
		$sql = "select * from zf_shopping_car where user_id=$user_id and product_id=$product_id";
		$rs = execQuery($sql);
		return $rs;
	}
	
	//通过用户id和商品id删除某条记录
	function deleteOne_ShoppingCar($user_id,$product_id){
		$sql = "delete from zf_shopping_car where user_id = $user_id and product_id=$product_id";
		$rs = execUpdate($sql);
		return $rs;
	}
	
	//通过用户id,商品id,商品数量为用户购物车加入某件商品
	function addShoppingCar($user_id,$product_id,$pro_num){
		$sql = "insert into zf_shopping_car(product_id,user_id,pro_num) value($product_id,$user_id,$pro_num)";
		$ret = execUpdate($sql);
		return $ret;
	}
?>