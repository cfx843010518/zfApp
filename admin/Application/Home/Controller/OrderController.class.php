<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller{
	
	//查询所有订单
	public function findOrder(){
		//接受状态
		if(isset($_GET['status'])&& $_GET['status']!=0){
			$condition['zf_order.order_status_id'] = $_GET['status'];
		}
		
		if(isset($_GET['from'])&&$_GET['from']!=''){
			$from = $_GET['from']." 00:00:00";
		}else{
			$from = '';
		}
		if(isset($_GET['to'])&&$_GET['to']!=''){
			$to = $_GET['to']." 00:00:00";
		}else{
			$to = '';
		}
		$orderModel = D("order");
		if($from!=''&&$to!=''){
			$condition['order_date'] = array(array('GT',$from),array('LT',$to),'AND');
		}else{
			$condition['order_date'] = array('NEQ','');
		}
		// var_dump($orderModel);
		$orders = $orderModel->join('zf_user ON zf_order.user_id = zf_user.user_id')->where($condition)->select();		//找出所有数据
		//var_dump($orders);
		$total = count($orders);					//算出总数据的记录条数
		//var_dump($total);
		// echo $total;
		$size = 9;							//规定每页只显示的记录的条数
		$page_num=ceil($total/$size);			//算出总页数
		if(@$_GET['page_id']){
			$page_id=$_GET['page_id'];
			$start=($page_id-1)*$size;
		}else{
			$page_id = 1;
			$start=0;
		}
		// echo $page_id;
		$orders = $orderModel->getAllOrder($condition,$start,$size);
		//var_dump($orders);
		$this->assign('orders',$orders);
		$this->assign('page_id',$page_id);	
		$this->assign('page_num',$page_num);
		$this->assign('size',$size);
		$this->assign('total',$total);
		$this->assign('from',$_GET['from']);
		$this->assign('to',$_GET['to']);
		$this->assign('status',$_GET['status']);
		$this->display('order');
	}
	
	//查看详细订单
	public function showDetailOrder(){
		if(isset($_GET['order_id'])){
			$order_id = $_GET['order_id'];
			$orderModel = D('order');
			$orderUserMes = $orderModel->getOrderUserMes($order_id);
			//var_dump($orderUserMes);
			//echo '<br/>';
			$orderItemModel = D('orderItem');
			$orderDetailProMes = $orderItemModel->getOrderDetailProMes($order_id);	//获取该订单商品的信息
			//var_dump($orderDetailProMes);
			//var_dump($orderDetailProMes);
			//算出商品总价
			$total = 0;
			foreach($orderDetailProMes as $key=>$val){
				$price = $val['pro_prices'];
				$pro_num = $val['pro_num'];
				$total += ($price * $pro_num);
			}
			$deliveryModel = D('delivery');
			$orderDetailOthMes = $deliveryModel->getOrderDetailOthMes($order_id);	//获取该订单收获信息
			//var_dump($orderDetailOthMes);
			$this->assign('user',$orderUserMes);
			$this->assign('appraise',$appraise);
			$this->assign('goodList',$orderDetailProMes);
			$this->assign('rs',$orderDetailOthMes);
			$this->assign('total',$total);
			$this->display('showDetailOrder');
			//var_dump($orderDetailMes);
		}
	}
	
	//修改订单状态
	public function updateOrderStatus(){
		if(isset($_POST['ok'])){
			$model = M();
			$model->startTrans();
			$order_id = $_POST['order_id'];
			$order_status_id = $_POST['status'];
			$orderModel = M('order');				
			$orderModel->find($order_id);
			$orderModel->order_status_id = $order_status_id;		//修改订单状态
			$rs1 = $orderModel->save();
			if($rs1){
				$model->commit();
				$this->success('修改成功','showDetailOrder?order_id='.$order_id);
			}
		}
	}
	
	//删除某条订单
	public function delIndent(){
		$orderid=$_GET["id"];
		if(isset($orderid)){
			$data['orderid'] = $orderid;
			$indentModel = D("Indent");
			$jg = $indentModel->where($data)->delete();
			if($jg==1){//返回1则表示删除成功
				//$this->show("<script>alert('订单删除成功!')</script>");
			}
		}
		$this->findOrder();
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
