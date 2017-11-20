<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends model{
	//连接查询获取订单信息
	public function getAllOrder($condition,$start,$size){
		$orders = $this->join('zf_user ON zf_order.user_id = zf_user.user_id')->join('zf_order_status ON zf_order.order_status_id = zf_order_status.order_status_id')->join('zf_delivery ON zf_order.order_id = zf_delivery.order_id')->join('zf_delivery_way ON zf_delivery.delivery_way_id = zf_delivery_way.delivery_way_id')->where($condition)->order('order_date desc')->limit($start,$size)->select();
		return $orders;
	}
	//获取订单的用户信息
	public function getOrderUserMes($order_id){
		$condition['order_id'] = $order_id;
		$orderUserMes = $this->field('order_status_id,user_account')->where($condition)->join('zf_user ON zf_order.user_id = zf_user.user_id')->find();
		return $orderUserMes;
	}
}
?>