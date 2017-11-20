<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看订单情况</title>
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#order_date_year').change(function(){
			var order_date_year = $(this).val();
			var order_date_month = $('#order_date_month').val();
			window.location.href='findByDate?year='+order_date_year+'&month='+order_date_month;
		});
		$('#order_date_month').change(function(){
			var order_date_month = $(this).val();
			var order_date_year = $('#order_date_year').val();
			window.location.href='findByDate?year='+order_date_year+'&month='+order_date_month;
		});
		
	});

</script>
<body>
<div id="header">
	<div style="float:right;"><p style="padding-top:40px;padding-right:20px;">欢迎你，管理员:<?php echo $_SESSION['user']['admin_account'];?>&nbsp;&nbsp;<a href="exits" onclick="return confirm('确定要注销吗?')">注销</a><p></div>
	<div><h1><img src="__PUBLIC__/images/zf.jpg" />品品特产后台管理界面<h1></div>
</div>
<div id="left">
	<h3><img src="__PUBLIC__/images/houtai1_03.gif"/>品品之旅<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Fly/showAddFly">添加旅途记录</a></li>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Fly/findLimit">查阅品品之旅</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif"/>你品我荐<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Recommend/showRecPro">查看推荐商品</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif"/>商品管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Product/showAddProduct">填加商品</a></li>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Product/findLimit">管理商品</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />折扣管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif"  border="0px"/><a href="toGo?url=Discount/findLimit">商品折扣</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />用户管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=User/findUser">用户管理</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />供应商管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Supplier/showAllSupplier">管理供应商</a></li>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Supplier/showAddSupplier">添加供应商</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />订单管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Order/findOrder">管理订单</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />报表查看<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Report/index">报表导航</a></li>
	</ul>
</div>
<div id="right">
	<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：订单管理－＞订单月销量汇总</p>
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
	<strong><a href="findAllOrder" style="color:white;background:black;border:1px solid blue;">不按时间显示所有订单</a></strong>
	<?php
	session_start();
	if(!isset($_SESSION['user'])){
		echo "<script>alert('请先登录');</script>";
		echo "<script>location.href='__APP__';</script>";
	}else{
		if($hs==0){
			echo "<br/>暂无订单";
		}else{
	?>
	<form action="delAllProducts" method="post" onsubmit="return confirm('确定要删除这些商品？')">
	<span style="text-align:right; padding-right:10px;"></span>
	<table width="670" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td bgcolor="#666666">
	<table width="670" cellspacing="1" border="0px">
	<tr>
	<td width="33"  bgcolor="#FFFFFF"><div>复选</div></td>
	<td width="120"  bgcolor="#FFFFFF"><div>订单编号</div></td>
	<td width="120"  bgcolor="#FFFFFF"><div>下单时间</div></td>
	<td width="80"  bgcolor="#FFFFFF"><div>订单成本价</div></td>
	<td width="90"  bgcolor="#FFFFFF"><div>订单总价</div></td>
	<td width="60"  bgcolor="#FFFFFF"><div>订单利润</div></td>
	<td width="60"  bgcolor="#FFFFFF"><div>盈利率</div></td>
	<td width="77"  bgcolor="#FFFFFF"><div>操作</div></td>
	</tr>
	<?php
	foreach($rs as $key => $value){
	?>
	<tr title="message">
		<td bgcolor="#FFFFFF" style="text-align:center;"><input type="checkbox" name="<?php echo $value['sales_count_id'];?>" value="<?php echo $val['sales_count_id'];?>" /></td>
		<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['order_id'];?></td>
		<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['order_date'];?></td>
		<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['cost_price'];?></td>
		<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['order_sum_price'];?></td>
		<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['profit_amount'];?></td>
		<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['profit_margin'];?></td>
		<td bgcolor="#FFFFFF" style="text-align:center;"><a href= "delProduct?product_id=<?php echo $value['product_id'];?>" onclick="return confirm('确定要删除该商品？')">删除</a>
	</td>
	</tr>
	<?php }?>
	</table></td>
	</tr>
	<tr><td style="text-align:right; padding-right:10px; padding-top:10px;">
	<input type="submit" value="删除所选订单" class="buttoncss" style="float:left; margin-right:20px;" />
	<?php
	echo "本站共有".$hs."条记录&nbsp;";
	echo "每页显示".$size."条&nbsp;";
	echo "第".$page_id."页/共".$page_num."页&nbsp;";
	if($page_id>=1 && $page_num>1){
	echo "<a href=".$action."page_id=1>第一页&nbsp;</a>";
	}
	if($page_id>1 && $page_num>1){
	echo "<a href=".$action."page_id=".($page_id-1).">上一页&nbsp;</a>";
	}
	if($page_id>=1 && $page_num>$page_id){
	echo "<a href=".$action."page_id=".($page_id+1).">下一页&nbsp;</a>";
	}
	if($page_id>=1 && $page_num>1){
	echo "<a href=".$action."page_id=".$page_num.">尾页</a>";
	}
	?></td></tr>
	</table>

	<?php }}?>
	<p style=" text-align:right; margin-right:5px;">
	</p>
	</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>
