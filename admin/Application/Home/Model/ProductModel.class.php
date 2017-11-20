<?php
namespace Home\Model;
use Think\Model;
class ProductModel extends model{
	public function getAllPro($start,$size,$searchText){
		if($searchText!=''){
			$condition['supply_product_name'] = array('like',"%$searchText%");
		}
		$query = $this->field('supply_product_name,product_id,pro_type_name,supplier_name,zf_supplier.supplier_id,stock_size,quality_time,product_image,pro_price')->where($condition)->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_pro_type ON zf_supplier_supply.pro_type_id = zf_pro_type.pro_type_id')->join('zf_supplier ON zf_supplier_supply.supplier_id = zf_supplier.supplier_id')->limit($start,$size)->select();
		return $query;
	}
	
	public function getOnePro($product_id){
		$condition['zf_product.product_id'] = $product_id;
		$query = $this->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_supplier ON zf_supplier_supply.supplier_id = zf_supplier.supplier_id')->join('zf_pro_supply ON zf_product.product_id = zf_pro_supply.product_id')->join('zf_pro_type ON zf_supplier_supply.pro_type_id = zf_pro_type.pro_type_id')->where($condition)->find();
		//$query = $this->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_pro_type ON zf_supplier_supply.pro_type_id = zf_pro_type.pro_type_id')->join('zf_supplier ON zf_supplier_supply.supplier_id = zf_supplier.supplier_id')->find();
		return $query;
	}
}
?>