<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>测试</title>
</head>
<body>
	<!--
	<form action="updateShoppingCar.php" method="get">
		用户id:<input type="text" name="user_id"/><br/>
		商品id:<input type="text" name="product_id"/><br/>
		商品数量:<input type="text" name="pro_num"/><br/>
		<input type="submit" value="登陆"/>
	</form>
	-->
	<!--
	<form action="searchProduct.php" method="get">
		搜索内容:<input type="text" name="searchStr"/><br/>
		<input type="submit" value="登陆"/>
	</form>
	-->
	<!--
	<form action="addShoppingCar.php" method="get">
		用户id:<input type="text" name="user_id"/><br/>
		商品id:<input type="text" name="product_id"/><br/>
		商品数量:<input type="text" name="pro_num"/><br/>
		<input type="submit" value="登陆"/>
	</form>
	-->
	
	<!--
	<form action="deleteOneFromSC.php" method="get">
		用户id:<input type="text" name="user_id"/><br/>
		商品id:<input type="text" name="product_id"/><br/>
		<input type="submit" value="登陆"/>
	</form>
	-->
	
	<form action="deleteFromSC.php" method="get">
		json字符串:<input type="text" name="delete_mes"/><br/>
		<input type="submit" value="登陆"/>
	</form>
	<?php
		$ret = array('user_id'=>1,'product_ids'=>array(4,5,6,7,8));
		echo json_encode($ret);
	?>
	
</body>
</html>