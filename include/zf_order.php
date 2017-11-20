<?php
	require_once('comm.php');
	require_once('zf_product.php');
	
	//提交订单(单个商品)
	function placeOrder($rs,$product_id,$user_id,$pro_num,$delivery_way_id,$delivery_mes){
		$ret = -1;
		$con = get_Connect();
		mysql_query("SET AUTOCOMMIT=0",$con);	//设置手动提交事务
		date_default_timezone_set('PRC');
		$date = date('Y-m-d H:i:s');	//获取当前时间
		$sql = "insert into zf_order(user_id,order_status_id,order_date) value($user_id,1,'$date')";	//往订单表插入一条数据
		$re1 = mysql_query($sql,$con);
			
		// 往订单项表插入一条数据
		$sql = "select max(order_id) auto_id from zf_order";	
		$auto_id = getAutoId($sql);		//获取刚才自增的订单表id
		$sql2 = "select * from zf_discount where product_id = $product_id";
		$discount = execQuery($sql2);
		$pro_prices = $rs[0]['pro_price'];
		$salesPromotion = $discount[0]['salesPromotion'];
		if($salesPromotion!=null){
			$pro_prices = $pro_prices/100*$salesPromotion*10;
		}
		$groupBuying = $discount[0]['groupBuying'];
		// var_dump($groupBuying);
		if($groupBuying!=null){
			$arr = explode('/',$groupBuying);
			if($pro_num>$arr[0]){
				//有团购价
				$pro_prices = $pro_prices/100*$arr[1]*10;
			}
		}
		$HolidayPreferences = $discount[0]['HolidayPreferences'];
		if($HolidayPreferences!=null){
			$pro_prices = $pro_prices/100*$HolidayPreferences*10;
		}
		$sql = "insert into zf_order_item(product_id,pro_prices,order_id,pro_num) value($product_id,$pro_prices,$auto_id,$pro_num)";		//往订单表插入一条数据
		$re2 = mysql_query($sql,$con);
		$sql = "insert into zf_delivery(order_id,delivery_way_id,delivery_mes) value($auto_id,$delivery_way_id,'$delivery_mes')";	//往发货表添加一条记录
		$re3 = mysql_query($sql,$con);
		if($re1&&$re2&&$re3){
			//echo '来到这里没有';
			mysql_query("COMMIT",$con);
			$ret = $auto_id;
		}else{
			mysql_query("ROLLBACK",$con);
		}
		mysql_close($con);//关闭连接
		return $ret;	
	}
	
	//提交订单(多个商品)
	function placeOrder2($user_id,$delivery_way_id,$delivery_mes,$products){
		$ret = -1;
		$con = get_Connect();
		mysql_query("SET AUTOCOMMIT=0",$con);	//设置手动提交事务
		date_default_timezone_set('PRC');
		$date = date('Y-m-d H:i:s');	//获取当前时间
		$sql = "insert into zf_order(user_id,order_status_id,order_date) value($user_id,1,'$date')";	//往订单表插入一条数据
		$re1 = mysql_query($sql,$con);
		$sql = "select max(order_id) auto_id from zf_order";	
		$auto_id = getAutoId($sql);		//获取刚才自增的订单表id
		foreach($products as $key=>$val){
			//echo '要插入的用户id是：'.$user_id.'  要插入的商品id是'.$val->product_id.'  要插入的数量是：'.$val->pro_num.'<br/>';
			//记录日志，用于调试
			$ip = $_SERVER['REMOTE_ADDR'];
			$file = fopen("order_log.txt","a");
			$record = "ip地址为:".$ip."正在访问，访问时间是：".date("Y-m-d H:i:s");
			fwrite($file,$record."   上传用户id是：".$user_id."  商品数量：".$val->pro_num." 商品id：".$val->product_id." 发货信息: ".$delivery_mes."\r");  
			fclose($file);
			$rs = checkProById($val->product_id);		//检查是否有该商品
			//var_dump($rs);
			if(count($rs)!=0){
				$pro_prices = $rs[0]['pro_price'];
				$salesPromotion = $rs[0]['salesPromotion'];
				if($salesPromotion!=null){
					$pro_prices = $pro_prices/100*$salesPromotion*10;
				}
				$groupBuying = $rs[0]['groupBuying'];
				// var_dump($groupBuying);
				if($groupBuying!=null){
					$arr = explode('/',$groupBuying);
					if($pro_num>$arr[0]){
					//有团购价
						$pro_prices = $pro_prices/100*$arr[1]*10;
					}
				}
				$HolidayPreferences = $rs[0]['HolidayPreferences'];
				if($HolidayPreferences!=null){
					$pro_prices = $pro_prices/100*$HolidayPreferences*10;
				}
				$sql = "insert into zf_order_item(product_id,pro_prices,order_id,pro_num) value($val->product_id,$pro_prices,$auto_id,$val->pro_num)";		//往订单表插入一条数据
				$re2 = mysql_query($sql,$con);
			}	
		}
		$sql = "insert into zf_delivery(order_id,delivery_way_id,delivery_mes) value($auto_id,$delivery_way_id,'$delivery_mes')";	//往发货表添加一条记录
		$re3 = mysql_query($sql,$con);
		if($re1&&$re2&&$re3){
			//echo '来到这里没有';
			mysql_query("COMMIT",$con);
			$ret = $auto_id;
		}else{
			mysql_query("ROLLBACK",$con);
		}
		mysql_close($con);//关闭连接
		return $ret;	
	}
	
	
	
?>