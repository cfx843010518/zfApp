<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改管理员</title>
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function lbyz(from){
if(form.user.value==''){
alert('请输入用户名');
form.user.select();
return false;
}
if(form.password.value==''){
alert('请输入密码');
form.password.select();
return false;
}
if(form.newpassword.value!=form.repassword.value){
alert('密码不一致');
return false;
}
}
</script>
<body>
<div id="header">
	<h1><img src="__PUBLIC__/images/LeGo.gif" />LG后台管理界面</h1>
</div>
<div id="left">
	<h3><img src="__PUBLIC__/images/houtai1_03.gif"/>商品管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Goods/showAddGood">填加商品</a></li>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Goods/findLimit">管理商品</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />类别管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif"  border="0px"/><a href="toGo?url=Type/findLimit">编辑类别</a></li>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Type/changeType">填加类别</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />用户管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=User/findUser">会员管理</a></li>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Admin/index">管理员管理</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />订单管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Indent/findOrder">管理订单</a></li>
	</ul>
	<h3><img src="__PUBLIC__/images/houtai1_03.gif" />公告管理<img src="__PUBLIC__/images/houtai1_03.gif" /></h3>
	<ul>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Advertisement/findAdvertisement">编辑公告</a></li>
	<li><img src="__PUBLIC__/images/houtai_03.gif" /><a href="toGo?url=Advertisement/showAddAdvertiseMent">添加公告</a></li>
	</ul>
</div>
<?php
session_start();
if(!isset($_SESSION['sfdl'])){
	echo "<script>alert('请先登录');</script>";
	echo "<script>location.href='http://localhost/bookEnd/admin/index.php/Home/Login/index';</script>";
}
?>
<div id="right" >
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：用户管理－＞修改管理员</p>
<form action="changeAdmin" method="post"  onsubmit="return lbyz(this)" >
<table width="670" border="0" cellpadding="0" cellspacing="0">
<tr>
<td  bgcolor="#666666"><table width="670" cellspacing="1" border="0px">
<tr>
  <td width="62"  bgcolor="#FFFFFF" colspan="3"><div>当前您的用户名:</div></td>
  <td width="163"  bgcolor="#FFFFFF" colspan="3"><div><?php  echo $_SESSION["username"];?></div></td>

</tr> 
<tr>
  <td width="62"  bgcolor="#FFFFFF"><div>新用户名:</div></td>
  <td width="163"  bgcolor="#FFFFFF"><input type="text" name="newuser"  style="width:140px;" /></td>
  <td width="74"  bgcolor="#FFFFFF"><div>新用户密码:</div></td>
  <td width="140"  bgcolor="#FFFFFF"><input type="text" name="newpassword" style="width:140px;" /></td>
   <td width="70"  bgcolor="#FFFFFF"><div>确认密码:</div></td>
  <td width="142"  bgcolor="#FFFFFF"><input type="text" name="repassword" style=" width:140px;" /></td>
  
</tr> 
 <tr>
  <td colspan="4"  bgcolor="#FFFFFF"><input type="submit" name="ok" value="提交修改"  />                <input type="reset"  value="重&nbsp;置"/>                <div></div></td>
   <td colspan="2" bgcolor="#FFFFFF"></td>
</tr>         
</table></td>
</tr>
</table>
</form>
</div>
</body>
</html>
