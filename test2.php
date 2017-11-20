<?php
	require_once('include/zf_shoppingCar.php');
	// {"user_account":"13192295128","user_password":"a","user_name":"你好"}
	// $a1 = array(1,2,3,4,5);
	$json = array('user_account'=>'131922','user_password'=>"a","user_name"=>'你好');
	$ret = json_encode($json);
	echo $ret;
	
	$user = json_decode($ret);
	$user_account = $user->user_account;
	$user_password = $user->user_password;
	$user_name = $user->user_name;
	$sql = "insert into zf_user(user_account,user_password,user_name,user_photo) value('$user_account','$user_password','$user_name','00.png')";
	$ret = execUpdate($sql);
	
	// $user_id = $res->user_id;
	// $product_ids = $res->product_ids;
	// foreach($product_ids as $key => $val){
		// deleteOne_ShoppingCar($user_id,$val);
	// }
	// $str = "陈佛鑫";
	// $bytes = array();
	// for($i=0;$i<strlen($str);$i++){
		// $bytes[] = ord($str[$i]); 
	// }
	// print_r($bytes);
	// echo '<br/>';
	
	// $str = ''; 
	// foreach($byte as $ch) { 
		// echo $ch."  ";
		// $str.= chr($ch); 
	// } 
	// print_r($str); 
	// var_dump($str);
?>