<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ProductController extends Controller {
	
	//显示所有商品
	public function findLimit(){
		$searchText = I('get.searchText','');
		$prodcutModel = M("product");
		$condition['supply_product_name'] = array('like',"%$searchText%");
		$rs = $prodcutModel->field('supply_product_name,product_id,pro_type_name,supplier_name,zf_supplier.supplier_id,stock_size,quality_time,product_image,pro_price')->where($condition)->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_pro_type ON zf_supplier_supply.pro_type_id = zf_pro_type.pro_type_id')->join('zf_supplier ON zf_supplier_supply.supplier_id = zf_supplier.supplier_id')->select();
		$hs = count($rs);					//算出总数据的记录条数
		$size = 8;							//规定每页只显示的记录的条数
		$page_num=ceil($hs/$size);			//算出总页数
		if(@$_GET['page_id']){
			$page_id=$_GET['page_id'];
			$start=($page_id-1)*$size;
		}else{
			$page_id=1;
			$start=0;
		}
		$rs = $prodcutModel->field('supply_product_name,product_id,pro_type_name,supplier_name,zf_supplier.supplier_id,stock_size,quality_time,product_image,pro_price')->where($condition)->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_pro_type ON zf_supplier_supply.pro_type_id = zf_pro_type.pro_type_id')->join('zf_supplier ON zf_supplier_supply.supplier_id = zf_supplier.supplier_id')->limit($start,$size)->select();
		// var_dump($rs);
		
		$this->assign('page_id',$page_id);	
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('hs',$hs);
		$this->assign('rs',$rs);
		$this->assign('searchText',$searchText);		
		$this->display('showProduct');
	}
	
	//搜索商品
	public function searchProduct(){
		$searchText = I('post.searchText');
		$prodcutModel = M("product");
		$rs = $prodcutModel->select();		//找出所有数据
		$hs = count($rs);					//算出总数据的记录条数
		$size = 6;							//规定每页只显示的记录的条数
		$page_num=ceil($hs/$size);			//算出总页数
		if(@$_GET['page_id']){
			$page_id=$_GET['page_id'];
			$start=($page_id-1)*$size;
		}else{
			$page_id=1;
			$start=0;
		}
		$condition['supply_product_name'] = array('like',"%$searchText%");
		$rs = $prodcutModel->field('supply_product_name,product_id,pro_type_name,supplier_name,zf_supplier.supplier_id,stock_size,quality_time,product_image,pro_price')->where($condition)->join('zf_supplier_supply ON zf_product.supplier_supply_id = zf_supplier_supply.supplier_supply_id')->join('zf_pro_type ON zf_supplier_supply.pro_type_id = zf_pro_type.pro_type_id')->join('zf_supplier ON zf_supplier_supply.supplier_id = zf_supplier.supplier_id')->limit($start,$size)->select();
		// var_dump($rs);
		$this->assign('page_id',$page_id);	
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('hs',$hs);
		$this->assign('rs',$rs);
		$this->assign('searchText',$searchText);
		$this->display('showProduct');
	}
	
	
	//添加商品
	public function saveProduct(){
		$model = M();
		$model->startTrans();				//开启事物
		if(isset($_POST['ok'])){ 			// 根据提交按钮的 name 属性值判断是否提交成功
			$supplier_id = $_POST['supplier'];	//获取供应商id
			
			// 处理供应商供应表
			$pro_type_id = $_POST['type'];
			$supply_product_name = $_POST['supply_product_name'];
			$produce_date_year = $_POST['produce_date_year'];
			$produce_date_month = $_POST['produce_date_month'];
			$produce_date_day = $_POST['produce_date_day'];
			$produce_date = $produce_date_year.'-'.$produce_date_month.'-'.$produce_date_day;
			//echo $produce_date;
			$quality_time = $_POST['quality_time'];
			$origin_address = $_POST['origin_address'];
			$product_introduce = $_POST['product_introduce'];
			$supplierSupplyModel = M("supplierSupply"); 			//创建实例
			$supplierSupplyModel->supplier_id = $supplier_id;
			$supplierSupplyModel->pro_type_id = $pro_type_id;
			$supplierSupplyModel->supply_product_name = $supply_product_name;
			$supplierSupplyModel->produce_date = $produce_date;
			$supplierSupplyModel->quality_time = $quality_time;
			$supplierSupplyModel->origin_address = $origin_address;
			$supplierSupplyModel->product_introduce = $product_introduce;
			$supplier_supply_id = $supplierSupplyModel->add();		//往供应商供应表添加一条记录
			// var_dump($supplier_supply_id);
			// 处理商品表
			$stock_size = $_POST['stock_size'];
			$pro_price = $_POST['pro_price'];
			$productModel = M('product');
			$productModel->supplier_supply_id = $supplier_supply_id;
			$productModel->stock_size = $stock_size;
			$productModel->pro_price = $pro_price;
			$product_id = $productModel->add();			//往商品表添加一条记录
			// var_dump($product_id);
			
			//处理折扣表
			$discountModel = M('discount');
			$discountModel->product_id = $product_id;
			$discountModel->add();
			
			// 处理商品供应表
			$supply_date_year = $_POST['supply_date_year'];
			$supply_date_month = $_POST['supply_date_month'];
			$supply_date_day = $_POST['supply_date_day'];
			$trade_price = $_POST['trade_price'];
			$supply_date = $supply_date_year.'-'.$supply_date_month.'-'.$supply_date_day;
			$proSupplyModel = M('proSupply');
			$proSupplyModel->product_id = $product_id;
			$proSupplyModel->supplier_id = $supplier_id;
			$proSupplyModel->supply_date = $supply_date;
			$proSupplyModel->trade_price = $trade_price;
			$ret = $proSupplyModel->add();				//往商品供应表添加一条记录
			if($ret&&$supplier_supply_id&&$product_id){
				//处理文件上传
				$photo = "";
				for($i=0;$i<count($_FILES['file']['name']);$i++){
					$tmp_name = $_FILES['file']['tmp_name'][$i];
					$type = $_FILES['file']['type'][$i];
					var_dump($type);
					$error = $_FILES['file']['error'][$i];
					$size = $_FILES['file']['size'][$i];
					$end = "";
					//判断文件类型
					if($type == 'image/png'){
						$end = ".png";	
					}else if($type == 'image/jpeg'){
						$end = ".jpg";	
					}
					$filename = 'pro'.$product_id.'_'.($i+1).$end;
					if($error==0&&$size<2097152){
						move_uploaded_file($tmp_name,'Public/images/product/'.$filename);
						// echo "文件上传成功!";
						$photo.=$filename.'/';
					}
				}
				$supplierSupplyModel->find($supplier_supply_id);
				$supplierSupplyModel->product_image = $photo;			//将上传的图片路径放进数据库
				$supplierSupplyModel->save();
				// $model->commit();
				// $this->success('添加商品成功','findLimit');
			}
			else{
				$model->rollback();
				// $this->success('添加商品失败','findLimit');
			}
			
		}
	}
	
	
	//增加商品的显示页面
	public function showAddProduct(){
		// echo '跳过来没有啊';
		$proTypeModel = M('proType');
		$types = $proTypeModel->select();
		$supplierModel = M('supplier');							//查出供应商名称
		$suppliers = $supplierModel->select();
		$this->assign('suppliers',$suppliers);
		$this->assign('types',$types);
		$this->display('addProduct');
	}
	
	
	//查询出来显示修改商品
	public function showChangeProduct(){
		if(isset($_GET['product_id'])){
			$product_id = $_GET['product_id'];
			$productModel = D("product");
			$rs = $productModel->getOnePro($product_id);
			// var_dump($rs);
			$proTypeModel = M('proType');							//查出商品的所有类别
			$types = $proTypeModel->select();
			$this->assign('types',$types);
			$supplierModel = M('supplier');							//查出供应商名称
			$suppliers = $supplierModel->select();
			$this->assign('suppliers',$suppliers);
			$this->assign('rs',$rs);
			$this->display('changeProduct');
			// var_dump($rs);
		}
	}
	
	//修改商品
	public function changeProduct(){
		if(isset($_POST['ok'])){ 						// 根据提交按钮的 name 属性值判断是否提交成功
			//修改供应商供应表
			$product_id = $_POST['product_id'];
			$supplier_supply_id = $_POST['supplier_supply_id'];		//获取供应商供应id
			$supplier_id = $_POST['supplier'];	//获取供应商id
			$pro_type_id = $_POST['type'];
			$supply_product_name = $_POST['supply_product_name'];
			$produce_date_year = $_POST['produce_date_year'];
			$produce_date_month = $_POST['produce_date_month'];
			$produce_date_day = $_POST['produce_date_day'];
			$produce_date = $produce_date_year.'-'.$produce_date_month.'-'.$produce_date_day;
			//echo $produce_date;
			$quality_time = $_POST['quality_time'];
			$origin_address = $_POST['origin_address'];
			$product_introduce = $_POST['product_introduce'];
			$supplierSupplyModel = M("supplierSupply"); 			//创建实例
			$supplierSupplyModel->find($supplier_supply_id);			//找出记录
			$supplierSupplyModel->supplier_id = $supplier_id;
			$supplierSupplyModel->pro_type_id = $pro_type_id;
			$supplierSupplyModel->supply_product_name = $supply_product_name;
			$supplierSupplyModel->produce_date = $produce_date;
			$supplierSupplyModel->quality_time = $quality_time;
			$supplierSupplyModel->origin_address = $origin_address;
			$supplierSupplyModel->product_introduce = $product_introduce;
			$supplierSupplyModel->save();		//修改供应商供应表一条记录
			$photo = "";
			//循环上传图片
			for($i=0;$i<count($_FILES['file']['name']);$i++){
				$filename = 'pro'.$product_id.'_'.($i+1).'.jpg';
				$tmp_name = $_FILES['file']['tmp_name'][$i];
				$error = $_FILES['upfile']['error'][$i];
				$size = $_FILES['upfile']['size'][$i];
				if($error==0&&$size<2097152){
					move_uploaded_file($tmp_name,'Public/images/product/'.$filename);
					// echo "文件上传成功!";
					$photo.=$filename.'/';
				}
			}
			$supplierSupplyModel->find($supplier_supply_id);
			$supplierSupplyModel->product_image = $photo;			//将上传的图片路径放进数据库
			$supplierSupplyModel->save();
			
			//修改商品表
			$stock_size = $_POST['stock_size'];
			$pro_price = $_POST['pro_price'];
			$discount = $_POST['discount'];
			if($discount==10){
				$is_discount = 'false';
				$discount_price = null;
			}else{
				$is_discount = 'true';
				$discount_price = $pro_price/100*($discount*10);
			}
			$productModel = M('product');
			$productModel->find($product_id);
			$productModel->stock_size = $stock_size;
			$productModel->pro_price = $pro_price;
			$productModel->discount_price = $discount_price;
			$productModel->is_discount = $is_discount;
			$productModel->save();					//修改商品
			
			//修改商品供应表
			$pro_supply_id = $_POST['pro_supply_id'];
			$supply_date_year = $_POST['supply_date_year'];
			$supply_date_month = $_POST['supply_date_month'];
			$supply_date_day = $_POST['supply_date_day'];
			$trade_price = $_POST['trade_price'];
			$supply_date = $supply_date_year.'-'.$supply_date_month.'-'.$supply_date_day;
			$proSupplyModel = M('proSupply');
			$proSupplyModel->find($pro_supply_id);
			$proSupplyModel->supplier_id = $supplier_id;
			$proSupplyModel->supply_date = $supply_date;
			$proSupplyModel->trade_price = $trade_price;
			$proSupplyModel->save();
			$this->success('修改商品成功','findLimit');
		
			
		}
	}
	
	//删除单个商品
	public function delProduct()
	{
		if(isset($_GET['product_id'])){
			$product_id = $_GET['product_id'];
			$proSupplyModel = M("proSupply");
			$productModel = M("product");
			$supplierSupplyModel = M('supplierSupply');	//创建实例
			$productModel->find($product_id);		//找出供应商供应id
			$supplier_supply_id = $productModel->supplier_supply_id;
			$rs = $supplierSupplyModel->find($supplier_supply_id);
			$photo = $rs['product_image'];				//把相片路读取出来
			$photo = explode('/',$photo);
			$condition['product_id'] = $product_id;
			if($proSupplyModel->where($condition)->delete()&&$productModel->where($condition)->delete()&&$supplierSupplyModel->delete($supplier_supply_id)){
				// 将该商品的图片也一并删掉
				for($i=0;$i<count($photo)-1;$i++){	//循环删除文件
					unlink('Public/images/product/'.$photo[$i]);
				}
				//同时将折扣表中的记录也删除
				$discountModel = M('discount');
				$condition2['product_id'] = $product_id;
				$discountModel->where($condition)->delete();
				$this->success('删除成功','findLimit');
			}else{
				$this->success('删除失败，该商品在订单中有记录','findLimit');
			}
			
		}
	}
	
	//删除所有商品
	public function delAllProducts(){
		$proSupplyModel = M("proSupply");
		$productModel = M("product");
		$supplierSupply = M('supplierSupply');
 		while(list($value,$name)=each($_POST)){
			$productModel->find($value);		//找出供应商供应id
			$supplier_supply_id = $productModel->supplier_supply_id;
			$condition['product_id'] = $value;
			$ret = $proSupplyModel->where($condition)->delete();
			$productModel->where($condition)->delete();
			$supplierSupply->delete($supplier_supply_id);
		}
		$this->success('删除成功','findLimit');	
	}
	
	
	
	//用于跳转的控制器
	public function toGo(){
		$url = $_GET['url'];
		if(isset($url)){
			$this->redirect($url,array());
		}
	}
}