<?php
	require_once('../include/zf_order.php');
	require_once('../unit/writeLog.php');
	$ret = array('res'=>'','status'=>'lose','errorMes'=>'�������');
	if(isset($_POST['orderMes'])){
		$orderMes = $_POST['orderMes'];
		//recordManyOrder($orderMes);			//д��־
		//
		$orderMes = json_decode($orderMes);
		//var_dump($orderMes);
		$user_id = $orderMes->user_id;
		$products = $orderMes->res;			//����res(��������)
		$delivery_mes_id = $orderMes->delivery_mes_id;	//������Ϣid
		$delivery_way_id = rand(1,5);		//�����ݷ�ʽ
		$sql = "select * from zf_delivery_mes where delivery_mes_id = $delivery_mes_id";	//���ݵ�ַid,����û���ַ
		$result = execQuery($sql);
		$delivery_mes = $result[0]['delivery_address'].'/'.$result[0]['receM_name'].'/'.$result[0]['receM_phone'];
		$return = placeOrder2($user_id,$delivery_way_id,$delivery_mes,$products);	//�����ύ�Ķ�������
		if($return!= -1){
			$ret = array('res'=>array('order_id'=>$ret),'status'=>'success','errorMes'=>'');
		}
	}
	echo json_encode($ret);
?>