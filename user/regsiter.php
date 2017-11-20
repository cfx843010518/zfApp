<?php
	require_once('../include/zf_user.php');
	require_once('../unit/writeLog.php');
	$ret = array('mes'=>'','status'=>'lose','errorMessage'=>'程序错误');
	if(isset($_POST['register'])&&$_POST['register'] != '')
	{
		$user_register = $_POST['register'];		//获取json格式
		//写日志
		recordReg($user_register);
		$user = json_decode($user_register);		//解析json格式的字符串
		if($user!=null){
			$user_account = $user->user_account;
			$user_password = $user->user_password;
			$user_name = $user->user_name;
			$user_phone = $user_account;
			$rs = getUserByAccount($user_account);
			if(count($rs)==0){
				// 写入数据库 
				$sql = "insert into zf_user(user_account,user_password,user_name,user_photo,user_phone,user_online) value('$user_account','$user_password','$user_name','00.png','$user_phone',0)";
				$rs = execUpdate($sql);
				$ret = array('mes'=>'','status'=>'success','errorMessage'=>'');
			}
			else{
				$ret = array('mes'=>'','status'=>'lose','errorMessage'=>'该用户已存在');
			}
		}
		else{
			$ret = array('mes'=>'','status'=>'lose','errorMessage'=>'json字符串解析错误');
		}
	}
	echo json_encode($ret);	

	
?>