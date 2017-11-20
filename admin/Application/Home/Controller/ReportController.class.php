<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ReportController extends Controller {
	
	//报表导航
	public function index(){
		$this->display('rePortNavi');
	}
	
	// 查询出所有订单的报表
	// public function findAllOrder(){
		// $salesCountModel = D('salesCount');
		// $rs =$salesCountModel->select();		//找出所有数据
		// $hs = count($rs);					//算出总数据的记录条数
		// $size = 6;							//规定每页只显示的记录的条数
		// $page_num=ceil($hs/$size);			//算出总页数
		// if(@$_GET['page_id']){
			// $page_id=$_GET['page_id'];
			// $start=($page_id-1)*$size;
		// }else{
			// $page_id=1;
			// $start=0;
		// }
		// $rs = $salesCountModel->getAllOrderReport($start,$size);
		// var_dump($rs);
		// $this->assign('page_id',$page_id);	
		// $this->assign('page_num',$page_num);
		// $this->assign('size',$size);
		// $this->assign('hs',$hs);
		// $this->assign('rs',$rs);	
		// $this->assign('action','findAllOrder?');
		// $this->display('showAllReport');
	// }
	
	// public function findByDate(){
		// if(isset($_GET['year'])){
			// $order_date_year = $_GET['year'];
			// $order_date_month = $_GET['month'];
			// $salesCountModel = D('salesCount');
			// $rs = $salesCountModel->getOrderReportByDate1($order_date_year,$order_date_month);		//先找出所有数据
			// $hs = count($rs);					//算出总数据的记录条数
			// $size = 5;							//规定每页只显示的记录的条数
			// $page_num=ceil($hs/$size);			//算出总页数
			// if(@$_GET['page_id']){
				// $page_id=$_GET['page_id'];
				// $start=($page_id-1)*$size;
			// }else{
				// $page_id=1;
				// $start=0;
			// }
			// $rs = $salesCountModel->getOrderReportByDate2($start,$size,$order_date_year,$order_date_month);	//在找出分页数据
			// var_dump($rs);
			// $this->assign('page_id',$page_id);	
			// $this->assign('page_num',$page_num);
			// $this->assign('size',$size);
			// $this->assign('year',$order_date_year);
			// $this->assign('month',$order_date_month);
			// $this->assign('hs',$hs);
			// $this->assign('rs',$rs);	
			// $this->assign('action','findByDate?year='.$order_date_year.'&month='.$order_date_month.'&');
			// $this->display('showAllReport');		//以后再实现吧
			// }
	// }
	
	//月订单汇总
	public function orderGather(){
		$salesCountModel = D('salesCount');
		if(isset($_GET['year'])){
			$order_date_year = $_GET['year'];
			$order_date_month = $_GET['month'];
			$rs = $salesCountModel->orderGathers2($order_date_year,$order_date_month);
			$this->assign('year',$order_date_year);
			$this->assign('month',$order_date_month);
		}
		else{
			date_default_timezone_set('PRC');
			$year = date("Y");
			$rs = $salesCountModel->orderGathers1($year);
		}
		$pro_num = 0;
		$total = 0;
		foreach($rs as $key=>$val){
			$pro_num += $val['pro_num'];
			$total += $val['pro_num'] * $val['pro_prices'];
		}
		$this->assign('rs',$rs);
		$this->assign('pro_num',$pro_num);
		$this->assign('total',$total);
		$this->display('orderByMonth');
		//var_dump($rs);
	}
	
	//月订单明细汇总
	public function orderGatherDetail(){
		$salesCountModel = D('salesCount');
		if(isset($_GET['year'])){
			$order_date_year = $_GET['year'];
			$order_date_month = $_GET['month'];
			$rs = $salesCountModel->orderGathersDeail2($order_date_year,$order_date_month);
			$this->assign('year',$order_date_year);
			$this->assign('month',$order_date_month);
		}
		else{
			date_default_timezone_set('PRC');
			$year = date("Y");
			$rs = $salesCountModel->orderGathersDetail1($year);
		}
		$pro_num = 0;
		$total = 0;
		foreach($rs as $key=>$val){
			$pro_num += $val['pro_num'];
			$total += $val['pro_num'] * $val['pro_prices'];
		}
		$this->assign('rs',$rs);
		$this->assign('pro_num',$pro_num);
		$this->assign('total',$total);
		$this->display('orderByMonthDetail');
		//var_dump($rs);
	}
	
	//热销商品汇总
	public function hotProductTable(){
		$orderItemModel = M('orderItem');
		$productModel = D('product');
		$rs = $orderItemModel->field('product_id,count(product_id) num')->group('product_id')->order('num desc')->limit(10)->select();
		foreach($rs as $key=>$val){
			$ret[$key] = $productModel->getOnePro($val['product_id']);
		}
		$this->assign('ret',$ret);
		
		$this->display('HotProduct');
	}
	
	private function getExcel($fileName, $headArr, $data,$arr)
    {
        vendor('PHPExcel');
        $date = date("Y_m_d", time());
        $fileName .= "_{$date}.xls";
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        // 设置表头
        $key = ord("A");
        foreach ($headArr as $v) {
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
            $key += 1;
        }
        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        // print_r($data);exit;
        foreach ($data as $key => $rows) { // 行写入
            $span = ord("A");
            foreach ($rows as $keyName => $value) { // 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j . $column, $value);
                $span ++;
            }
            $column ++;
        }
		//这里实现一套算法把结尾弄上
		
		foreach($arr as $key =>$val){
			if(strpos($key,":")){
				$objPHPExcel->getActiveSheet()->mergeCells($key);
				$temp = explode(":",$key);
				$objActSheet->setCellValue($temp[0],$val);
			}
			else{
				$objActSheet->setCellValue($key,$val);
			}
		}
		//$objPHPExcel->getActiveSheet()->mergeCells('A6:D6'); 
		//$objActSheet->setCellValue("A6", "总计");
		$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$subObject = $objPHPExcel->getSheet(0);									//设置列宽
        $subObject->getColumnDimension('B')->setWidth(60);
		$subObject->getColumnDimension('C')->setWidth(10);
		$subObject->getColumnDimension('D')->setWidth(15);
		$subObject->getColumnDimension('E')->setWidth(10);
		$subObject->getColumnDimension('F')->setWidth(10);
		$subObject->getColumnDimension('I')->setWidth(30);
		
	   $fileName = iconv("utf-8", "gb2312", $fileName);
        // 重命名表
        // 设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); // 文件通过浏览器下载
        exit();
    }
	/**
     *
     * 导出热销商品表
     */
    public function expHostTable(){//导出Excel
        $headArr[] = '商品编号';
        $headArr[] = '商品名称';
        $headArr[] = '商品原价';
        $headArr[] = '生产日期';
		$headArr[] = '保质期';
		$headArr[] = '原产地';
		$headArr[] = '库存量';
		$headArr[] = '供应商';
        // 数据
		$orderItemModel = M('orderItem');
		$productModel = D('product');
		$rs = $orderItemModel->field('product_id,count(product_id) num')->group('product_id')->order('num desc')->limit(10)->select();
		foreach($rs as $key=>$val){
			$product = $productModel->getOnePro($val['product_id']);
			$ret[$key]['product_id'] = $product['product_id'];
			$ret[$key]['supply_product_name'] = $product['supply_product_name'];
			$ret[$key]['pro_price'] = $product['pro_price'];
			$ret[$key]['produce_date'] = $product['produce_date'];
			$ret[$key]['quality_time'] = $product['quality_time'];
			$ret[$key]['origin_address'] = $product['origin_address'];
			$ret[$key]['stock_size'] = $product['stock_size'];
			$ret[$key]['supplier_name'] = $product['supplier_name'];
		}
		$data = $ret;
        $filename = "热销商品表";
        $this->getExcel($filename, $headArr, $data); // $filename excel名称 $headArr excel表头 
	}
	
	// 导出销售汇总表
	public function expOrderAll(){//导出Excel
        $headArr[] = '订单编号';
        $headArr[] = '下单时间';
        $headArr[] = '商品名称';
        $headArr[] = '商品数量';
		$headArr[] = '单价';
		$headArr[] = '合计';
        // 数据
		$salesCountModel = D('salesCount');
		if(isset($_GET['year'])){
			$order_date_year = $_GET['year'];
			$order_date_month = $_GET['month'];
			$rs = $salesCountModel->orderGathers2($order_date_year,$order_date_month);
			$this->assign('year',$order_date_year);
			$this->assign('month',$order_date_month);
		}
		else{
			date_default_timezone_set('PRC');
			$year = date("Y");
			$rs = $salesCountModel->orderGathers1($year);
		}
		$pro_num = 0;
		$total = 0;
		foreach($rs as $key=>$val){
			$pro_num += $val['pro_num'];
			$total += $val['pro_num'] * $val['pro_prices'];
		}
		foreach($rs as $key=>$val){
			$ret[$key]['order_id'] = $val['order_id'];
			$ret[$key]['order_date'] = $val['order_date'];
			$ret[$key]['supply_product_name'] = $val['supply_product_name'];
			$ret[$key]['pro_num'] = $val['pro_num'];
			$ret[$key]['pro_price'] = $val['pro_price'];
			$ret[$key]['count'] = $val['pro_num']*$val['pro_price'];
		}
		//处理要合并的单元格
		$arr = array('A6:C6'=>'总计','D6'=>"".$pro_num,'E6:F6'=>"共".$total."元");
		$data = $ret;
        $filename = "月销量汇总表";
        $this->getExcel($filename, $headArr, $data,$arr); // $filename excel名称 $headArr excel表头 
	}
	
	// 导出销售明细表
	public function expOrderDetailAll(){//导出Excel
        $headArr[] = '订单编号';
        $headArr[] = '下单时间';
        $headArr[] = '购买用户';
        $headArr[] = '支付方式';
		$headArr[] = '支付时间';
		$headArr[] = '送货方式';
		$headArr[] = '商品名称';
		$headArr[] = '商品数量';
		$headArr[] = '单价(元)';
		$headArr[] = '合计(元)';
        // 数据
		$salesCountModel = D('salesCount');
		if(isset($_GET['year'])){
			$order_date_year = $_GET['year'];
			$order_date_month = $_GET['month'];
			$rs = $salesCountModel->orderGathersDeail2($order_date_year,$order_date_month);
			$this->assign('year',$order_date_year);
			$this->assign('month',$order_date_month);
		}
		else{
			date_default_timezone_set('PRC');
			$year = date("Y");
			$rs = $salesCountModel->orderGathersDetail1($year);
		}
		$pro_num = 0;
		$total = 0;
		foreach($rs as $key=>$val){
			$pro_num += $val['pro_num'];
			$total += $val['pro_num'] * $val['pro_prices'];
		}
		// var_dump($rs);
		foreach($rs as $key=>$val){
			$ret[$key]['order_id'] = $val['order_id'];
			$ret[$key]['order_date'] = $val['order_date'];
			$ret[$key]['user_account'] = $val['user_account'];
			$ret[$key]['pay_way'] = $val['pay_way'];
			$ret[$key]['pay_date'] = $val['pay_date'];
			$ret[$key]['delivery_way'] = $val['delivery_way'];
			$ret[$key]['supply_product_name'] = $val['supply_product_name'];
			$ret[$key]['pro_num'] = $val['pro_num'];
			$ret[$key]['pro_price'] = $val['pro_price'];
			$ret[$key]['count'] = $val['pro_num']*$val['pro_price'];
		}
		//处理要合并的单元格
		$arr = array('A6:G6'=>'总计','H6'=>"".$pro_num,'I6:J6'=>"共".$total."元");
		$data = $ret;
        $filename = "月销量明细汇总表";
        $this->getExcel($filename, $headArr, $data,$arr); // $filename excel名称 $headArr excel表头 
	}
	
	
	
	//用于跳转的控制器
	public function toGo(){
		$url = $_GET['url'];
		if(isset($url)){
			$this->redirect($url,array());
		}
	}
}