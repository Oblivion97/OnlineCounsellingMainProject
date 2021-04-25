<?php
ob_start();//turn on output buffer. 
/*session_start();*/
if(!isset($_SESSION)){ 
    session_start(); 
} 

$timezone= date_default_timezone_set("Asia/Dhaka");
$con = mysqli_connect("localhost","root","", "oc");//Sql connection variable

if(mysqli_connect_error()){
	echo "Failed to Connect : " . mysqli_connect_error(); 
}
?>