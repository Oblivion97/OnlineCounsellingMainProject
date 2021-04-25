<?php 
include("includes/header.php");
$userLoggedIn =$_SESSION['username'];
$user_obj = new user($con,$userLoggedIn);
$user_obj->getFirstAndLastName();
?>

<div class="main_column column" id="main_column">
	<h4>User Closed</h4>

	This account is closed.
	<a href="index.php"> Click here to go back.</a>

</div>