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
	

?>