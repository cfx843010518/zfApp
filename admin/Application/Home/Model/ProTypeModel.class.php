<?php
namespace Home\Model;
use Think\Model;
class ProTypeModel extends model{
	
	public function deleteTypeById($pro_type_id){
		$query = $this->delete($pro_type_id);
		return $query;
	}
	
	
	
	/**
	public function saveGood(){
		if(isset($_POST['ok'])){ // 根据提交按钮的 name 属性值判断是否体积成功
		
			获取表单传过来的值，根据表单 name 属性的值获取值
		
			$data['goodsname']=$_POST['name'];
			$data['norms']=$_POST['norms'];
			$data['typeid']=$_POST['type'];
			$data['size']=$_POST['size'];
			$data['installment']=$_POST['installment'];
			$data['prodate']=$_POST['nian']."-".$_POST['yue']."-".$_POST['ri'];
			$data['odsprice']=$_POST['goodsprice'];
			$data['vipprice']=$_POST['vipprice'];
			$myfile="file";
			$data['introduction']=$_POST['introduction'];
			$data['recommend']=$_POST['recommend'];
			$data['newgoods']=$_POST['newgoods'];
			//$goods=findGoodsByGoodsName($name);	//应用数据库访问层的方法
			$goods = $this->where($data)->find();
			if(!empty($goods)){
				//商品已存在，返回结果2
				return 2;
				
			}
			else{
				if(is_uploaded_file($_FILES[$myfile]['tmp_name'])){				//判断是否为上传文件
					$tpname=$_FILES[$myfile]['name'];							//接收上传文件的文件名
					$type=$_FILES[$myfile]['type'];								//接收上传文件的类型
					$tmp=$_FILES[$myfile]['tmp_name'];							//接收上传文件的临时存放目录、文件名
					$error=$_FILES[$myfile]['error'];							//接收上传文件的错误返回值
					$photo="upimages/".$tpname;
					switch($type){												//判断上传文件的类型，只能上传pjpeg,jpeg,gif,png图片格式的文件
						case "image/pjpeg": $pdz=1; break;
						case "image/jpeg": $pdz=1; break;
						case "image/gif": $pdz=1; break;
						case "image/png": $pdz=1; break;
						default: echo "不能上传其它格式文件！";
					}
					if($pdz==1 && $error==0){
						move_uploaded_file($tmp,$photo); //如果上传文件的格式正确且上传成功，则将文件从临时目录放入uploads文件夹
						
						//$ztj=addGoods($typeid,$norms,$name,$size,$installment,$prodate,$goodsprice,$vipprice,$photo,$introduction,$recommend,$newgoods);//应用数据库访问层的方法
						$data['photo'] = $photo;
						//$this->create($data);
						$this->create($data);
						$ztj = $this->add();
						if($ztj){			
						//返回结果为主键则添加成功
							return 1;

						}
						else{
							//添加失败时返回结果3
							return 3;
			
						}
					}
				}
				else{
					echo "<script>alert('图片上传失败');</script>";
				}
			}
		
		}
	}
	*/
	
}
?>