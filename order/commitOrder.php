<?php
	//提交订单
	session_start();
	require_once('../include/zf_order.php');
	require_once('../include/zf_product.php');
	date_default_timezone_set('PRC');
	$ret = array('res'=>null,'status'=>'lose','errorMes'=>'程序错误');
	if(isset($_POST['user_id'])){
		$user_id = $_POST['user_id'];
		$pro_num = $_POST['pro_num'];
		$product_id = $_POST['product_id'];
		$delivery_way_id = rand(1,5);		//查出快递方式
		$delivery_mes_id = $_POST['delivery_mes_id'];		//发货信息id
		$sql = "select * from zf_delivery_mes where delivery_mes_id = $delivery_mes_id";
		$result = execQuery($sql);
		$delivery_mes = $result[0]['delivery_address'].'/'.$result[0]['receM_name'].'/'.$result[0]['receM_phone'];
		
		//记录日志，用于调试
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("order_log.txt","a");
		$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s");
		fwrite($file,$record."   上传用户id是：".$user_id."  商品数量：".$pro_num." 商品id：".$product_id." 发货地址id: ".$delivery_mes_id."\r");  
		fclose($file);
		
		//echo $delivery_mes;
		$date = date('Y-m-d H:i:s');
		$rs = checkProById($product_id);		//检查是否有该商品
		if(count($rs)!=0){
			$ret = placeOrder($rs,$product_id,$user_id,$pro_num,$delivery_way_id,$delivery_mes);	//处理提交的订单数据
			if($ret!=-1){
				$ret = array('res'=>'','status'=>'success','errorMes'=>'');
			}
		}			
	}
	echo json_encode($ret);
?>