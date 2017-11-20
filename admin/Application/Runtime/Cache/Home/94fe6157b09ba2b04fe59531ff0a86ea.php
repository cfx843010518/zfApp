<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看商品</title>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="/zfApp/admin/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	 $(document).ready(function(e) {
    	var spanTitle = $('tr[title=message] span');
    	spanTitle.mouseover(function(evt){
			//$(this).attr('title'));
			 var newNode = '<div id="new" style="position:absolute"><img src="'+$(this).attr('title')+'" style="width:250px; height:270px;"></div>';
			 $('body').append(newNode);
			 $('#new').css('left',(evt.pageX+10)+"px");
		     $('#new').css('top',(evt.pageY+10)+"px");
		}).mouseout(function(){
		$('#new').remove();   
   }).mousemove(function(evt){
	   $('#new').css('left',(evt.pageX+10)+"px");
		$('#new').css('top',(evt.pageY+10)+"px");
   });
  });</script>
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

<div id="right">
	<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：商品管理－＞查看商品</p>
	<form action="findLimit" method="GET">
		<span style="color:#006699;">商品名称<span><input type="text" name="searchText"/>
		<input type="submit" value="搜索"/>
	</form>
	<?php
 session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; }else{ if($hs==0){ echo "暂无商品"; }else{ ?>
	<form action="delAllProducts" method="post" onsubmit="return confirm('确定要删除这些商品？')">
	<span style="text-align:right; padding-right:10px;"></span>
	<table width="670" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td bgcolor="#666666">
	<table width="670" cellspacing="1" border="0px">
	<tr>
	<td width="33"  bgcolor="#FFFFFF"><div>复选</div></td>
	<td width="120"  bgcolor="#FFFFFF"><div>商品名称</div></td>
	<td width="61"  bgcolor="#FFFFFF"><div>商品类型</div></td>
	<td width="90"  bgcolor="#FFFFFF"><div>供应商名称</div></td>
	<td width="60"  bgcolor="#FFFFFF"><div>库存量</div></td>
	<td width="60"  bgcolor="#FFFFFF"><div>保质期</div></td>
	<td width="60"  bgcolor="#FFFFFF"><div>缩略图</div></td>
	<td width="77"  bgcolor="#FFFFFF"><div>商品原价</div></td>
	<td width="77"  bgcolor="#FFFFFF"><div>操作</div></td>
	</tr>
	<?php
 if($hs==0){ echo "暂无商品"; }else{ foreach($rs as $key => $value){ ?>
	<tr title="message">
	<td bgcolor="#FFFFFF" style="text-align:center;"><input type="checkbox" name="<?php echo $value['product_id'];?>" value="<?php echo $val['product_id'];?>" /></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo substr($value['supply_product_name'],0,27);?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['pro_type_name'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['supplier_name'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['stock_size'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['quality_time'];?></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><span title="/zfApp/admin/Public/images/product/<?php $photos = explode('/',$value["product_image"]); echo $photos[0];?>">查看</span></td>
	<td bgcolor="#FFFFFF"style="text-align:center;"><?php echo $value['pro_price'];?></td>
	<td bgcolor="#FFFFFF" style="text-align:center;"><a href="showChangeProduct?product_id=<?php echo $value['product_id'];?>">修改</a>|<a href= "delProduct?product_id=<?php echo $value['product_id'];?>" onclick="return confirm('确定要删除该商品？')">删除</a>
	</td>
	</tr>
	<?php  } } ?>
	</table></td>
	</tr>
	<tr><td style="text-align:right; padding-right:10px; padding-top:10px;">
	<input type="submit" value="删除所选商品" class="buttoncss" style="float:left; margin-right:20px;" />
	<?php
 echo "本站共有".$hs."条记录&nbsp;"; echo "每页显示".$size."条&nbsp;"; echo "第".$page_id."页/共".$page_num."页&nbsp;"; if($page_id>=1 && $page_num>1){ echo "<a href=findLimit?page_id=1&searchText=$searchText>第一页&nbsp;</a>"; } if($page_id>1 && $page_num>1){ echo "<a href=findLimit?searchText=$searchText&page_id=".($page_id-1).">上一页&nbsp;</a>"; } if($page_id>=1 && $page_num>$page_id){ echo "<a href=findLimit?searchText=$searchText&page_id=".($page_id+1).">下一页&nbsp;</a>"; } if($page_id>=1 && $page_num>1){ echo "<a href=findLimit?searchText=$searchText&page_id=".$page_num.">尾页</a>"; } ?></td></tr>
	</table>

	<?php }}?>
	<p style=" text-align:right; margin-right:5px;">
	</p>
	</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>