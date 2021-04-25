 <?php 
require 'config/config.php';
$error_array=array();
session_destroy();
 ?>
<html>
<head>
	<title>Online Counselling</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
</head>
<body>
	<div class="wrapper">

		<div class="login_box">		
			<div class="login_header">
				<h1>Online Counseling</h1>
			</div>
			<div class="signin">
				<h3>Admin Sign-In</h3>
			</div>
			<hr/>
			<form action="admin.php"method="POST">
				Email: <br>
				<input type="email" name="log_email" placeholder="Email Adress" value=" <?php 
					 if (isset($_SESSION['log_email'])) {
						 echo $_SESSION['log_email'];
					 }
					 ?>" required>
				<br>
				Password: <br>
					<input type="password" name="log_password" placeholder="Password" id="password">
					<br>
					<input type="checkbox" onclick="myFunction()">Show Password
					<script src="./assets/js/show_hide_pass.js"></script>
				<br>
				<input type="submit" name="login_button"value="Login">
				<br>
				<?php if (in_array("Email Or Password was incorrect.<br>", $error_array)) {
					echo "Email Or Password was incorrect.<br>";
				} ?>
				<br>
				<a href="register.php" >
						User LogIn
					</a>
			</form>
		</div>
	</div>
</body>

<?php 
if (isset($_POST['login_button'])) {
	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //sanitize email

	$_SESSION['log_email']=$email;//store email into session variable.
	$password = $_POST['log_password'];//get password

	$check_database_query = mysqli_query($con,"SELECT * FROM admin WHERE email='$email' AND password='$password'");

	$check_login_query = mysqli_num_rows($check_database_query);

	if ($check_login_query==1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['username'];
		$_SESSION['username'] = $username;
		header("Location:course.php");
		exit();
	}else{
		array_push($error_array,"Email Or Password was incorrect.<br>");
	}
}

 ?>