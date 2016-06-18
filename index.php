<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php?message=login_again");
	die();
}else if($user->status == 'deactive'){
    header("Location: error_permission.php?message=user_deactive");
    die();
}else{
	if(!empty($user->section_redirect)){
		header("Location: ".$user->section_redirect."/index.php?");
    	die();
	}else{
		header("Location: error_permission.php?message=you_dont_have_permission");
    	die();
	}
}
?>