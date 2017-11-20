<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理主界面</title>
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('#speInput').click(function(){
			$(this).before("<input name='file[]' type='file' id='photo' size='50'/><br/>");
		});
		 
	});
</script>
<script language="javascript">
function sjyz(fom){
if(fom.supply_product_name.value==''){
alert("请输入商品名称");
fom.supply_product_name.select();
return false;
}
if(fom.supplier_name.value==''){
alert("请输入供应商名称");
fom.supplier_name.select();
return false;
}
if(fom.supplier_address.value==''){
alert("请输入供应商地址");
fom.supplier_address.select();
return false;
}
if(fom.stock_size.value==''){
alert("请输入库存量");
fom.stock_size.select();
return false;
}
if(fom.quality_time.value==''){
alert("请输入保质期");
fom.quality_time.select();
return false;
}
if(fom.origin_address.value==''){
alert("请输入原产地");
fom.origin_address.select();
return false;
}
if(fom.pro_price.value==''){
alert("请输入商品原价");
fom.pro_price.select();
return false;
}
if(fom.discount.value==''){
alert("请输入折扣");
fom.discount.select();
return false;
}
if(fom.product_introduce.value==''){
alert("请输入商品介绍");
fom.product_introduce.select();
return false;
}
if(fom.trade_price.value==''){
alert("请输入供货价格");
fom.trade_price.select();
return false;
}
}

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
<div id="right" >
	<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：商品管理－＞填加商品</p>
	<form action="__APP__/Product/saveProduct" method="post" onsubmit="return sjyz(this)" enctype="multipart/form-data">
	<table width="670" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td  bgcolor="#666666"><table width="670" cellspacing="1">
	<tr>
	<td  bgcolor="#FFFFFF"><div>商品名称:</div></td>
	<td  bgcolor="#FFFFFF"><input name="supply_product_name" type="text" id="name" /></td>
	</tr>
	<tr>
	<td  bgcolor="#FFFFFF"><div>商品类型:</div></td>
	<td  bgcolor="#FFFFFF">
	<select name="type" style="margin-left:10px;">
	<?php
	session_start();
	if(!isset($_SESSION['user'])){
		echo "<script>alert('请先登录');</script>";
		echo "<script>location.href='__APP__';</script>";
	}else{
		for($i=0;$i<count($types);$i++){	//循环打印出字段值
			echo "<option value=".$types[$i]['pro_type_id'].">".$types[$i]['pro_type_name']."</option>";	
		}
	}
	?>
	</select>
	</td>
	</tr>
	<tr>
	<td  bgcolor="#FFFFFF"><div>供应商名称:</div></td>
	<td  bgcolor="#FFFFFF">
	<select name="supplier" style="margin-left:10px;">
	<?php
		for($i=0;$i<count($suppliers);$i++){	//循环打印出字段值
			echo "<option value=".$suppliers[$i]['supplier_id'].">".$suppliers[$i]['supplier_name']."</option>";	
		}
	?>
	</select>
	</td>
	</tr>
	<tr  bgcolor="#FFFFFF">
	<td><div>库存量:</div></td>
	<td><input name="stock_size" type="text" id="installment" /></td>
	</tr>
	<tr  bgcolor="#FFFFFF">
	<td><div>生产日期:</div></td>
	<td>
	<select name="produce_date_year" style="margin-left:10px;">
	<?php for($i=2015;$i<=3000;$i++){?>
	<option value="<?php echo $i;?>"><?php  echo $i;?></option>
	<?php }?>
	</select>年
	<select name="produce_date_month">
	<?php for($i=1;$i<=12;$i++){?>
	<option value="<?php echo $i;?>"><?php  echo $i;?></option>
	<?php }?>
	</select>月
	<select name="produce_date_day">
	<?php for($i=1;$i<=31;$i++){?>
	<option value="<?php echo $i;?>"><?php  echo $i;?></option>
	<?php }?>
	</select>日
	</td>
	</tr>
	<tr>
	<td bgcolor="#FFFFFF"><div>保质期:</div></td>
	<td bgcolor="#FFFFFF"><input name="quality_time" type="text" id="norms" />例如:180天</td>
	</tr>
	<tr>
	<td bgcolor="#FFFFFF"><div>原产地:</div></td>
	<td bgcolor="#FFFFFF"><input name="origin_address" type="text" id="norms" />例如:中国陕西</td>
	</tr>
	<tr>
	<td bgcolor="#FFFFFF"><div>商品原价:</div></td>
	<td bgcolor="#FFFFFF"><input name="pro_price" type="text" id="norms" /></td>
	</tr>
	<tr  bgcolor="#FFFFFF">
	<td><div>商品图片:</div></td>
	<td>
		<input name="file[]" type="file" id="photo" size="50"/><br/>
		<input type="button" value="继续添加" style="height:20px;" id="speInput"/>
	</td>
	</tr>
	<tr  bgcolor="#FFFFFF">
	<td><div>商品介绍:</div></td>
	<td><textarea name="product_introduce" cols="30" rows="5" style="margin-left:10px;" ></textarea></td>
	</tr>
	<tr  bgcolor="#FFFFFF">
	<td><div>供货日期:</div></td>
	<td>
	<select name="supply_date_year" style="margin-left:10px;">
	<?php for($i=2015;$i<=3000;$i++){?>
	<option value="<?php echo $i;?>"><?php  echo $i;?></option>
	<?php }?>
	</select>年
	<select name="supply_date_month">
	<?php for($i=1;$i<=12;$i++){?>
	<option value="<?php echo $i;?>"><?php  echo $i;?></option>
	<?php }?>
	</select>月
	<select name="supply_date_day">
	<?php for($i=1;$i<=31;$i++){?>
	<option value="<?php echo $i;?>"><?php  echo $i;?></option>
	<?php }?>
	</select>日
	</td>
	</tr>
	<tr  bgcolor="#FFFFFF">
	<td><div>供货价格:</div></td>
	<td><input name="trade_price" type="text"/></td>
	</tr>
	<tr style="text-align:center;"><td colspan="2" bgcolor="#FFFFFF";><input type="submit" name="ok"  value="提&nbsp;交" style=" margin-right:10px;"/>
	<input type="reset"  value="重&nbsp;置"/></td>
	</tr>
	</table></td>
	</tr>
	</table>
	</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>
