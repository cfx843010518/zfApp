<?php
	require_once('../include/comm.php');
	$sql = "select * from zf_user where user_account='admin'";
	$rs = execQuery($sql);
	var_dump($rs);
	
?>