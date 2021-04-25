<?php 
require 'config/config.php';
include ("includes/classes/Message.php");

 if (isset($_SESSION['username'])) {
 	$userLoggedIn =$_SESSION['username'];

 	/*header user name */
 	
 	$user_details_query = mysqli_query($con,"SELECT * FROM users WHERE username='$userLoggedIn'");
 	$user = mysqli_fetch_array($user_details_query);
 }
 else{
 	header("location: register.php");
 }
 ?>

<html>
<head>
	<title>Welcome to Feed</title>
	
	<!-- javascript from get bootstarp.com -->
	<script <source src="assets/js/jquery.min.js"></script>
	<script <source src="assets/js/bootstrap.js"></script>
	<script <source src="assets/js/bootbox.min.js"></script>
	<script <source src="assets/js/demo.js"></script>
	<script <source src="assets/js/jquery.jcrop.js"></script>
	<script <source src="assets/js/jcrop_bits.js"></script>
	
	<!-- css from get bootstarp.com -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.Jcrop.css" type="text/css" />
	
	<!-- site header css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<!-- site logo -->
	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Online Counselling</a>
		</div>

		<nav>
			<a href=" <?php echo $userLoggedIn; ?> " style="color: #ffffff">
				<!-- Headbar user name show code snap -->
				<?php 
					echo $user['userpreferences']." : ".$user['first_name']." ".$user['last_name']; 
				?>
			</a>
			<!-- headbar icon -->
			<a href="index.php" style="color: #000000">
				<i class="fas fa-home fa-lg"></i>
			</a>
			<a href="messages.php" style="color: #000000">
				<i class="fas fa-envelope fa-lg"></i>
			</a>
			<a href="#" style="color: #000000">
				<i class="far fa-bell fa-lg"></i>
			</a>
			<a href="requests.php" style="color: #000000">
				<i class="fas fa-user-friends fa-lg"></i>
			</a>
			<a href="settings.php" style="color: #000000">
				<i class="fas fa-cog fa-lg"></i>
			</a>
			<a href="includes/user_logout.php" style="color: #000000">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</nav>
	</div>

	<div class="wrapper">
 