<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看商品</title>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="/zfApp/admin/Public/js/jquery-1.8.3.min.js"></script>
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

<div id="right">
	<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：品品之旅－＞查看推荐商品</p>
	<form action="findLimit" method="GET">
		<span style="color:#006699;">条件<span>
		<select style="width:100px;">
			<option>未通过</option>
			<option>已通过</option>
			<option selected = "selected">全部</option>
		</select>	
	</form>
	<?php
 session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; }else{ if($total==0){ echo "暂无商品"; }else{ ?>
	<form action="delAllProducts" method="post" onsubmit="return confirm('确定要删除这些商品？')">
	<span style="text-align:right; padding-right:10px;"></span>
	<table width="670" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td bgcolor="#666666">
	<table width="670" cellspacing="1" border="0px">
	<tr>
	<td width="33"  bgcolor="#FFFFFF"><div>复选</div></td>
	<td width="120"  bgcolor="#FFFFFF"><div>商品名称</div></td>
	<td width="61"  bgcolor="#FFFFFF"><div>地址</div></td>
	<td width="90"  bgcolor="#FFFFFF"><div>联系电话</div></td>
	<td width="60"  bgcolor="#FFFFFF"><div>联系人</div></td>
	<td width="77"  bgcolor="#FFFFFF"><div>状态</div></td>
	<td width="77"  bgcolor="#FFFFFF"><div>推荐时间</div></td>
	<td width="77"  bgcolor="#FFFFFF"><div>操作</div></td>
	</tr>
	<?php
 if($total==0){ echo "暂无商品"; }else{ foreach($rs as $key => $value){ ?>
	<tr title="message">
	<td bgcolor="#FFFFFF" style="text-align:center;"><input type="checkbox" name="<?php echo $value['product_id'];?>" value="<?php echo $val['product_id'];?>" /></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['product_name'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['address'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['phone'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['man_name'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['user_name'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['user_name'];?></td>
	<td bgcolor="#FFFFFF" style="text-align:center;"><a href="showChangeProduct?product_id=<?php echo $value['product_id'];?>" onclick="return confirm('确定要通过该推荐？')">通过</a>|<a href= "delProduct?product_id=<?php echo $value['product_id'];?>" onclick="return confirm('确定要删除该推荐？')">删除</a>
	</td>
	</tr>
	<?php  } } ?>
	</table></td>
	</tr>
	<tr><td style="text-align:right; padding-right:10px; padding-top:10px;">
	<input type="submit" value="删除所选推荐" class="buttoncss" style="float:left; margin-right:20px;" />
	<?php
 echo "本站共有".$total."条记录&nbsp;"; echo "每页显示".$size."条&nbsp;"; echo "第".$page_id."页/共".$page_num."页&nbsp;"; if($page_id>=1 && $page_num>1){ echo "<a href=findLimit?page_id=1&searchText=$searchText>第一页&nbsp;</a>"; } if($page_id>1 && $page_num>1){ echo "<a href=findLimit?searchText=$searchText&page_id=".($page_id-1).">上一页&nbsp;</a>"; } if($page_id>=1 && $page_num>$page_id){ echo "<a href=findLimit?searchText=$searchText&page_id=".($page_id+1).">下一页&nbsp;</a>"; } if($page_id>=1 && $page_num>1){ echo "<a href=findLimit?searchText=$searchText&page_id=".$page_num.">尾页</a>"; } ?></td></tr>
	</table>

	<?php }}?>
	<p style=" text-align:right; margin-right:5px;">
	</p>
	</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>