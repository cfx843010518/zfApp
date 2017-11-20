<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加公告</title>
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
</head>

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
<div id="right" >
<script language="javascript">
function chkinput(form){
if(form.title.value=="")
{
alert("请输入公告主题!");
form.title.select();
return(false);
}
if(form.textarea.value=="")
{
alert("请输入公告内容!");
form.textarea.select();
return(false);
}
return(true);
}
</script>
<?php
session_start();
if(!isset($_SESSION['sfdl'])){
	echo "<script>alert('请先登录');</script>";
	echo "<script>location.href='http://localhost/bookEnd/admin/index.php/Home/Login/index';</script>";
}else{
	/*include_once "include/lg_advertisement.php";//引入数据库访问层代码
	if(isset($_POST["submit"])){
		$title=$_POST["title"];
		$content=$_POST["textarea"];
		$time=date('Y-m_d',time());
		
		$rec=addAdvertisement($title,$content,$time);//调用数据库访问层方法
		if($rec==1){//返回1则表示添加成功
			echo "<script> alert('添加成功'); </script>";
		}else{
			echo "<script> alert('添加失败'); </script>";
		 }
	}*/
}
?>
<p style="background:#628e37; padding-left:10px; color:#FFF;">您当前的位置：公告管理－＞添加公告</p>
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
<td height="175" bgcolor="#666666"><table width="670" height="175" border="0" align="center" cellpadding="0" cellspacing="1">
<form name="form1" method="post" action="addAdvertiseMent" onSubmit="return chkinput(this)">
<tr>
<td width="80" height="25" bgcolor="#FFFFFF"><div align="center">公告主题：</div></td>
<td width="667" bgcolor="#FFFFFF"><div  style="text-align:left; "><input type="text" name="title" size="50" class="inputcss"></div></td>
</tr>
<tr>
<td height="125" bgcolor="#FFFFFF"><div align="center">公告内容：</div></td>
<td height="125" bgcolor="#FFFFFF"><div style="text-align:left; ">
<textarea name="textarea" rows="8" cols="70" style="margin-left:10px;"></textarea>
</div></td>
</tr>
<tr>
<td height="25" colspan="2" bgcolor="#FFFFFF"><div align="center"><input type="submit" name="submit" value="添加" class="buttoncss"  style="width:55px; height:30px;">&nbsp;&nbsp;<input type="reset" value="重写" class="buttoncss "  style="width:55px; height:30px;"></div></td>
</tr>
</form>
</table></td>
</tr>
</table>
</div>
<?php include "footer.php";?>
</body>
</html>
