<?php
namespace Home\Controller;
use Think\Controller;
class FlyController extends Controller{
	//显示品品之旅
	public function findLimit(){
		$searchText = I('get.searchText','');
		$flyModel = D("fly");
		$condition['fly_theme'] = array('like',"%$searchText%");
		$rs = $flyModel->where($condition)->select();		//找出所有数据
		
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
		$rs = $flyModel->where($condition)->limit($start,$size)->order('fly_time desc')->select();//调用分页方法
		$this->assign('page_id',$page_id);	
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('total',$total);
		$this->assign('rs',$rs);
		$this->assign('searchText',$searchText);			
		//var_dump($rs);
		$this->display('showFly');
	}
	
	//查看旅途详情
	public function showFlyDetail(){
		$fly_id = $_GET['fly_id'];
		$condition['fly_id'] = $fly_id;
		$rs = M('fly')->where($condition)->join('LEFT JOIN zf_product ON zf_fly.product_id = zf_product.product_id')->join('LEFT JOIN zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->find();
		$this->assign('rs',$rs);
		//var_dump($rs);
		$this->display('showFlyDetail');
	}
	
	
	//添加旅途页面
	public function showAddFly(){
		$prodcutModel = M("product");
		$rs = $prodcutModel->field('supply_product_name,product_id')->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->select();
		$this->assign('rs',$rs);
		$this->display('showAddFly');
	}
	
	//添加旅途
	public function addFly(){
		$product_id = $_POST['product'];
		$fly_theme = $_POST['fly_theme'];
		$detail_introduction = $_POST['detail_introduction'];
		$fly_theme = $_POST['fly_theme'];
		$detail_introduction = $_POST['detail_introduction'];
		$fly_time = $_POST['fly_time'];
		$fly_address = $_POST['fly_address'];
		$fly_expense = $_POST['fly_expense'];
		$flyModel = M("fly");
		$flyModel->product_id = $product_id;
		$flyModel->fly_theme = $fly_theme;
		$flyModel->detail_introduction = $detail_introduction;
		$flyModel->fly_time = $fly_time;
		$flyModel->fly_address = $fly_address;
		$flyModel->fly_expense = $fly_expense;
	    $fly_id = $flyModel->add();		//往旅途表添加一条记录

		//读取上传过来的图片
		$photo = "";
		for($i=0;$i<count($_FILES['file']['name']);$i++){
			$filename = 'fly'.$fly_id.'_'.($i+1).'.jpg';
			$tmp_name = $_FILES['file']['tmp_name'][$i];
			$error = $_FILES['upfile']['error'][$i];
			$size = $_FILES['upfile']['size'][$i];
			if($error==0&&$size<2097152){
				move_uploaded_file($tmp_name,'Public/images/fly/'.$filename);
				// echo "文件上传成功!";
				$photo.=$filename.'/';
			}
		}
		$flyModel->find($fly_id);
		$flyModel->fly_photo = $photo;			//将上传的图片路径放进数据库
		$flyModel->save();
		$this->success('添加旅途成功','findLimit');
	}
	
	//查询出来显示修改旅途
	public function showChangeFly(){
		if(isset($_GET['fly_id'])){
			$fly_id = $_GET['fly_id'];
			$flyModel = M("fly");
			$rs = $flyModel->find($fly_id);
			// var_dump($rs);
			$this->assign('rs',$rs);
			$this->display('changeFly');
			//var_dump($rs);
		}
	}
	//修改旅途
	public function comitChangeFly(){
		if(isset($_POST['ok'])){ 						// 根据提交按钮的 name 属性值判断是否提交成功
			//修改供应商供应表
			$fly_id = $_GET['fly_id'];
			$fly_theme = $_POST['fly_theme'];
			$detail_introduction = $_POST['detail_introduction'];
			$fly_time = $_POST['fly_time'];
			$fly_address = $_POST['fly_address'];
			$fly_expense = $_POST['fly_expense'];
			$flyModel = M('fly');
			$flyModel->find($fly_id);
			$flyModel->fly_theme = $fly_theme;
			$flyModel->detail_introduction = $detail_introduction;
			$flyModel->fly_time = $fly_time;
			$flyModel->fly_address = $fly_address;
			$flyModel->fly_expense = $fly_expense;
			$flyModel->save();		//修改旅途
			$this->success('修改成功','findLimit');
		
			
		}
	}
	
	public function deletePhoto($photo){
		$photo = explode('/',$photo);
		$condition['product_id'] = $product_id;
		// 将该商品的图片也一并删掉
		for($i=0;$i<count($photo)-1;$i++){	//循环删除文件
			unlink('Public/images/fly/'.$photo[$i]);
		}
	}
	
	
	//删除单个旅途
	public function delFly(){
		$fly_id =$_GET["fly_id"];
		$flyModel = M('fly');
		$flyModel->find($fly_id);
		$this->deletePhoto($flyModel->fly_photo);
		$flyModel->delete();
		$this->success('删除成功', 'findLimit');
	}
	
	//删除多个旅途
	public function delAllFlys(){
		$flyModel = M('fly');
		while(list($value,$name)=each($_POST)){  
			$flyModel->find($value);
			$this->deletePhoto($flyModel->fly_photo);
			$flyModel->delete();
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
