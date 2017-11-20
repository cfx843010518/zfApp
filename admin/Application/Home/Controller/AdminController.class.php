<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller{
	
	//显示会员管理页面
	public function index(){
		$this->display('admin');
	}
	
	//修改会员信息
	public function changeAdmin(){
		if(isset($_POST['ok'])){
		
			$data['name']=$_POST['newuser'];
			$data['password']=md5($_POST['newpassword']);
			$repassword=$_POST['repassword'];
			$adminModel = D("Admin");
			$adminModel->create($data);
			$res = $adminModel-> add();
			//$hs=addAdmin($newuser,$newpassword);
			if($res!=1){
				echo "<script>alert('添加成功');</script>";		//弹窗布局会乱
			}
			else{
				echo "<script>alert('添加失败');</script>";
			}
			$this->display('admin');
		}
	}
	
	//用于跳转的控制器
	public function toGo(){
		$url = $_GET['url'];
		if(isset($url)){
			$this->redirect($url,array());
		}
	}
}
?>
