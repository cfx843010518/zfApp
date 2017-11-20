<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看订单</title>
<link rel="stylesheet" type="text/css" href="/zfApp/admin/Public/css/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/zfApp/admin/Public/css/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/zfApp/admin/Public/css/demo.css">
<script type="text/javascript" src="/zfApp/admin/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/zfApp/admin/Public/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/zfApp/admin/Public/js/easyui-lang-zh_CN.js"></script>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
	$(document).ready(function () {
		$("#mySelect").combobox({
		onChange: function (n,o) {
			//触发在这里做事情
			var status = $(this).val();
			//alert(status);
			var from = $('#from').val();
			var to = $('#to').val();
			window.location.href = "findOrder?status="+status+"&from="+from+"&to="+to;
		}
		});

	});
	function doSearch() {
		//alert("sadf");
		var status = $("#mySelect").val();
		//alert(status);
		var from = $('#from').val();
		var to = $('#to').val();
		if (from == '' && to == '') {
			location.href= "findOrder?from="+from+"&to="+to+"&status="+status;
		} else {
			if (from != '' && to != '') {
				if (from < to) {
					location.href= "findOrder?from="+from+"&to="+to+"&status="+status;
				} else {
					alert('填写的日期格式错误');
				}
			} else {
				alert('请填写日期');
			}
		}
	}
</script>
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
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：订单管理－＞查看订单</p>
<form action="findOrder" method="GET">
	Date From: <input class="easyui-datebox" style="width: 100px" id="from" value="<?php echo $from;?>"/> To: <input class="easyui-datebox" style="width: 100px" id="to" value="<?php echo $to;?>"/> <a class="easyui-linkbutton" iconCls="icon-search" onclick="doSearch()">Search</a>
	<select class="easyui-combobox" name="status" style="width:200px;" id="mySelect">
		<option value="0" <?php if($status==0||!isset($status)){echo "selected='selected'";}?>>全部</option>
		<option value="1" <?php if($status==1){echo "selected='selected'";}?>>待付款</option>
		<option value="2" <?php if($status==2){echo "selected='selected'";}?>>待发货</option>
		<option value="3" <?php if($status==3){echo "selected='selected'";}?>>待收货</option>
		<option value="4" <?php if($status==4){echo "selected='selected'";}?>>待评价</option>
		<option value="5" <?php if($status==5){echo "selected='selected'";}?>>交易成功</option>
	</select>
</form>

<?php
session_start(); if(!isset($_SESSION['user'])){ echo "<script>alert('请先登录');</script>"; echo "<script>location.href='/zfApp/admin/index.php';</script>"; }else{ if(empty($total)){ echo "暂无订单!"; }else{ ?>
<form name="form1" method="post" action="">
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="40" bgcolor="#666666"><table width="670" height="44" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td width="80" height="20" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
<td width="80" bgcolor="#FFFFFF"><div align="center">下单用户</div></td>
<td width="120" bgcolor="#FFFFFF"><div align="center">下单时间</div></td>
<td width="100" bgcolor="#FFFFFF"><div align="center">备注</div></td>
<td width="100" bgcolor="#FFFFFF"><div align="center">订单状态</div></td>
<td width="115" bgcolor="#FFFFFF"><div align="center">操作</div></td>
</tr>
<?php
 foreach($orders as $value){ ?> <tr>
<td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $value["order_id"];?></div></td>
<td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $value["user_account"];?></div></td>
<td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $value["order_date"];?></div></td>
<td height="21" bgcolor="#FFFFFF"><div align="center"><?php echo $value["remarks"];?></div></td>
<td height="21" bgcolor="#FFFFFF"><div align="center"><?php
 if($value['order_status_id']==1){ echo '待付款'; }else if($value['order_status_id']==2){ echo '待发货'; }else if($value['order_status_id']==3){ echo '待收货'; }else if($value['order_status_id']==4){ echo '待评价'; }else{ echo '交易成功'; } ?></div></td>
<td height="25" bgcolor="#FFFFFF"><div align="center"><a href="showDetailOrder?order_id=<?php echo $value['order_id'];?>">查看详情</a>&nbsp;&nbsp;<a href="delIndent?id=<?php echo $value["orderid"];?>">删除</a></div></td>
</tr>
<?php
 } } ?>
</table></td>
</tr>
</table>
<table width="670" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
<tr style="text-align:right; margin-right:5px;">
<td style="text-align:right; padding-right:10px;" > 
<?php
echo "本站共有&nbsp;"; echo $total; echo "&nbsp;条记录&nbsp;"; echo "每页显示&nbsp;"; echo $size; echo "&nbsp;条&nbsp;"; echo "第&nbsp;"; echo $page_id; echo "&nbsp;页/共&nbsp;"; echo $page_num; echo "&nbsp;页&nbsp;"; if($page_id>=1 && $page_num>1){ echo "<a href=findOrder?page_id=1&from=$from&to=$to&status=$status>第一页</a>"; } if($page_id>1 && $page_num>1){ echo "<a href=findOrder?from=$from&to=$to&status=$status&page_id=".($page_id-1).">上一页</a>"; } if($page_id>=1 && $page_num>$page_id){ echo "<a href=findOrder?from=".$from."&to=".$to."&status=".$status."&page_id=".($page_id+1).">下一页</a>"; } if($page_id>=1 && $page_num>1){ echo "<a href=findOrder?from=$from&to=$to&status=$status&page_id=".$page_num.">尾页</a>"; } ?>
</td>
</tr>
</table>
<?php }?>
</form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>