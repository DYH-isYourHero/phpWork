<?php
if($_FILES["imageFile"]["error"]>0){
	echo "出错了~！错误代码:".$_FILES["imageFile"]["error"]."<br>";
}else{
	$fileName=$_FILES["imageFile"]["name"];
	$fileType=$_FILES["imageFile"]["type"];
	$fileTmpName=$_FILES["imageFile"]["tmp_name"];
	$uploadFileURL="E:\\uploads\\";
	echo $fileName."<br>".$fileTmpName."<br>".$uploadFileURL;
	echo "<hr>";
	echo $uploadFileURL.$fileName."<hr>";
	$allowFormat=array("jpg","jpeg","gif","png");
	$format=substr($fileName, strrpos($fileName, '.') + 1); 
	echo $format."sssss";
	if($fileType=="image/png"||$fileType=="image/jpeg"||"image/gif"&&in_array($format,$allowFormat)){
		if(file_exists($uploadFileURL.$fileName)){
			echo "文件已经存在~！";
		}else{
			move_uploaded_file($fileTmpName,$uploadFileURL.$fileName);
			echo "文件上传成功~！";
		}
	}else{
		echo "文件格式非法~！";
	}
}


?>