<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	
	//显示登陆界面
	public function index(){
		$this->display('index');
	}
	
	
	//检查admin是否存在
	public function checkUser(){
		session_start();			//开启一个session会话
		if(isset($_POST['ok'])){
			$admin_account = $_POST['admin_account'];
			$admin_password = $_POST['admin_password'];
			$code = $_POST['code'];
			if($_SESSION['identifying']==$code){
				$adminModel = D('admin');
				$rs = $adminModel->getAdminByAccount($admin_account);
				//var_dump($rs);
				if($rs!=null){
					if($rs['admin_password'] == $admin_password){
						$_SESSION['user'] = $rs;
						$proTypeModel = M('proType');
						$types = $proTypeModel->select();		//查出商品的种类
						// var_dump($types);
						$this->assign('types',$types);
						$supplierModel = M('supplier');							//查出供应商名称
						$suppliers = $supplierModel->select();
						$this->assign('suppliers',$suppliers);
						$this->display('Main');
						
					}else{
						$this->display('index');
						echo "<script>alert('用户名或密码错误');</script>";
						
					}
				}else{
					$this->display('index');
					echo "<script>alert('用户名或密码错误');</script>";
				}
			}else{
				$this->display('index');
				echo "<script>alert('验证码不正确');</script>";
			}
		}
	}
	
	public function exits(){
		session_start();	
		unset($_SESSION['user']);
		$this->display('index');
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
