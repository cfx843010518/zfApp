<?php
namespace Home\Model;
use Think\Model;
class DeliveryModel extends model{

	//���Ӳ�ѯ��ȡ�������ջ���Ϣ
	public function getOrderDetailOthMes($order_id){
		$condition['order_id'] = $order_id;
		$orderDetailOthMes = $this->where($condition)->join('zf_delivery_way ON zf_delivery.delivery_way_id = zf_delivery_way.delivery_way_id')->find();
		return $orderDetailOthMes;
	}
}
?>