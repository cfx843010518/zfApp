<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改品旅</title>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<div style="float:right;"><p style="padding-top:40px;padding-right:20px;">欢迎你，管理员:<?php echo $_SESSION['user']['admin_account'];?>&nbsp;&nbsp;<a href="exits" onclick="return confirm('确定要注销吗?')">注销</a><p></div>
	<div><h1><img src="/zfApp/admin/Public/images/zf.jpg" />品品特产后台管理界面<h1></div>
</div>
<div id="left">
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif"/>品品之旅<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Fly/showAddFly">添加旅途记录</a></li>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Fly/findLimit">查阅品品之旅</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif"/>你品我荐<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Recommend/showRecPro">查看推荐商品</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif"/>商品管理<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Product/showAddProduct">填加商品</a></li>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif" /><a href="toGo?url=Product/findLimit">管理商品</a></li>
	</ul>
	<h3><img src="/zfApp/admin/Public/images/houtai1_03.gif" />折扣管理<img src="/zfApp/admin/Public/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="/zfApp/admin/Public/images/houtai_03.gif"  border="0px"/><a href="toGo?url=Discount/findLimit">商品折扣</a></li>
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
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：品旅管理－＞旅途详情</p>
<form action="comitChangeFly?fly_id=<?php echo $rs['fly_id'];?>" method="post" onsubmit="return lbyz(this)" >
<?php
session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; }else{ ?>
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>主题名称:</div></td>
  <td width="241"  bgcolor="#FFFFFF">&nbsp;<?php echo $rs['fly_theme'];?></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>详细描述:</div></td>
  <td width="241"  bgcolor="#FFFFFF">&nbsp;<textarea name="detail_introduction"><?php echo $rs['detail_introduction'];?></textarea></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>时间:</div></td>
  <td width="241"  bgcolor="#FFFFFF">&nbsp;<?php echo $rs['fly_time'];?></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>地址:</div></td>
  <td width="241"  bgcolor="#FFFFFF">&nbsp;<?php echo $rs['fly_address'];?></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>花销:</div></td>
  <td width="241"  bgcolor="#FFFFFF">&nbsp;<?php echo $rs['fly_expense'];?></td> 
</tr>
<tr>
  <td width="70"  bgcolor="#FFFFFF"><div>活动图片:</div></td>
  <td width="241"  bgcolor="#FFFFFF">&nbsp;
	<?php  $photos = explode("/",$rs['fly_photo']); for($i=0;$i<count($photos)-3;$i++){ ?>
			<img src="/zfApp/admin/Public/images/fly/<?php echo $photos[$i];?>" height="200px;">
		<?php	 } ?>
	
  </td> 
</tr>
<tr>
	<td width="70"  bgcolor="#FFFFFF"><div>获得商品名称:</div></td>
	<td width="241"  bgcolor="#FFFFFF">&nbsp;<?php echo ($rs['supply_product_name']==null)?该商品已删:$rs['supply_product_name'];?></td> 
 </tr> 
<tr>
	<td width="70"  bgcolor="#FFFFFF"><div>商品库存:</div></td>
	<td width="241"  bgcolor="#FFFFFF">&nbsp;<?php echo ($rs['stock_size']==null)?该商品已删:$rs['stock_size'];?></td> 
</tr>   
<tr>
	<td width="70"  bgcolor="#FFFFFF"><div>商品售价:</div></td>
	<td width="241"  bgcolor="#FFFFFF">&nbsp;<?php echo ($rs['pro_price']==null)?该商品已删:$rs['pro_price'];?></td> 
</tr>  
<tr>
	<td width="70"  bgcolor="#FFFFFF"><div>商品图片:</div></td>
	<td width="241"  bgcolor="#FFFFFF">&nbsp;
		<?php  $photos = explode("/",$rs['product_image']); for($i=0;$i<count($photos)-1;$i++){ ?>
			<img src="/zfApp/admin/Public/images/product/<?php echo $photos[$i];?>" height="200px;">
		<?php	 } ?>
	</td> 
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