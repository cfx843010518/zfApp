<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>填加类别</title>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function lbyz(fom){
if(fom.pro_type_name.value==''){
alert('请输入类别名称');
fom.pro_type_name.select();
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
<?php
session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; } ?>
</div>
<div id="right" >
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：商品管理－＞填加类别</p>
<form action="addProType" method="post" onsubmit="return lbyz(this)" >
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
  <td width="103"  bgcolor="#FFFFFF"><div>类别名称:</div></td>
  <td width="560"  bgcolor="#FFFFFF"><input type="text" name="pro_type_name" /></td>
</tr> 
 <tr>
  <td colspan="4"  bgcolor="#FFFFFF"><input type="submit" name="ok" value="提&nbsp;交" style="width:55px; height:30px;"/><input type="reset" value="重&nbsp;置"style="width:55px; height:30px;"/><div></div></td>
</tr>         
</table></td>
</tr>
</table>
</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>