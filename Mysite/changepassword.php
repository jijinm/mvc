<?php
 session_start();
 include('includes/header.php');
 include('class/user-class.php');
 $user_obj = new user();
 if(isset($_POST)) {
 	$user_obj->changepassword($_POST);
 }
 else{
 	echo "Unable to process data";
 }
 include('includes/footer.php');
?>