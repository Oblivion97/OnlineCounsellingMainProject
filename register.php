 <?php

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
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
				<h3>Sign-In</h3>
			</div>
			<hr/>
			<form action="register.php"method="POST">
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
			</form>

				<form action="register.php" method="POST">
					<div class="signup">
						<h3>Sign-Up</h3>
					</div>
					<hr/>
					First Name: <br>
					 <input type="text" name="reg_fname" placeholder="First Name" value=" <?php
					 if (isset($_SESSION['reg_fname'])) {
						 echo $_SESSION['reg_fname'];
					 }
					 ?>" required>
					<br>

					<?php  if(in_array("Your First name must be between 2 to 25 charecter.<br>", $error_array)) echo "Your First name must be between 2 to 25 charecter.<br>";?>

					Last Name: <br>
					 <input type="text" name="reg_lname" placeholder="Last Name" value=" <?php
					 if (isset($_SESSION['reg_lname'])) {
						 echo $_SESSION['reg_lname'];
					 }
					 ?>" required>
					<br>

					<?php  if(in_array("Your Last name must be between 2 to 25 charecter.<br>", $error_array)) echo "Your Last name must be between 2 to 25 charecter.<br>";?>

					i am a teacher:
					<input type="radio" value="Teacher" name="userpreferences" onclick="hideStudentIdTextBox()">
					<br>

					i am a student:
					<input type="radio" value="Student" name="userpreferences"  onclick="showStudentIdTextBox()" >

						<p id="text" style="display:none">
							<input type="text" name="student_id" placeholder="Student id"  >
						</p>

						<script>
						function showStudentIdTextBox() {
						     var text = document.getElementById("text");
						     text.style.display = "block";
						}

						function hideStudentIdTextBox() {
						     var text = document.getElementById("text");
						     text.style.display = "none";
						}
						</script>


					<br>
					Email: <br>
					 <input type="text" name="reg_email" placeholder="Email" value=" <?php
					 if (isset($_SESSION['reg_email'])) {
						 echo $_SESSION['reg_email'];
					 }
					?>" required>
					<br>

					Confirm Email: <br>
					 <input type="text" name="reg_email2" placeholder="Confirm Email" value=" <?php
					 if (isset($_SESSION['reg_email2'])) {
						 echo $_SESSION['reg_email2'];
					 }
					?>" required>
					<br>



					<?php
					  if(in_array("Email Already in use.<br>", $error_array)) echo "Email Already in use.<br>";
						else if(in_array("Invalide Email Format.<br>", $error_array)) echo "Invalide Email Format.<br>";
						else if(in_array("Email Not Matched.<br>", $error_array)) echo "Email Not Matched.<br>";
					?>

					Password: <br>
					 <input type="Password" name="reg_password" placeholder="Password" required>
					<br>

					Confirm Password: <br>
					 <input type="Password" name="reg_password2" placeholder="Confirm Password" required>
					<br>

					<?php
					  if(in_array("Password do not matched.<br>", $error_array)) echo "Password do not matched.<br>";
						else if(in_array("your password can be only upper & lower case letters & numbers.<br>", $error_array)) echo "your password can be only upper & lower case letters & numbers.<br>";
						else if(in_array("your password must be between 5 to 30 charecter.<br>", $error_array)) echo "your password must be between 5 to 30 charecter.<br>";
					?>
					<br>
					<input type="submit" name="register_button" value="Register">
					<br><br>
					<?php
					  if(in_array("<span style='color: #116606;'>you are all set.</span><br>", $error_array)) echo "<span style='color: #116606;'>you are all set.</span><br><br>";
					  ?>


					<a href="./admin.php" >
						Admin LogIn
					</a>
				</form>
		</div>
	</div>
</body>
</html>
