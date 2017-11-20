<?php
	require_once('../include/zf_user.php');
	require_once('../unit/writeLog.php');
	$ret = -1;
	if($_POST['user_id']){
		$user_id = $_POST['user_id'];
		$rs = getUserById($user_id);
		if(count($rs)!=0){
		//处理文件上传 
			if(isset($_FILES['user_photo']['name'])){
				$_FILES['user_photo']['name'] = '0'.$user_id.'.jpg';				//修改图片名字，便于管理
				$target_path = "image/";
				$target_path = $target_path.basename($_FILES['user_photo']['name']);
				$img_type = $_FILES['user_photo']['type'];		//获取图片类型
				$img_size = $_FILES['user_photo']['size'];
				recoreImg($target_path,$img_type,$img_size);		//记录上传的图片信息
				if(($img_type=='image/jpeg'&&$img_size<10485760)||($img_type=='image/png'&&$img_size<10485760)||($img_type=='application/octet-stream'&&$img_size<10485760)){
					if(move_uploaded_file($_FILES['user_photo']['tmp_name'],$target_path)){
						$user_photo = basename($_FILES['user_photo']['name']);
						$sql = "update zf_user set user_photo='$user_photo' where user_id=$user_id";
						$ret = execUpdate($sql);
					}
				}
			}
		}else{
			$ret = 0;
		}
	}
	echo $ret;

?>