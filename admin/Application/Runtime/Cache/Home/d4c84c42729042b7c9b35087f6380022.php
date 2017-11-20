<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改品旅</title>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
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
}
</script>
<body>
<div id="header">
	<h1><img src="/zfApp/admin/Public/images/zf.jpg" />志飞电商后台管理界面</h1>
</div>
<div id="left">
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif"/>商品管理<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Product/showAddProduct">填加商品</a></li>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Product/findLimit">管理商品</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif" />类别管理<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif"  border="0px"/><a href="toGo?url=Type/findLimit">编辑类别</a></li>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Type/showAddType">填加类别</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif" />用户管理<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=User/findUser">用户管理</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif" />供应商管理<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Supplier/showAllSupplier">管理供应商</a></li>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Supplier/showAddSupplier">添加供应商</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif" />订单管理<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Order/findOrder">管理订单</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif" />报表查看<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Report/index">报表导航</a></li>
	</ul>
</div>
<div id="right" >
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：品旅管理－＞修改旅途</p>
<form action="comitChangeFly?fly_id=<?php echo $rs['fly_id'];?>" method="post" onsubmit="return lbyz(this)" >
<?php
session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; }else{ ?>
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>主题名称:</div></td>
  <td width="241"  bgcolor="#FFFFFF"><input type="text" name="fly_theme" value="<?php echo $rs['fly_theme'];?>" /></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>详情:</div></td>
  <td width="241"  bgcolor="#FFFFFF"><textarea name="detail_introduction"><?php echo $rs['detail_introduction'];?></textarea></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>时间:</div></td>
  <td width="241"  bgcolor="#FFFFFF"><input type="text" name="fly_time" value="<?php echo $rs['fly_time'];?>" /></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>地址:</div></td>
  <td width="241"  bgcolor="#FFFFFF"><input type="text" name="fly_address" value="<?php echo $rs['fly_address'];?>" /></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>花销:</div></td>
  <td width="241"  bgcolor="#FFFFFF"><input type="text" name="fly_expense" value="<?php echo $rs['fly_expense'];?>" /></td> 
</tr>
 <tr>
  <td colspan="4"  bgcolor="#FFFFFF"><input type="submit" name="ok" value="提交修改"/><input type="reset" value="重&nbsp;置"/><div></div></td>
</tr>         
</table></td>
</tr>
</table>
<?php  } ?> 
</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>