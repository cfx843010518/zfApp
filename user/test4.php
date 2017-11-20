<?php
	//echo 'http://'.$_SERVER['SERVER_ADDR'].$_SERVER["REQUEST_URI"];
	//echo $_SERVER['SERVER_NAME'];
	$PHP_SELF=$_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
	$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF, '/')+1);
	$image = array(
		array('value'=>$url.'/'.'image/01.jpg'),
		array('value'=>$url.'/'.'image/02.jpg'),
		array('value'=>$url.'/'.'image/03.jpg'),
		array('value'=>$url.'/'.'image/04.jpg'),
		array('value'=>$url.'/'.'image/05.jpg'),
		array('value'=>$url.'/'.'image/06.jpg'),
		array('value'=>$url.'/'.'image/07.jpg'),
		array('value'=>$url.'/'.'image/08.jpg'),
		array('value'=>$url.'/'.'image/09.jpg'),
		array('value'=>$url.'/'.'image/10.jpg'),
	);
	$ima = array('image'=>$image);
	echo json_encode($ima);
	
pro4_1.jpg/pro4_2.jpg/pro4_3.jpg/pro4_4.jpg/pro4_5.jpg/pro4_6.jpg/pro4_7.jpg/pro4_8.jpg/pro4_9.jpg/pro4_10.jpg/pro4_11.jpg/pro4_12.jpg/pro4_13.jpg/
pro3_1.jpg/pro3_2.jpg/pro3_3.jpg/pro3_4.jpg/pro3_5.jpg/pro3_6.jpg/pro3_7.jpg/pro3_8.jpg/pro3_9.jpg/pro3_10.jpg/pro4_11.jpg/pro4_12.jpg/pro4_13.jpg/

?>