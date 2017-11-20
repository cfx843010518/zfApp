<?php
session_start();   //启动session
/*  生成一个4位随机数  */
$str="abcdefghijklmnopqrstuvwxyz0123456789";
for($i=0;$i<4;$i++){
	$num.=substr($str,rand(0,29),1);
}
$_SESSION['identifying']=$num;   //将随机数保存到session中
$img=imagecreate(60,20);    //创建一个60*20的图像
$white=ImageColorAllocate($img,255,255,255);  //设置图像的背景色为白色
$blue=ImageColorAllocate($img,0,0,255);   //设置图像中文本颜色为蓝色
/*  将多个颜色不同的*号添加到图像中  */
for($i=1;$i<200;$i++){
	$x=rand(1,60-9);
	$y=rand(1,20-6);
	$color=imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
	imagechar($img,1,$x,$y,"*",$color);
}
/*  将4位随机数添加到图像中，添加的位置不固定  */
$strx=rand(3,8);
for($i=0;$i<4;$i++){
	$strpos=rand(1,6);
	imagestring($img,5,$strx,$strpos,substr($num,$i,1),$blue);
	$strx+=rand(8,12);
}
header ("Content-type: image/jpg");  //设置输出图像的格式
ob_clean();//关键代码，防止出现'图像因其本身有错无法显示'的问题
imagegif($img);   //输出图像
?>
