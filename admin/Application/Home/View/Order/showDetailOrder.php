<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看详细订单</title>
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function sjyz(fom){
if(!fom.status.checked){
	alert('请勾选发货选项');
	return false;
}
}

</script>
<body>
<div id="header">
	<div style="float:right;"><p style="padding-top:40px;padding-right:20px;">欢迎你，管理员:<?php echo $_SESSION['user']['admin_account'];?>&nbsp;<a href="exits" onclick="return confirm('确定要注销吗?')">注销</a>&nbsp;<a href="toGo?url=Order/findOrder">返回</a><p></div>
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
  <p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：订单管理－＞查看详细订单</p>
<table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
<form action="updateOrderStatus" method="post" onsubmit="return sjyz(this)">
  <input type="hidden" name="order_id" value="<?php echo $rs['order_id'];?>">		
  <tr>
    <td width="156" height="20">订单号：<?php echo $rs["order_id"];?></td>
  <td width="320" height="20">&nbsp;&nbsp;
  <?php if($user['order_status_id']>=3){echo '已发货';}else{echo '<input name="status" type="checkbox" value="3"/>&nbsp;已发货&nbsp;&nbsp;';}?>
  </td>
  <td width="124"><input name="ok" value="修改订单状态"  type="submit" style="width:80px; height:22px;" <?php if($rs['delivery_status_id']==1){?>disabled="disabled"<?php }?>/></td>
  </tr>
  </form>
  <tr>
    
  <td width="156" height="20">商品列表(如下)：</td>
  </tr>
</table>
<table width="500" height="60" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#666666"><table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr bgcolor="#628e37" style="color:#FFF">
        <td width="153" height="20" style="text-align:center;">商品名称</td>
        <td width="80" style="text-align:center;">原价</td>
		<td width="80" style="text-align:center;">打折优惠</td>
		<td width="80" style="text-align:center;">团购优惠</td>
		<td width="80" style="text-align:center;">节日优惠</td>
		<td width="80" style="text-align:center;">折后价</td>
        <td width="80" style="text-align:center;">数量</td>
      </tr>
	 <?php
  foreach($goodList as $key=>$val){
	if($val!=null){
  ?>    
	  <tr bgcolor="#FFFFFF">
		<td height="20" style="text-align:center;"><?php echo $val['supply_product_name'];?></td>
        <td height="20" style="text-align:center;"><?php echo $val['pro_price'];?></td>
        <td height="20" style="text-align:center;"><?php echo ($val['salesPromotion']==null)?无:$val['salesPromotion']."折";?></td>
		<td height="20" style="text-align:center;"><?php 
			$groupBuying = $val['groupBuying'];
			$arr = explode('/',$groupBuying);
			//var_dump($arr);
			if($arr[0]==''){
				echo "无";
			}
			else{
				echo "团购<strong>$arr[0]</strong>件以上有<strong>$arr[1]</strong>折优惠";
			}
		?></td>
		<td height="20" style="text-align:center;"><?php echo ($val['salesPromotion']==null)?无:$val['salesPromotion']."折";?></td>
       <td height="20" style="text-align:center;"><?php echo $val['pro_prices'];?></td>
	   <td height="20" style="text-align:center;"><?php echo $val['pro_num'];?></td>
		</tr>
     <?php
		}
	}
	 ?>
     
	   <tr bgcolor="#FFFFFF">
        <td height="20" colspan="7">
          总计费用:<?php echo $total;?>
          </td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="82" height="20">下单人：</td>
    <td colspan="3"><?php echo $user["user_account"];?></td>
  </tr>
  <?php $deliver_mes = explode('/',$rs['delivery_mes']);?>
  <tr>
    <td height="20">收货人：</td>
    <td height="20" colspan="3"><?php echo $deliver_mes[1];?></td>
  </tr>
  <tr>
    <td height="20">收货人地址：</td>
    <td height="20" colspan="3"><?php echo $deliver_mes[0];?></td>
  </tr>
  <tr>
    <td width="90">收货人电话：</td>
    <td width="163"><?php echo $deliver_mes[2];?></td>
  </tr>
  <tr>
    <td height="20">送货方式：</td>
    <td height="20"><?php echo $rs['delivery_way'];?></td>
   </tr>
</table>
</div>

<?php include "Public/footer.php";?>
</body>
</html>