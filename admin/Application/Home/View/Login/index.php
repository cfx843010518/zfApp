<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录</title>
<link href="__PUBLIC__/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="logo">
<h1><img src="__PUBLIC__/images/zf.jpg" />品品特产后台管理系统</h1>
<form action="__CONTROLLER__/checkUser" method="post">
  <p>用户名：
    <input name="admin_account" type="text" id="user" />
  </p>
  <p>
   密码：
      <input name="admin_password" type="password" id="password" style="margin-left:11px;"/>
  </p>
  <p>
    验证码：
      <input name="code" type="text"style=" width:60px;"/><img src="__PUBLIC__/include/code.php"/>
  </p>
  <input name="ok" type="submit" style="background:url(__PUBLIC__/images/denglu.gif); border:0px; width:61px ; height:29px;  margin-left:30px;" value="登陆" />
  <input type="reset" style="background:url(__PUBLIC__/images/denglu.gif)  ; width:61px ; border:0px;   height:29px; margin-left:30px; " value="重置" />
</form>
</div>

</body>
</html>
