<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>折扣管理</title>
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
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：折扣管理－＞修改折扣</p>

<?php  session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; }else{ ?>
<form action="comitchangeDiscount" method="GET">
<input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
  <td width="201"  bgcolor="#FFFFFF"><div>商品编号</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div><?php echo $row['product_id'];?></div></td>
</tr>
<tr>
  <td width="201"  bgcolor="#FFFFFF"><div>商品名称</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div><?php echo $row['supply_product_name'];?></div></td>
</tr>
<tr>
  <td width="201"  bgcolor="#FFFFFF"><div>商品生产地</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div><?php echo $row['origin_address'];?></div></td>
</tr>
<tr>
  <td width="201"  bgcolor="#FFFFFF"><div>打折</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div>打<input type="text" name="salesPromotion" value="<?php echo ($row['salesPromotion']==null)?10:$row['salesPromotion'];?>"/>折(10折代表无折扣)</div></td>
</tr>
<tr>
  <td width="201"  bgcolor="#FFFFFF"><div>团购</div></td>
  <?php
 $groupBuying = $row['groupBuying']; $arr = explode('/',$groupBuying); ?>
  <td width="201"  bgcolor="#FFFFFF"><div>团购<input type="text" size="2" name="group" value="<?php echo ($arr[0]==null)?0:$arr[0];?>"/>件以上有
	<select name="Buying">
		<?php for($i=1;$i<=10;$i++){ ?>
			<option value="<?php echo $i;?>" <?php if($i==$arr[1]){ echo "selected='selected'";}?>><?php echo $i;?></option>
		<?php
 } ?>
	</select>
  折(无折扣填0件)</div></td>
</tr>
<tr>
  <td width="201"  bgcolor="#FFFFFF"><div>节日促销</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div>打<input type="text" name="HolidayPreferences" value="<?php echo ($row['HolidayPreferences']==null)?10:$row['HolidayPreferences'];?>"/>折(10折代表无折扣)</div></td>
</tr> 
<tr>
  <td width="201"  bgcolor="#FFFFFF"><div><input type="submit" value="修改"/></div></td>
  <td width="201"  bgcolor="#FFFFFF"><div><input type="reset"  value="重置"></div></td>
</tr> 
</table>
</td>
</tr>
</tr>
</table>
<?php }?> 
</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>