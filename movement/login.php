<?php include'config/autoload.php';?>
<?php
// Permission
if(!$user_online){
	header("Location: ../login.php?message=redirect_from_movement");
	die();
}
?>