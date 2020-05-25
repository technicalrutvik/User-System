<?php 

require_once 'assetes/php/session.php';

if(isset($_GET['email'])){
	$email = $_GET['email'];
	$cuser->verify_email($email);
	header('location:profile.php');
	exit();
}
else{
	header('locarion:index.php');
	exit(); 
}


?>