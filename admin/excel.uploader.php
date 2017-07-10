<?php
include'config/autoload.php';
header("Content-type: text/json");

$filename = $_POST['s_day'].$_POST['s_month'].$_POST['s_year'].'-'.$_POST['e_day'].$_POST['e_month'].$_POST['e_year'];

// New file upload
if(isset($_FILES['fileupload']) && $_FILES['fileupload']['name']){
	$temp = explode(".", $_FILES["fileupload"]["name"]);
	$excel_filename = $filename.'.'.end($temp);
	
	if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],"excel/".$excel_filename)){
		$message = 'Upload complate.';
		$status = true;
	}else{
		$message = "Upload Fail!";
		$status = false;
	}
}else{
	$message = 'file not found';
	$status = false;	
}

$data = array(
	"apiVersion" 	=> "1.0",
	"message" 		=> $message,
	"execute" 		=> round(microtime(true)-StTime,4),
	"data" => array(
		"filename" 		=> $excel_filename,
		"status" 		=> $status,
	),
);

echo json_encode($data);
?>