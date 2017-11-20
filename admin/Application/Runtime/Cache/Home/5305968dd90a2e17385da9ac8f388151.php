<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑类别</title>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
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
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：类别管理－＞查看类别</p>
<form action="findLimit" method="GET">
	<span style="color:#006699;">类别名称<span><input type="text" name="searchText"/>
	<input type="submit" value="搜索"/>
</form>
<?php  session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; }else{ if($hs==0){ echo "暂无类别"; }else{ ?>
<form action="delAllType" method="post" onsubmit="return confirm('确定要删除这些种类？')">
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
<td width="102"  bgcolor="#FFFFFF"><div>复选</div></td>
  <td width="201"  bgcolor="#FFFFFF"><div>类别名称</div></td>
  <td width="122"  bgcolor="#FFFFFF"><div>操作</div></td>
</tr>
<?php
foreach($rs as $key => $value){ ?> 
<tr>
   <td width="102"  bgcolor="#FFFFFF"><div><input type="checkbox"  name="<?php echo $value['pro_type_id'];?>" value="<?php echo $row['pro_type_id']?>"/></div></td>
  <td width="201"  bgcolor="#FFFFFF"><div><?php echo $value['pro_type_name'];?></div></td>
  <td width="122"  bgcolor="#FFFFFF"><div><a href="changeType?pro_type_id=<?php echo $value['pro_type_id'];?>">修改</a>&nbsp;<a href="delType?pro_type_id=<?php echo $value['pro_type_id'];?>" onclick="return confirm('确定要删除该种类？')">删除</a></div></td>
</tr> 
<?php  } } ?>   
</table></td>
</tr>
<td style="text-align:right; padding-right:10px;"> 
<input type="submit" value="删除选择项" class="buttoncss"style="float:left; margin-right:20px;">
<?php
echo "本站共有&nbsp;"; echo $hs; echo "&nbsp;条记录&nbsp;"; echo "每页显示&nbsp;"; echo $size; echo "&nbsp;条&nbsp;"; echo "第&nbsp;"; echo $page_id; echo "&nbsp;页/共&nbsp;"; echo $page_num; echo "&nbsp;页&nbsp;"; if($page_id>=1 && $page_num>1){ echo "<a href=findLimit?page_id=1&searchText=$searchText>第一页</a>"; } if($page_id>1 && $page_num>1){ echo "<a href=findLimit?searchText=$searchText&page_id=".($page_id-1).">上一页</a>"; } if($page_id>=1 && $page_num>$page_id){ echo "<a href=findLimit?searchText=$searchText&page_id=".($page_id+1).">下一页</a>"; } if($page_id>=1 && $page_num>1){ echo "<a href=findLimit?searchText=$searchText&page_id=".$page_num.">尾页</a>"; } ?>
</td>
</tr>
</table>
<?php }?> 
</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>