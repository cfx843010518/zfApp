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
		if(isset($_POST['ok'])){ // �����ύ��ť�� name ����ֵ�ж��Ƿ�����ɹ�
		
			��ȡ����������ֵ�����ݱ� name ���Ե�ֵ��ȡֵ
		
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
			//$goods=findGoodsByGoodsName($name);	//Ӧ�����ݿ���ʲ�ķ���
			$goods = $this->where($data)->find();
			if(!empty($goods)){
				//��Ʒ�Ѵ��ڣ����ؽ��2
				return 2;
				
			}
			else{
				if(is_uploaded_file($_FILES[$myfile]['tmp_name'])){				//�ж��Ƿ�Ϊ�ϴ��ļ�
					$tpname=$_FILES[$myfile]['name'];							//�����ϴ��ļ����ļ���
					$type=$_FILES[$myfile]['type'];								//�����ϴ��ļ�������
					$tmp=$_FILES[$myfile]['tmp_name'];							//�����ϴ��ļ�����ʱ���Ŀ¼���ļ���
					$error=$_FILES[$myfile]['error'];							//�����ϴ��ļ��Ĵ��󷵻�ֵ
					$photo="upimages/".$tpname;
					switch($type){												//�ж��ϴ��ļ������ͣ�ֻ���ϴ�pjpeg,jpeg,gif,pngͼƬ��ʽ���ļ�
						case "image/pjpeg": $pdz=1; break;
						case "image/jpeg": $pdz=1; break;
						case "image/gif": $pdz=1; break;
						case "image/png": $pdz=1; break;
						default: echo "�����ϴ�������ʽ�ļ���";
					}
					if($pdz==1 && $error==0){
						move_uploaded_file($tmp,$photo); //����ϴ��ļ��ĸ�ʽ��ȷ���ϴ��ɹ������ļ�����ʱĿ¼����uploads�ļ���
						
						//$ztj=addGoods($typeid,$norms,$name,$size,$installment,$prodate,$goodsprice,$vipprice,$photo,$introduction,$recommend,$newgoods);//Ӧ�����ݿ���ʲ�ķ���
						$data['photo'] = $photo;
						//$this->create($data);
						$this->create($data);
						$ztj = $this->add();
						if($ztj){			
						//���ؽ��Ϊ��������ӳɹ�
							return 1;

						}
						else{
							//���ʧ��ʱ���ؽ��3
							return 3;
			
						}
					}
				}
				else{
					echo "<script>alert('ͼƬ�ϴ�ʧ��');</script>";
				}
			}
		
		}
	}
	*/
	
}
?>