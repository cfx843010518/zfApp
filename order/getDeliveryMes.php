<?php
	//获得某个用户的用于收货的详细信息
	require_once('../include/comm.php');
	$ret = -1;
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$sql = "select delivery_mes_id,delivery_address,receM_name,receM_phone from zf_user,zf_delivery_mes where zf_user.user_id=$user_id and zf_user.user_id = zf_delivery_mes.user_id";
		$rs = execQuery($sql);
		/*foreach($rs as $key=>$val){
			$user_address[$key] = array('deliver_mes_id'=>$val['delivery_mes_id'],'delivery_address'=>$val['delivery_address'],'receM_name'=>$val['receM_name'],'receM_phone'=>$val['receM_phone']);
		}*/
		$user_add = array('rece_mes'=>$rs);
		$ret =  json_encode($user_add);
	}
	echo $ret;
?>