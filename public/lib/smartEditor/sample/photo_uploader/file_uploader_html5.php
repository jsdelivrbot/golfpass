<?php
 	$sFileInfo = '';
	$headers = array();
	 
	foreach($_SERVER as $k => $v) {
		if(substr($k, 0, 9) == "HTTP_FILE") {
			$k = substr(strtolower($k), 5);
			$headers[$k] = $v;
		} 
	}
	$filename_ext = strtolower(array_pop(explode('.',$headers['file_name'])));
	$headers['file_name'] = time().".".$filename_ext;
	$file = new stdClass;
	$file->name = str_replace("\0", "", rawurldecode($headers['file_name']));
	$file->size = $headers['file_size'];
	$file->content = file_get_contents("php://input");
	
	$filename_ext = strtolower(array_pop(explode('.',$file->name)));
	$allow_file = array("jpg", "png", "bmp", "gif"); 
	
	$addName = strtotime(date("Y-m-d H:i:s"));  //현재날짜,시간,분초구하기
	
	$milliseconds = round(microtime(true) * 1000);  //밀리초 구하기
	
	$addName .= $milliseconds;       //파일이름에 밀리초 추가하기
	
	$file->name = $addName . '_' . $file->name;
	
	if(!in_array($filename_ext, $allow_file)) {
		echo "NOTALLOW_".$file->name;
	} else {
		$uploadDir = '../../upload/';
		if(!is_dir($uploadDir)){
			mkdir($uploadDir, 0777);
		}
		
		$newPath = $uploadDir.iconv("utf-8", "cp949", $file->name);
		
		if(file_put_contents($newPath, $file->content)) {
			$sFileInfo .= "&bNewLine=true";
			$sFileInfo .= "&sFileName=".$file->name;
			$sFileInfo .= "&sFileURL=/public/lib/smartEditor/upload/".$file->name;
		}
		
		echo $sFileInfo;
	}
?>