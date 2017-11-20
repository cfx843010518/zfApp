
<?php 
	
	//echo basename($_FILES['myFile']['name']);
	$target_path = "./upload/user/";//接收文件目录 
	$target_path = $target_path.basename($_FILES['myFile']['name']);  
	//echo $target_path;
	//basename() 函数返回路径中的文件名部分
	//$_FILES['myFile']['name'] 客户端文件的原名称。 
	//$_FILES['myFile']['type'] 文件的 MIME 类型，需要浏览器提供该信息的支持，例如"image/gif"。 
	//$_FILES['myFile']['size'] 已上传文件的大小，单位为字节。 
	//$_FILES['myFile']['tmp_name'] 文件被上传后在服务端储存的临时文件名，一般是系统默认。可以在php.ini
	//其中myFile是客户端的name属性
	if(move_uploaded_file($_FILES['myFile']['tmp_name'], $target_path)) { 
		echo "The file ".basename( $_FILES['myFile']['name'])." has been uploaded"; 
	}
	else{ 
		echo "There was an error uploading the file, please try again! ".$_FILES['myFile']['error']; 
	} 
?>

	
