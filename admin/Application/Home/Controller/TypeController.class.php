<?php
namespace Home\Controller;
use Think\Controller;
class TypeController extends Controller{
	
	//显示类型界面
	public function findLimit(){
		$searchText = I('get.searchText','');
		$proTypeModel = D("proType");
		$condition['pro_type_name'] = array('like',"%$searchText%");
		$rs = $proTypeModel->where($condition)->select();		//找出所有数据
		$hs = count($rs);					//算出总数据的记录条数
		$size = 7;							//规定每页只显示的记录的条数
		$page_num=ceil($hs/$size);			//算出总页数
		if(@$_GET['page_id']){				//分页算法
			$page_id=$_GET['page_id'];
			$start=($page_id-1)*$size;
		}else{
			$page_id=1;
			$start=0;
		}
		$rs = $proTypeModel->where($condition)->limit($start,$size)->select(); //调用分页方法
		//var_dump($rs);
		//给显示页面传值
		$this->assign('page_id',$page_id);		
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('hs',$hs);
		$this->assign('rs',$rs);
		$this->assign('searchText',$searchText);	
		//var_dump($rs);
		$this->display('showType');
	}
	
	//删除某个类型
	public function delType(){
		$pro_type_id = $_GET['pro_type_id'];
		$proTypeModel = D("proType");
		$tj = $proTypeModel->deleteTypeById($pro_type_id);
		if($tj==1){		//返回1则表明删除成功
			$this->success('删除成功', 'findLimit');
		}else{
			$this->error('删除失败,该商品种类有商品存在','findLimit');
		}
		
	}
	//显示增加类型页面
	public function showAddType(){
		$this->display('addType');
	}
	
	//增加一个种类
	public function addProType(){
		if(isset($_POST['ok'])){
			$pro_type_name = $_POST['pro_type_name'];
			$proTypeModel = M('proType');
			$proTypeModel->pro_type_name = $pro_type_name;
			$rs = $proTypeModel->add();
			if($rs!=-1){
				$this->success('添加成功', 'findLimit');
			}else{
				$this->error('添加失败', 'findLimit');
			}
		}
	}
	
	//修改类型
	public function comitChangeType(){
		if(isset($_GET['pro_type_id'])){
			$pro_type_id = $_GET['pro_type_id'];
			$pro_type_name = $_POST['pro_type_name'];
			$proTypeModel = M("proType");
			$proTypeModel->find($pro_type_id);
			$proTypeModel->pro_type_name = $pro_type_name;
			$rs = $proTypeModel->save();
			 $this->success('修改成功', 'findLimit');
			
		}
	}
	
	
	//显示修改类型的页面
	public function changeType(){
		$proTypeModel = M("proType");
		$pro_type_id = $_GET['pro_type_id'];
		$row = $proTypeModel->find($pro_type_id);
		$this->assign('row',$row);
		$this->assign('pro_type_id',$pro_type_id);
		$this->display('changeType');
	}
	
	
	//删除多个选项
	public function delAllType(){
		while(list($value,$name)=each($_POST)){  
			$proTypeModel = D("proType");
			$proTypeModel->deleteTypeById($value);
		}
		$this->success('删除成功', 'findLimit');
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
