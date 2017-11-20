<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>测试</title>

</head>
<body>
	<!--
	<form action="pay.php" method="post">
		订单id: <input type="text" name="order_id"/>
		<input type="submit" value="登录"/>
	</form>
	-->
	<form action="manyCommitOrder.php" method="post">
		订单信息: <input type="text" name="orderMes"/>
		<input type="submit" value="登录"/>
	</form>
	<?php
		$ret = array('user_id'=>1,'res'=>array(array('product_id'=>4,'pro_num'=>5),array('product_id'=>5,'pro_num'=>6)),'delivery_mes_id'=>3);
		echo json_encode($ret);
	?>
</body>
</html>