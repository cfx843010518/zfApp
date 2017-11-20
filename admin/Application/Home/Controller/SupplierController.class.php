<?php
namespace Home\Controller;
use Think\Controller;
class SupplierController extends Controller{
	
	//列出所有供应商
	public function showAllSupplier(){
		$searchText = I('get.searchText','');
		$condition['supplier_name'] = array('like',"%$searchText%");
		$supplierModel = D("supplier");
		$rs = $supplierModel->where($condition)->select();		//找出所有数据
		$hs = count($rs);					//算出总数据的记录条数
		$size = 3;							//规定每页只显示的记录的条数
		$page_num=ceil($hs/$size);			//算出总页数
		if(@$_GET['page_id']){
			$page_id=$_GET['page_id'];
			$start=($page_id-1)*$size;
		}else{
			$page_id=1;
			$start=0;
		}
		
		$rs = $supplierModel->where($condition)->limit($start,$size)->select();
		// var_dump($rs);
		$this->assign('page_id',$page_id);	
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('hs',$hs);
		$this->assign('rs',$rs);
		$this->assign('searchText',$searchText);
		$this->display('showSupplier');
	}
	
	//显示修改页面
	public function changeSupplier(){
		$supplierModel = M("supplier");
		$supplier_id = $_GET['supplier_id'];
		$row = $supplierModel->find($supplier_id);
		$this->assign('row',$row);
		$this->assign('supplier_id',$supplier_id);
		$this->display('changeSupplier');
	}
	
	//显示增加供应商页面
	public function showAddSupplier(){
		$this->display('addSupplier');
	}
	
	//增加供应商
	public function addSupplier(){
		if(isset($_POST['ok'])){
			$supplier_name = $_POST['supplier_name'];
			$supplier_address = $_POST['supplier_address'];
			$supplier_phone = $_POST['supplier_phone'];
			$supplierModel = M('supplier');
			$supplierModel->supplier_name = $supplier_name;
			$supplierModel->supplier_address = $supplier_address;
			$supplierModel->supplier_phone = $supplier_phone;
			$rs = $supplierModel->add();
			if($rs!=-1){
				$this->success('添加成功', 'showAllSupplier');
			}else{
				$this->error('添加失败', 'showAllSupplier');
			}
		}
	}
	
	//提交修改
	public function comitChangeSupplier(){
		if(isset($_GET['supplier_id'])){
			$supplier_id = $_GET['supplier_id'];
			$supplier_name = $_POST['supplier_name'];
			$supplier_address = $_POST['supplier_address'];
			$supplierModel = M("supplier");
			$supplierModel->find($supplier_id);
			$supplierModel->supplier_name = $supplier_name;
			$supplierModel->supplier_address = $supplier_address;
			$rs = $supplierModel->save();
			$this->success('修改成功', 'showAllSupplier');
		}
	}
	
	//删除单个供应商
	public function delSupplier(){
		if(isset($_GET['supplier_id'])){
			$supplier_id = $_GET['supplier_id'];
			$supplierModel = M("supplier");
			if($supplierModel->delete($supplier_id)){
				$this->success('删除成功','showAllSupplier');
			}else{
				$this->success('删除失败,该供应商有商品存在','showAllSupplier');
			}
		}
	}
	
	
	//批量删除供应商
	public function delSuppliers(){
		$supplierModel = M("supplier");
		$supplierModel->startTrans();
		$leng = count($_POST);
 		$i = 0;
		while(list($value,$name)=each($_POST)){
			//echo $value;
			$i += $supplierModel->delete($value);
		}
		if($i == $leng){
			$supplierModel->commit();
			$this->success('删除成功','showAllSupplier');		
		}else{
			$supplierModel->rollback();
			$this->success('删除失败,部分供应商有仍商品存在','showAllSupplier');	
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
