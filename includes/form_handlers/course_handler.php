
<?php

$course_code="";
$course_name="";
$credit="";
$error_array=array();

if (isset($_POST['submitbutton'])) {

	$course_code=($_POST['course_code']);
  $course_code=strip_tags($_POST['course_code']);
  $_SESSION['course_code']=$course_code;

	$course_name=($_POST['course_name']);
  $course_name=strip_tags($_POST['course_name']);
  $_SESSION['course_name']=$course_name;


	$credit=($_POST['credit']);
  $credit=strip_tags($_POST['credit']);
  $_SESSION['credit']=$credit;

			
	if (empty($error_array)) {

		$query_insertcourse = mysqli_query($con,"INSERT INTO courses VALUES ('', '$course_code', '$course_name', '$credit')");

		$_SESSION['course_code']='';
		$_SESSION['course_name']='';
		$_SESSION['credit']='';
	}		

}

?> 
