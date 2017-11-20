<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends model{
	public function checkAdmin(){
		session_start();
		//include "include/lg_admin.php";
		if(isset($_POST['ok'])){
			$user=$_POST['user'];
			$password=$_POST['password'];
			$newpassword=md5($password);
			$code=$_POST['code'];
			$session=$_SESSION['identifying'];
			if($code==$session){
				//$query = findAdmin($user,$newpassword);
				$condition['name'] = $user;
				$condition['password'] = $password;
				$query = $this->where($condition)->find();
				if(!empty($query)){
					$_SESSION['username']=$user;
					$_SESSION['adminId'] = $query['id'];
					$_SESSION['sfdl']=1;
					return 1;
					//echo "<script>location.href='addgoods.php';</script>";
				}else{
					//echo "<script>alert('用户名或密码错误');</script>";
					//echo "<script>location.href='index.php';</script>";
					return 2;
				}
				
			}
			else{
				return 3;
			}
		}
	}
	
	//通过用户名获得一个admin用户
	public function getAdminByAccount($admin_account){
		$condition['admin_account'] = $admin_account;
		$query = $this->where($condition)->find();
		return $query;
	}
	
	
	
}
?>