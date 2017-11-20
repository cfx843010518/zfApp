<?php
namespace Home\Controller;
use Think\Controller;
class DiscountController extends Controller{
	
	//显示商品折扣界面
	public function findLimit(){
		$searchText = I('get.searchText','');
		$productModel = M("product");
		$condition['supply_product_name'] = array('like',"%$searchText%");
		$rs = $productModel->where($condition)->select();		//找出所有数据
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
		$rs = $productModel->field('zf_product.product_id,supply_product_name,origin_address,salesPromotion,groupBuying,HolidayPreferences')->where($condition)->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('LEFT JOIN zf_discount ON zf_product.product_id = zf_discount.product_id')->limit($start,$size)->select(); //调用分页方法
		//var_dump($rs);
		//给显示页面传值
		$this->assign('page_id',$page_id);		
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('hs',$hs);
		$this->assign('rs',$rs);
		$this->assign('searchText',$searchText);	
		//var_dump($rs);
		$this->display('showDiscount');
	}
	
	
	//显示修改折扣的页面
	public function changeDiscount(){
		$productModel = M("product");
		$product_id = $_GET['product_id'];
		$condition['zf_product.product_id'] = $product_id;
		$row = $productModel->field('zf_product.product_id,supply_product_name,origin_address,salesPromotion,groupBuying,HolidayPreferences')->where($condition)->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('LEFT JOIN zf_discount ON zf_product.product_id = zf_discount.product_id')->find();
		//var_dump($row);
		$this->assign('row',$row);
		$this->display('changeDiscount');
	}
	
	//修改折扣
	public function comitchangeDiscount(){
		if(isset($_GET['product_id'])){
			$product_id = $_GET['product_id'];
			$salesPromotion = ($_GET['salesPromotion']==10)?null:$_GET['salesPromotion'];
			// echo $salesPromotion;
			$group = $_GET['group'];
			$Buying = $_GET['Buying'];
			if($group==0){
				$groupBuying = null;
			}else{
				$groupBuying = $group.'/'.$Buying;
			}
			$HolidayPreferences = ($_GET['HolidayPreferences']==10)?null:$_GET['HolidayPreferences'];
			$condition['product_id'] = $product_id;
			$discountModel = M('discount');
			$rs = $discountModel->where($condition)->find();
			$rs['salesPromotion'] = $salesPromotion;
			$rs['groupBuying'] = $groupBuying;
			$rs['HolidayPreferences'] = $HolidayPreferences;
			$discountModel->save($rs);
			$this->success('修改成功', 'findLimit');
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
