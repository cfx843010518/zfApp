<?php
	require_once('../include/comm.php');
	require_once('../unit/opUrl.php');
	$url = getUrl();		//获取项目url
	// substr($url,0,strpos($url, 'flight'));
	$url = substr($url,0,strpos($url, 'fly'));	//获取项目url
	$photoPath = $url.'admin/Public/images/fly/';
	//echo $photoPath;
	$return = array('iamge'=>array(),'image_num'=>0,'status'=>'lose');
	$sql = "select fly_id,fly_photo from zf_fly";
	$rs = execQuery($sql);
	if(count($rs)!=0){
		foreach($rs as $key=>$val){
			$photos = explode('/',$val['fly_photo']);
			$ret[$key] = array('fly_id'=>$val['fly_id'],'photo'=>$photoPath.$photos[0]);
			// $ret[$key] = $photos[0];
		}
		$return = array('image'=>$ret,'image_num'=>count($ret),'status'=>'success');
	}
	echo json_encode($return);

?>