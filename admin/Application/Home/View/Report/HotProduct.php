<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>热销商品报表</title>

</head>

<body>
<div id="header">
	<h1><img src="__PUBLIC__/images/zf.jpg" />志飞电商后台管理界面</h1>
</div>
<center>
<div id="right">
	<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：报表展示－＞热销商品报表</p>
	<a href="toGo?url=Report/index">返回首管理页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="toGo?url=Report/expHostTable">导出为Excel表</a>
	<?php
	session_start();
	if(!isset($_SESSION['user'])){
		echo "<script>alert('请先登录');</script>";
		echo "<script>location.href='__APP__';</script>";
	}else{
		if(count($ret)==0){
			 echo "<br/>暂无热销商品";
		}else{
	?>
	<span style="text-align:right; padding-right:10px;"></span>
	<table width="670" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td bgcolor="#666666">
	<table width="1300" cellspacing="1" border="0px">
	<tr align="center">
	<td bgcolor="#FFFFFF"><div>商品编号</div></td>
	<td bgcolor="#FFFFFF"><div>商品名称</div></td>
	<td bgcolor="#FFFFFF"><div>商品原价</div></td>
	<td bgcolor="#FFFFFF"><div>生产日期</div></td>
	<td bgcolor="#FFFFFF"><div>保质期</div></td>
	<td bgcolor="#FFFFFF"><div>原产地</div></td>
	<td bgcolor="#FFFFFF"><div>库存量</div></td>
	<td bgcolor="#FFFFFF"><div>供应商</div></td>
	</tr>
	<?php
	foreach($ret as $key => $value){
	?>
	<tr title="message">
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['product_id'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['supply_product_name'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['pro_price'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['produce_date'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['quality_time'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['origin_address'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['stock_size'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['supplier_name'];?></td>
	</td>
	</tr>
	<?php }}}?>
</div>
<center>
</body>
</html>
