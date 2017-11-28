<?php
	require_once('../include/zf_order.php');
	require_once('../unit/writeLog.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'程序错误');
	if(isset($_POST['orderMes'])){
		$orderMes = $_POST['orderMes'];
		//recordManyOrder($orderMes);			//写日志
		//
		$orderMes = json_decode($orderMes);
		//var_dump($orderMes);
		$user_id = $orderMes->user_id;
		$products = $orderMes->res;			//接受res(对象数组)
		$delivery_mes_id = $orderMes->delivery_mes_id;	//发货信息id
		$delivery_way_id = rand(1,5);		//查出快递方式
		$sql = "select * from zf_delivery_mes where delivery_mes_id = $delivery_mes_id";	//根据地址id,查出用户地址
		$result = execQuery($sql);
		$delivery_mes = $result[0]['delivery_address'].'/'.$result[0]['receM_name'].'/'.$result[0]['receM_phone'];
		$return = placeOrder2($user_id,$delivery_way_id,$delivery_mes,$products);	//处理提交的订单数据
		if($return!= -1){
			$ret = array('res'=>array('order_id'=>$ret),'status'=>'success','errorMes'=>'');
		}
	}
	echo json_encode($ret);
?>