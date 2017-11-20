<?php
namespace Home\Model;
use Think\Model;
class AppraiseModel extends model{
	//通过订单id获取对该订单的评价
	public function getAppraiseByOrderId($order_id){
		$condition['zf_order.order_id'] = $order_id;
		$mes = $this->field('appraise_grade,appraise,user_account')->where($condition)->join('zf_order ON zf_appraise.order_id = zf_order.order_id')->join('zf_user ON zf_order.user_id = zf_user.user_id')->find();
		return $mes;
	}
	
}
?>