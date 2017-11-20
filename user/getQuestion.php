<?php
	//把相对于用户的注册的时候设置的问题取出来
	require_once('../include/zf_user.php');
	$ret = -1;
	if(isset($_GET['user_account'])){
		$user_account = $_GET['user_account'];
		$rs = getUserByAccount($user_account);
		if(count($rs)==0){
			$ret = 0;
		}else{
			$user_id = $rs[0]['user_id'];
			$sql = "select question,answer from zf_passwordU,zf_question where user_id ='$user_id' and zf_passwordU.question_id=zf_question.question_id";
			//echo $sql2;
			$rs = execQuery($sql);
			//var_dump($rs);
			$ret = json_encode(array("que_Answer"=>$rs));
		}
	}
	echo $ret;
?>