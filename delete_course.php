 <?php 

require 'config/config.php';
require 'course.php';

if(!isset($_SESSION)) { 
    session_start(); 
}

 ?>

<html>
<body>
<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($con,"DELETE from courses where id='$id'");
if($query1)
{
     
	header("Location:course.php");
	exit();
}else{
     
    header("Location:course.php");
    exit();
}
}
?>
</body>
</html>