<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>测试</title>

</head>
<body>
<!--
	<form action="photo.php" method="post" enctype="multipart/form-data">
		<input type="text" name="user_account"/>
		<input type="password" name="user_password"/>
		<input type="file" name="myFile"/>
		<input type="submit" value="登录"/>
	</form>
	<a href="http://localhost/zfApp/product/test.php">测试</a>
-->
	
<form action="user/login.php" method="post">
		<input type="text" name="user_account"/>
		<input type="password" name="user_password"/>
		<input type="submit" value="登录"/>
</form>
	
	<?php
		echo '写个脚本吧';
		$dir = "./test/";
		 // Open a known directory, and proceed to read its contents
		$file=scandir($dir);
		for($i=2;$i<count($file);$i++){
			echo $file[$i];			//遍历文件，实现多导入
			$files = explode(".",$file[$i]);
			rename("./test/".$file[$i],"./test/".$files[0].".php");
		}
		
	?>
	
</body>
</html>