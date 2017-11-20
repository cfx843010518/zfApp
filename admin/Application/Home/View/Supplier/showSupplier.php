<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑供应商</title>
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
</head>
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
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：供应商管理－＞查看供应商</p>
<form action="showAllSupplier" method="GET">
	<span style="color:#006699;">供应商名称<span><input type="text" name="searchText"/>
	<input type="submit" value="搜索"/>
</form>
<?php 
session_start();
if(!isset($_SESSION['user'])){
	echo "<script>alert('请先登录');</script>";
	echo "<script>location.href='__APP__';</script>";
}else{
	if($hs==0){
		echo "暂无供应商";
	}else{ 
?>
<form action="delSuppliers" method="post" onsubmit="return confirm('确定要删除这些供应商？')">
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
<td width="102"  bgcolor="#FFFFFF"><div>复选</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div>供应商名称</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div>供应商地址</div></td>
  <td width="122"  bgcolor="#FFFFFF"><div>操作</div></td>
</tr>
<?php
foreach($rs as $key => $value){
?> 
<tr>
   <td width="102"  bgcolor="#FFFFFF"><div><input type="checkbox"  name="<?php echo $value['supplier_id'];?>" value="<?php echo $value['supplier_id']?>"/></div></td>
  <td width="201"  bgcolor="#FFFFFF"><div><?php echo $value['supplier_name'];?></div></td>
   <td width="201"  bgcolor="#FFFFFF"><div><?php echo $value['supplier_address'];?></div></td>
  <td width="122"  bgcolor="#FFFFFF"><div><a href="changeSupplier?supplier_id=<?php echo $value['supplier_id'];?>">修改</a>&nbsp;<a href="delSupplier?supplier_id=<?php echo $value['supplier_id'];?>" onclick="return confirm('确定要删除该供应商？')">删除</a></div></td>
</tr> 
<?php 
	}
}
?>   
</table></td>
</tr>
<td style="text-align:right; padding-right:10px;"> 
<input type="submit" value="删除选择项" class="buttoncss"style="float:left; margin-right:20px;">
<?php
echo "本站共有";
echo $hs;
echo "条记录&nbsp;";
echo "每页显示";
echo $size;
echo "条&nbsp;";
echo "第";
echo $page_id;
echo "页/共";
echo $page_num;
echo "页&nbsp;";
if($page_id>=1 && $page_num>1){
	echo "<a href=showAllSupplier?page_id=1&searchText=$searchText>第一页</a>";
}
if($page_id>1 && $page_num>1){
	echo "<a href=showAllSupplier?searchText=$searchText&page_id=".($page_id-1).">上一页</a>";
}
if($page_id>=1 && $page_num>$page_id){
	echo "<a href=showAllSupplier?searchText=$searchText&page_id=".($page_id+1).">下一页</a>";
}
if($page_id>=1 && $page_num>1){
	echo "<a href=showAllSupplier?searchText=$searchText&page_id=".$page_num.">尾页</a>";
}
?>
</td>
</tr>
</table>
<?php }?> 
</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>
