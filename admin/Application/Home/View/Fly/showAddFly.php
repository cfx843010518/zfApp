<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>填加旅途</title>
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
function lbyz(fom){
if(fom.fly_theme.value==''){
alert('请输入主题名称');
fom.fly_theme.select();
return false;
}
if(fom.fly_time.value==''){
alert('请输入时间');
fom.fly_time.select();
return false;
}
if(fom.fly_address.value==''){
alert('请输入地址');
fom.fly_address.select();
return false;
}
if(fom.fly_expense.value==''){
alert('请输入花销');
fom.fly_expense.select();
return false;
}
var isNull = $('#photo').val();
if(isNull==""){
	alert('请选择文件');
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
<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "<script>alert('请先登录');</script>";
	echo "<script>location.href='__APP__';</script>";
}
?>
</div>
<div id="right" >
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：品旅管理－＞填加旅途</p>
<form action="addFly" method="post" onsubmit="return lbyz(this)" enctype="multipart/form-data">
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
  <td width="103"  bgcolor="#FFFFFF"><div>主题名称:</div></td>
  <td width="560"  bgcolor="#FFFFFF"><input type="text" name="fly_theme" /></td>
</tr> 
<tr>
  <td width="103"  bgcolor="#FFFFFF"><div>详情:</div></td>
  <td width="560"  bgcolor="#FFFFFF"><input type="text" name="detail_introduction" /></td>
</tr> 
<tr>
  <td width="103"  bgcolor="#FFFFFF"><div>时间:</div></td>
  <td width="560"  bgcolor="#FFFFFF"><input type="text" name="fly_time" /></td>
</tr> 
<tr>
  <td width="103"  bgcolor="#FFFFFF"><div>地址:</div></td>
  <td width="560"  bgcolor="#FFFFFF"><input type="text" name="fly_address" /></td>
</tr> 
<tr>
  <td width="103"  bgcolor="#FFFFFF"><div>花销:</div></td>
  <td width="560"  bgcolor="#FFFFFF"><input type="text" name="fly_expense" /></td>
</tr> 
<tr>
	<td width="103"  bgcolor="#FFFFFF">活动图片</td>
	<td width="103"  bgcolor="#FFFFFF">
		<input name="file[]" type="file" id="photo" size="50"/><br/>
		<input type="button" value="继续添加" style="height:20px;" id="speInput"/>
	</td>
</tr>
<tr>
	<td width="103"  bgcolor="#FFFFFF">商品名称</td>
	<td width="103"  bgcolor="#FFFFFF">
		<select name="product">
		<?php
		foreach($rs as $key=>$val){
		?>
			<option value="<?php echo $val['product_id'];?>"><?php echo substr($val['supply_product_name'],0,120);?></option>
		<?php } ?>
		</select>
	</td>
</tr>	
 <tr>
  <td colspan="4"  bgcolor="#FFFFFF"><input type="submit" name="ok" value="提&nbsp;交" style="width:55px; height:30px;"/><input type="reset" value="重&nbsp;置"style="width:55px; height:30px;"/><div></div></td>
</tr>         
</table></td>
</tr>
</table>
</form>
</div>
<?php include "Public/footer.php";//调用底部?>
</body>
</html>
