<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看订单情况</title>
<link href="/zfApp/admin/Public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="/zfApp/admin/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#order_date_year').change(function(){
			var order_date_year = $(this).val();
			var order_date_month = $('#order_date_month').val();
			window.location.href='findByDate?year='+order_date_year+'&month='+order_date_month;
		});
		$('#order_date_month').change(function(){
			var order_date_month = $(this).val();
			var order_date_year = $('#order_date_year').val();
			window.location.href='findByDate?year='+order_date_year+'&month='+order_date_month;
		});
		
	});

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
<div id="right">
	<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：订单管理－＞报表导航汇总</p>
	<a href="orderGather">订单月销量汇总表</a><br/>
	<a href="orderGatherDetail" style="10px;">订单月销量汇总明细表</a><br/>
	<a href="hotProductTable">热销商品表</a><br/><br/>
</div>
<?php include "Public/footer.php";?>
</body>
</html>