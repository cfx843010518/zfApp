<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	//显示所有会员
	public function findUser(){
		$searchText = I('get.searchText','');
		$userModel = D("user");
		$condition['user_account'] = array('like',"%$searchText%");
		$rs = $userModel->where($condition)->select();		//找出所有数据
		
		$total = count($rs);					//算出总数据的记录条数
		$size = 4;							//规定每页只显示的记录的条数
		$page_num=ceil($total/$size);			//算出总页数
		if(@$_GET['page_id']){					//处理分页算法
			$page_id=$_GET['page_id'];
			$start=($page_id-1)*$size;
		}else{
			$page_id = 1;
			$start=0;
		}
		$rs = $userModel->where($condition)->limit($start,$size)->select();//调用分页方法
		$this->assign('page_id',$page_id);	
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('total',$total);
		$this->assign('rs',$rs);
		$this->assign('searchText',$searchText);			
		//var_dump($rs);
		$this->display('user');
	}
	
	//删除单个会员
	public function delUser(){
		$user_id =$_GET["user_id"];
		$userModel = D("User");
		$jg=$userModel->deleteUserById($user_id);
		if($jg==1){	//返回1则表明删除成功
			$this->success('删除成功', 'findUser');
		}else{
			$this->error('删除失败,该用户有订单存在', 'findUser');
		}
	}
	
	//删除多个会员
	public function delAllUser(){
		$userModel = D("User");
		while(list($value,$name)=each($_POST)){  
			$userModel->deleteUserById($value);
		}
		$this->success('删除成功', 'findUser');
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
