<?php
	require_once('comm.php');
	//用户付款的操作
	function pay($order_id){
		$ret = -1;
		$con = get_Connect();
		mysql_query("SET AUTOCOMMIT=0",$con);	//设置手动提交事务
		$sql = "update zf_order set order_status_id=2 where order_id=$order_id";	//修改订单表中的订单状态
		$re1 = mysql_query($sql,$con);
		$pay_date = date("Y-m-d H:i:s");
		$sql = "insert into zf_pay(pay_status_id,pay_way_id,order_id,pay_date) value(2,2,$order_id,'$pay_date')";	//往支付表插入一条记录
		$re2 = mysql_query($sql,$con);
		// 算出订单的一些信息
		$sql = "select product_id,pro_prices,pro_num from zf_order_item where order_id = $order_id";
		$rs = execQuery($sql);
		$order_sum_price = 0;
		foreach($rs as $key=>$val){
			$order_sum_price += $val['pro_prices'] * $val['pro_num'];	//算出订单总价
		}
		$cost_price = 0;
		$sql = "select trade_price,pro_num from zf_pro_supply,zf_order_item where order_id = $order_id and zf_order_item.product_id = zf_pro_supply.product_id";
		$rs = execQuery($sql);
		foreach($rs as $key=>$val){
			$cost_price += $val['trade_price'] * $val['pro_num'];			//算出订单成本价
		}
		// echo $cost_price;
		// echo $rs[0]['pro_num'];
		$profit_amount = $order_sum_price - $cost_price;					//算出盈利金额
		$profit_margin = ($order_sum_price - $cost_price)/$order_sum_price*100;
		$profit_margin = substr($profit_margin,0,5).'%';								//算出盈利率	
		//echo $profit_margin;
		// print_r($rs);
		// 往销售情况统计表插入一条数据
		$sql = "insert into zf_sales_count(order_id,cost_price,order_sum_price,profit_amount,profit_margin) value($order_id,$cost_price,$order_sum_price,$profit_amount,'$profit_margin')";
		$re3 = mysql_query($sql,$con);
		// echo $re1;
		// echo $re2;
		// echo $re3;
		if($re1&&$re2&&$re3){
			mysql_query("COMMIT",$con);
			//下单成功后，商品表中的库存量要减去
			mysql_query("SET AUTOCOMMIT=1",$con);	
			$sql = "select product_id,pro_num from zf_order_item where order_id = $order_id";
			$rs = execQuery($sql);
			foreach($rs as $key=>$val){
				$num = $val['pro_num'];
				$proid = $val['product_id']; 
				$sql = "update zf_product set stock_size = stock_size - $num where product_id = $proid";	//商品表中的库存数量减去
				execUpdate($sql);
			}
			$ret = 1;
		}else{
			mysql_query("ROLLBACK",$con);
		}
		mysql_close($con);
		return $ret;
	}
?>