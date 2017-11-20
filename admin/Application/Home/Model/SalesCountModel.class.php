<?php
namespace Home\Model;
use Think\Model;
class SalesCountModel extends model{
	//找出所有订单的情况
	public function getAllOrderReport($start,$size){
		$query = $this->join('zf_order ON zf_sales_count.order_id = zf_order.order_id')->limit($start,$size)->select();
		return $query;
	}
	
	//根据时间找出所有订单的情况记录，用于分页
	public function getOrderReportByDate1($order_date_year,$order_date_month){
		if($order_date_month<10){
			$order_date_month = '0'.$order_date_month;
		}
		$conditionStr = $order_date_year.'-'.$order_date_month;
		//echo $conditionStr;
		$condition['order_date'] = array('like',$conditionStr.'%');
		$query = $this->where($condition)->join('zf_order ON zf_sales_count.order_id = zf_order.order_id')->select();
		return $query;
	}
	
	//根据时间找出所有订单的情况
	public function getOrderReportByDate2($start,$size,$order_date_year,$order_date_month){
		if($order_date_month<10){
			$order_date_month = '0'.$order_date_month;
		}
		$conditionStr = $order_date_year.'-'.$order_date_month;
		//echo $conditionStr;
		$condition['order_date'] = array('like',$conditionStr.'%');
		$query = $this->where($condition)->join('zf_order ON zf_sales_count.order_id = zf_order.order_id')->limit($start,$size)->select();
		return $query;
	}
	
	//查询订单汇总报表并且按年份和月进行查询
	public function orderGathers2($order_date_year,$order_date_month){
		if($order_date_month<10){
			$order_date_month = '0'.$order_date_month;
		}
		$conditionStr = $order_date_year.'-'.$order_date_month;
		$condition['order_date'] = array('like',$conditionStr.'%');
		$query = $this->where($condition)->join('zf_order ON zf_sales_count.order_id = zf_order.order_id')->join('zf_order_item ON zf_order.order_id = zf_order_item.order_id')->join('zf_product ON zf_order_item.product_id = zf_product.product_id')->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->select();
		return $query;
	}
	
	//以当前年份查询该年订单的总报表
	public function orderGathers1($year){
		$conditionStr = $year;
		$condition['order_date'] = array('like',$conditionStr.'%');
		$query = $this->where($condition)->join('zf_order ON zf_sales_count.order_id = zf_order.order_id')->join('zf_order_item ON zf_order.order_id = zf_order_item.order_id')->join('zf_product ON zf_order_item.product_id = zf_product.product_id')->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->select();
		return $query;
	}
	
	//查询订单明细报表并且按年份和月进行查询
	public function orderGathersDeail2($order_date_year,$order_date_month){
		if($order_date_month<10){
			$order_date_month = '0'.$order_date_month;
		}
		$conditionStr = $order_date_year.'-'.$order_date_month;
		$condition['order_date'] = array('like',$conditionStr.'%');
		$query = $this->where($condition)->join('zf_order ON zf_sales_count.order_id = zf_order.order_id')->join('zf_order_item ON zf_order.order_id = zf_order_item.order_id')->join('zf_product ON zf_order_item.product_id = zf_product.product_id')->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_user ON zf_order.user_id = zf_user.user_id')->join('zf_pay ON zf_sales_count.order_id = zf_pay.order_id')->join('zf_pay_way ON zf_pay.pay_way_id = zf_pay_way.pay_way_id')->join('zf_delivery ON zf_sales_count.order_id = zf_delivery.order_id')->join('zf_delivery_way ON zf_delivery.delivery_way_id = zf_delivery_way.delivery_way_id')->select();
		return $query;
	}
	
	//以当前年份查询该年的订单详细总报表
	public function orderGathersDetail1($year){
		$conditionStr = $year;
		$condition['order_date'] = array('like',$conditionStr.'%');
		$query = $this->where($condition)->join('zf_order ON zf_sales_count.order_id = zf_order.order_id')->join('zf_order_item ON zf_order.order_id = zf_order_item.order_id')->join('zf_product ON zf_order_item.product_id = zf_product.product_id')->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_user ON zf_order.user_id = zf_user.user_id')->join('zf_pay ON zf_sales_count.order_id = zf_pay.order_id')->join('zf_pay_way ON zf_pay.pay_way_id = zf_pay_way.pay_way_id')->join('zf_delivery ON zf_sales_count.order_id = zf_delivery.order_id')->join('zf_delivery_way ON zf_delivery.delivery_way_id = zf_delivery_way.delivery_way_id')->select();
		return $query;
	}
	
	
	
}
?>