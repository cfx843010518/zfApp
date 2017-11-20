<?php
namespace Home\Model;
use Think\Model;
class OrderItemModel extends model{
	//���ݶ���ID���Ӳ�ѯ��ȡ������ϸ����Ʒ��Ϣ
	public function getOrderDetailProMes($order_id){
		$condition['order_id'] = $order_id;
		$orderDetailProMes = $this->where($condition)->join('zf_product ON zf_order_item.product_id = zf_product.product_id')->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_discount ON zf_product.product_id = zf_discount.product_id')->select();
		return $orderDetailProMes;
	}
	
	
}
?>