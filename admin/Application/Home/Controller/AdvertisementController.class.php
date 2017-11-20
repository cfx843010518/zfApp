<?php
namespace Home\Controller;
use Think\Controller;
class AdvertisementController extends Controller{
	public function findAdvertisement(){
		$id = $_GET['id'];
		if(isset($id)){
			$data['id'] = $id;
		}else{
			$data['id'] = 1;
		}
		$advertisementModel = D("Advertisement");
		$info = $advertisementModel->where($data)->find();
		$this->assign('info',$info);
		//var_dump($info);
		$this->display('advertisement');
	}
	
	//显示添加公告页面
	public function showAddAdvertiseMent(){
		$this->display('addAdvertisement');
	}
	
	//添加公告
	public function addAdvertiseMent(){
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['textarea'];
		$adModel = D('Advertisement');
		$adModel->create($data);
		$adModel->add();
		echo '<script>alert("添加成功");</script>';		//似乎找到这个问题了(明天解决)
		$this->display('addAdvertisement');
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
