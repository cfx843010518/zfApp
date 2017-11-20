<?php
		echo '写个脚本吧';
		$dir = "./product/";
		 // Open a known directory, and proceed to read its contents
		$file=scandir($dir);
		for($i=2;$i<count($file);$i++){
			echo $file[$i];			//遍历文件，实现多导入
			$files = explode(".",$file[$i]);
			rename("./product/".$file[$i],"./product/".$files[0].".png");
		}
	
?>