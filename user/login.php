<?php
	require_once('../include/zf_user.php');
	require_once('../unit/writeLog.php');
	require_once('../unit/opUrl.php');
	session_start();
	record();	//日志记录
	$url = getUrl();		//获取项目url
	$ret = array('res'=> null,'status'=>'lose','errorMes'=>'数据库出错');
	//$ret = array('result'=>0,'user_id'=>'','user_account'=>'','user_name'=>'','user_password'=>'','user_photo'=>'','user_phone'=>'');
	if(isset($_POST['user_account'])){
		$user_account = $_POST['user_account'];
		$user_password = $_POST['user_password'];
		$rs = getUserByAccount($user_account);
		//$user = @$_SESSION['user'];
		//recordLogin($user);
		if(count($rs)!=0){
			$my_res = $rs[0];
			if($my_res['user_password']==$user_password){					//匹配密码
				//echo $my_res['user_online'];
				if($my_res['user_online']==0){
					//recordLogin($_SESSION['user']);
					$result = array('user_id'=>$my_res['user_id'],'user_account'=>$my_res['user_account'],'user_name'=>$my_res['user_name'],'user_password'=>$my_res['user_password'],'user_photo'=>$url.'image/'.$my_res['user_photo'],'user_phone'=>$my_res['user_phone'],'user_online'=>$my_res['user_online']);
					$ret = array('res'=>$result,'status'=>'success','errorMes'=>'');
					updateOnline(1,$my_res['user_id']);		//修改在线状态
				}
				else{
					$ret = array('res'=>null,'status'=>'lose','errorMes'=>'该账号已上线');
				}
			}
			else{
				$ret = array('res'=>null,'status'=>'lose','errorMes'=>'账号密码错误');
			}
		}
		else{
			$ret = array('res'=>null,'status'=>'lose','errorMes'=>'账号密码错误');
		}
	}
	echo json_encode($ret);  
?>