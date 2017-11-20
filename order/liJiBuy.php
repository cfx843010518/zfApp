<?php
	require_once('../include/comm.php');
	$ret = array('res'=>array(),'status'=>'lose');
	if(isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$sql = "select * from zf_delivery_mes where user_id=$user_id";
		$rs = execQuery($sql);
		if(count($rs)!=0){
			$ret = array('res'=>$rs[0],'status'=>'success');
		}
		
	}
	echo json_encode($ret);

?>