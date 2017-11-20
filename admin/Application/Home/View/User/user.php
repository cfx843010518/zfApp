<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<title>查看用户</title>
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
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
</script>
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
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：会员管理－＞查看会员</p>
<form action="findUser" method="GET">
	<span style="color:#006699;">用户账号<span><input type="text" name="searchText"/>
	<input type="submit" value="搜索"/>
</form>
<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "<script>alert('请先登录');</script>";
	echo "<script>location.href='__APP__';</script>";
}else{
	if($total==0){
		echo "本站暂无用户注册!";
	}else{
	   
?> 
<form action="delAllUser" method="post" onsubmit="return confirm('确定要删除这些用户？')">
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align:right;">
<tr>
<td height="50" bgcolor="#666666">
<table width="670" height="25" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td width="50" height="25" bgcolor="#FFFFFF"><div align="center">复选</div></td>
<td width="100" bgcolor="#FFFFFF"><div align="center">用户账号</div></td>
<td width="100" bgcolor="#FFFFFF"><div align="center">用户密码</div></td> 
<td width="100" bgcolor="#FFFFFF"><div align="center">用户昵称</div></td>
<td width="150" bgcolor="#FFFFFF"><div align="center">用户电话</div></td>
<td width="150" bgcolor="#FFFFFF"><div align="center">头像</div></td>
<td width="150" bgcolor="#FFFFFF"><div align="center">是否在线</div></td>
<td width="248" bgcolor="#FFFFFF"><div align="center">操作</div></td>
</tr>
<?php
foreach($rs as $key=>$value){
?>
<tr title="message">
<td height="25" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" name="<?php echo $value["user_id"];?>" value="<?php echo $value["user_id"];?>"></div></td>
<td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $value["user_account"];?></div></td>
<td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $value["user_password"];?></div></td>
<td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $value["user_name"];?></div></td>
<td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $value["user_phone"];?></div></td>
<td height="25" bgcolor="#FFFFFF"><div align="left"><span title="__PUBLIC__/images/user/<?php echo $value["user_photo"];?>">查看照片</span></div></td>
<td height="25" bgcolor="#FFFFFF"><div align="left"><?php echo ($value["user_online"]==1)?是:否;?></div></td> 
<td height="25" bgcolor="#FFFFFF"><div align="center"><a href="delUser?user_id=<?php echo $value["user_id"];?>" onclick="return confirm('确定要删除该用户？')">删除</a></div></td>
</tr>
<?php
	}
}
?>
</table></td>
</tr>
</table>
<table width="670" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td  style="text-align:right; padding-right:10px;"> 
<input type="submit" value="删除选择项" class="buttoncss" style="margin-right:10px;float:left;">
<?php
echo "本站共有&nbsp;";
echo $total;
echo "&nbsp;条记录&nbsp;";
echo "每页显示&nbsp;";
echo $size;
echo "&nbsp;条&nbsp;";
echo "第&nbsp;";
echo $page_id;
echo "&nbsp;页/共&nbsp;";
echo $page_num;
echo "&nbsp;页&nbsp;";
if($page_id>=1 && $page_num>1){
	echo "<a href=findUser?page_id=1&searchText=$searchText>第一页</a>";
}
if($page_id>1 && $page_num>1){
	echo "<a href=findUser?searchText=$searchText&page_id=".($page_id-1).">上一页</a>";
}
if($page_id>=1 && $page_num>$page_id){
	echo "<a href=findUser?searchText=$searchText&page_id=".($page_id+1).">下一页</a>";
}
if($page_id>=1 && $page_num>1){
	echo "<a href=findUser?searchText=$searchText&page_id=".$page_num.">尾页</a>";
}
?>
</td>
</tr>
</table>
<?php }?></form>
</div>
<?php include "Public/footer.php";?>
</body>
</html>