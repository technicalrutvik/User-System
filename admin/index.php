<?php
session_start();
if(isset($_SESSION['username'])){
	header('location:admin-dashboard.php');
	exit();
}

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title>Login | Admin</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
	   <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		html,body{
			height: 100%;

		}
	</style>
</head>
<body class="bg-dark">
<div class="container h-100">
	<div class="row align-items-center justify-content-center my-5">
		<div class="col-lg-5">
			<div class="card border-danger shadow-lg">
				<div class="card-header bg-danger">
					<h3 class="m-0 text-white"><i class="fas fa-user-cog"></i>&nbsp;Admin Panel Login</h3>
				</div>
				<div class="card-body">
					<form action="" method="post" class="px-3" id="admin-login-form">
						<div id="adminLoginAlert"></div>
						<div class="form-group">
							<input type="text" name="username" class="form-control form-control-lg rounded-0" placeholder="Username" required autofocus>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control form-control-lg rounded-0" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input type="submit" name="admin-login" class="btn btn-danger btn-block btn-lg rounded-0" value="Login" id="adminLoginBtn">
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>




<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.classom/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
 <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.classom/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script> --><!-- 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.classom/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script> -->

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script> 	

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
	// $(document).ready(function(){



	// 	$("#adminLoginBtn").click(function(e){
	// 		if($("#admin-login-form")[0].checkValidity()){
	// 			e.preventDefault();
	// 			$(this).val('Please Wait...');
			
	// 			$.ajax({
	// 				url:'assets/php/adminaction.php',
	// 				method:'post',
	// 				data: $("#admin-login-form").serialize()+'&action = adminLogin',
	// 				success:function(response){
	// 					//alert('hello')
	// 					console.log(response);
	// 					if(response === 'admin_login'){
	// 						window.location = 'admin-dashboard.php';
	// 					}else{
	// 						$("#adminLoginAlert").html(response);
	// 					}$("#adminLoginBtn").val('Login');
	// 				}
	// 			});
	// 		}
	// 	});
	// });
	$(document).ready(function(){
		$("#adminLoginBtn").click(function(e){
			if($("#admin-login-form")[0].checkValidity()){
				e.preventDefault();
				$(this).val('Please Wait');
				$.ajax({
					url:'assets/php/adminaction.php',
					method:'post',
					data: $("#admin-login-form").serialize()+'&action=adminLogin',
					success:function(response){
						//console.log(response);
						if(response === 'admin_login'){
						window.location = 'admin-dashboard.php';}
						else{
							$("#adminLoginAlert").html(response);
						}
						$("#adminLoginBtn").val('Login');
					}
				});
			}
		});
	})

</script>

</body>
</html>