<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require 'vendor/autoload.php';
	$mail = new PHPMailer(true);
	require_once 'auth.php';
	$user=new Auth();

	//Handle Register Ajax Request
	if(isset($_POST['action']) && $_POST['action']=='register'){
	$name=$user->test_input($_POST['name']);
	$email=$user->test_input($_POST['email']); 
	$pass =$user->test_input($_POST['password']);	

	$hpass=password_hash($pass, PASSWORD_DEFAULT);
	if($user->user_exist($email)){
		echo $user->showMessage('warning','This Email is already register!');	
	}
	else{
		if($user->register($name,$email,$hpass)){
			echo 'register';
			$_SESSION['user']=$email;
			$mail->isSMTP();
			$mail->Host='smtp.gmail.com';
			$mail->SMTPAuth =true;
			$mail->Username=Database::USERNAME;
			$mail->Password=Database::PASSWORD;
			$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port=587;


			$mail->setFrom(Database::USERNAME,'Ghori');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject='E-mail Verification';
			$mail->Body  =  '<h3>Click the Below link to verify your E-mail.<br><a href="http://localhost/hello/user-systemfi/verify-email.php?email='.$email.'">http://localhost/hello/user-systemfi/verify-email.php?email='.$email.'</a><br>Regards<br>Ghori!</h3>';
			$mail->send();
		}
		else{
			echo $user->showMessage('danger','Somethinf went wrong');
		}
	}
}	


	//Handle Ajax Request
	if(isset($_POST['action']) && $_POST['action'] == 'login'){
		$email=$user->test_input($_POST['email']);
		$pass=$user->test_input($_POST['password']);
		$loggedInUser=$user->login($email);

		if($loggedInUser != null){
			if(password_verify($pass, $loggedInUser['password'])){
				if (!empty($_POST['rem'])) {
					setcookie("email",$email,time()+(30*24*60*60),'/');
					setcookie("password",$pass,time()+(30*24*60*60),'/');
				}
				else{
					setcookie("email","",1,'/');
					setcookie("password","",1,'/');
							}
			echo 'login';
			$_SESSION['user']=$email;

			}
			
			else{
				echo $user->showMessage('danger','password is incorrect');
			}
		}
		else{
			echo $user->showMessage('danger','User Not Found');
		}
	}
	if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
	$email=$user->test_input($_POST['email']);
	$user_found=$user->currentUser($email);

	if($user_found!=null){
		$token=uniqid();
		$token=str_shuffle($token);

		$user->forgot_password($token,$email);
	
		try{
			$mail->isSMTP();
			$mail->Host='smtp.gmail.com';
			$mail->SMTPAuth =true;
			$mail->Username=Database::USERNAME;
			$mail->Password=Database::PASSWORD;
			$mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port=587;


			$mail->setFrom(Database::USERNAME,'Ghori');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject='Reset Password';
			$mail->Body  =  '<h3>Click the Below link to reset your Password.<br><a href="http://localhost/hello/user-systemfi/reset-passs.php?email='.$email.'&token='.$token.'">http://localhost/user-systemfinal/reset-passs.php?email='.$email.'&token='.$token.'</a><br>Regards<br>Ghori!</h3>';
			$mail->send();
			echo $user->showMessage('success','We have send you the reset link in your e-mail Id,please check your e-mail!'); 
		}catch(Exception $e)
			{
			echo $user->showMessage('danger','Something went wrong please try again later!');
		}
	}else{
		echo $user->showMessage('info','This email is not registered!');
	}
}

	//Checking User is logged in or not
	if(isset($_POST['action']) && $_POST['action']=='checkUser'){
		if(!$user->currentUser($_SESSION['user'])){
			echo 'bye';
			unset($_SESSION['user']);
		}
	}

?>