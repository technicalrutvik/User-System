
<?php
	require_once 'assetes/php/session.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<title><?= ucfirst(basename($_SERVER['PHP_SELF'],'.php')); ?> | Ghori</title>
	



   

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href=""https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js integrity="sha256-oKpAiD7qu3bXrWRVxnXLV1h7FlNV+p5YJBIr8LOCFYw=" crossorigin="anonymous">  

	 <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/> 

	<style type="text/css">
		

	</style>
</head>
<body>

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><i class="fas fa-code"></i>&nbsp; &nbsp;Rutvik</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link <?= (basename($_SERVER['PHP_SELF'])== "home.php")? "active" :"";	 ?>" href="home.php"><i class="fas fa-home"></i>&nbsp; Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (basename($_SERVER['PHP_SELF'])== "profile.php")? "active" :"";	 ?>" href="profile.php"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= (basename($_SERVER['PHP_SELF'])== "feedback.php")? "active" :"";	 ?>" href="feedback.php"><i class="fas fa-comment-dots"></i>&nbsp;Feedback</a>
      </li>
       <li class="nav-item">
        <a class="nav-link <?= (basename($_SERVER['PHP_SELF'])== "notification.php")? "active" :"";   ?>" href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notification&nbsp;<span id="checkNotification"></span></a>
      </li>
        <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
        	 <i class="fas fa-user-cog"></i>&nbsp; Hi!  <?= $cname; ?>
        </a>
        <div class="dropdown-menu">
        	<a  class="dropdown-item" href="#"><i class="fas fa-cog"></i>&nbsp;Setting</a>
        	<a  class="dropdown-item" href="assetes/php/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
        </div>
      </li>
    </ul>
  </div>

</nav>

