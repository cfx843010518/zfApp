<?php
	//�ύ����
	session_start();
	require_once('../include/zf_order.php');
	require_once('../include/zf_product.php');
	date_default_timezone_set('PRC');
	$ret = array('res'=>null,'status'=>'lose','errorMes'=>'�������');
	if(isset($_POST['user_id'])){
		$user_id = $_POST['user_id'];
		$pro_num = $_POST['pro_num'];
		$product_id = $_POST['product_id'];
		$delivery_way_id = rand(1,5);		//�����ݷ�ʽ
		$delivery_mes_id = $_POST['delivery_mes_id'];		//������Ϣid
		$sql = "select * from zf_delivery_mes where delivery_mes_id = $delivery_mes_id";
		$result = execQuery($sql);
		$delivery_mes = $result[0]['delivery_address'].'/'.$result[0]['receM_name'].'/'.$result[0]['receM_phone'];
		
		//��¼��־�����ڵ���
		$ip = $_SERVER['REMOTE_ADDR'];
		$file = fopen("order_log.txt","a");
		$record = "ip��ַΪ:".$ip."���ڷ��ʣ�����ʱ���ǣ�".date("Y-m-d H:i:s");
		fwrite($file,$record."   �ϴ��û�id�ǣ�".$user_id."  ��Ʒ������".$pro_num." ��Ʒid��".$product_id." ������ַid: ".$delivery_mes_id."\r");  
		fclose($file);
		
		//echo $delivery_mes;
		$date = date('Y-m-d H:i:s');
		$rs = checkProById($product_id);		//����Ƿ��и���Ʒ
		if(count($rs)!=0){
			$ret = placeOrder($rs,$product_id,$user_id,$pro_num,$delivery_way_id,$delivery_mes);	//�����ύ�Ķ�������
			if($ret!=-1){
				$ret = array('res'=>'','status'=>'success','errorMes'=>'');
			}
		}			
	}
	echo json_encode($ret);
?>