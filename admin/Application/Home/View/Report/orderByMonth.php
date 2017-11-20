<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单报表</title>

</head>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#order_date_year').change(function(){
			var order_date_year = $(this).val();
			var order_date_month = $('#order_date_month').val();
			window.location.href='orderGather?year='+order_date_year+'&month='+order_date_month;
		});
		$('#order_date_month').change(function(){
			var order_date_month = $(this).val();
			var order_date_year = $('#order_date_year').val();
			window.location.href='orderGather?year='+order_date_year+'&month='+order_date_month;
		});
		
	});

	function expOrderAll(){
		var order_date_year = $('#order_date_year').val();
		var order_date_month = $('#order_date_month').val();
		window.location.href = "expOrderAll?order_date_year="+order_date_year+"&order_date_month="+order_date_month;
	}
</script>
<body>
<div id="header">
	<h1><img src="__PUBLIC__/images/zf.jpg" />志飞电商后台管理界面</h1>
</div>
<center>
<div id="right">
	<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：订单管理－＞订单年/月销量汇总</p>
	<strong>按下单时间显示:</strong>
	<select name="order_date_year" style="margin-left:10px;" id="order_date_year">
	<?php for($i=2015;$i<=3000;$i++){?>
	<option value="<?php echo $i;?>" <?php if($i==$year){echo "selected='selected'";}?>><?php echo $i;?></option>
	<?php }?>
	</select>年
	<select name="order_date_month" id="order_date_month">
	<?php for($i=1;$i<=12;$i++){?>
	<option value="<?php echo $i;?>" <?php if($i==$month){echo "selected='selected'";}?>><?php  echo $i;?></option>
	<?php }?>
	</select>月
	<a href="toGo?url=Report/index">返回首管理页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="expOrderAll()">导出为Excel表</a>
	<?php
	session_start();
	if(!isset($_SESSION['user'])){
		echo "<script>alert('请先登录');</script>";
		echo "<script>location.href='__APP__';</script>";
	}else{
		// if($hs==0){
			// echo "<br/>暂无订单";
		// }else{
	?>
	<span style="text-align:right; padding-right:10px;"></span>
	<table width="670" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td bgcolor="#666666">
	<table width="870" cellspacing="1" border="0px">
	<tr>
	<td bgcolor="#FFFFFF"><div>订单编号</div></td>
	<td bgcolor="#FFFFFF"><div>下单时间</div></td>
	<td bgcolor="#FFFFFF"><div>商品名称</div></td>
	<td bgcolor="#FFFFFF"><div>商品数量</div></td>
	<td bgcolor="#FFFFFF"><div>单价（元）</div></td>
	<td bgcolor="#FFFFFF"><div>合计（元）</div></td>
	</tr>
	<?php
	foreach($rs as $key => $value){
	?>
	<tr title="message">
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['order_id'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['order_date'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['supply_product_name'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['pro_num'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['pro_prices'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><?php echo $value['pro_num']*$value['pro_prices'];?></td>
	</td>
	</tr>
	<?php }}?>
	<tr align="center">
		<td bgcolor="#FFFFFF" colspan="3">总计</td>
		<td bgcolor="#FFFFFF"><strong><?php echo $pro_num;?></strong></td>
		<td bgcolor="#FFFFFF" colspan="2">共&nbsp;&nbsp;<strong><?php echo $total;?></strong>元</td>
	</tr>
</div>
<center>
</body>
</html>
