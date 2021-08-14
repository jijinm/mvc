<?php
session_start();
include ('includes/header.php');
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else{
	$page = 'home';
}
switch ($page) {
	case 'home':
		include ('includes/home.php');
		break;
	case 'about':
		include ('includes/about.php');
		break;
	case 'changepwd':
		include ('includes/change_password.php');
		break;
	case 'contact':
		include ('includes/contact.php');
		break;
	case 'login':
		include ('includes/login.php');
		break;
	case 'register':
		include ('includes/register.php');
		break;	
	case 'profile':
		include ('includes/profile.php');
		break;
	default:
		echo "Page Not Found";
		break;
}
include ('includes/footer.php');
?>