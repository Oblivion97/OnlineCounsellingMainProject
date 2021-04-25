<?php 

$fname="";
$lname="";
$em="";
$em2="";
$userpreferences="";
$student_id="";
$password="";
$password2="";
$gender="";
$date="";
$error_array=array();

if (isset($_POST['register_button'])) {
	//First name
	$fname=strip_tags($_POST['reg_fname']);
	$fname=str_replace(' ','',$fname);
	$fname=ucfirst(strtolower($fname));
	$_SESSION['reg_fname']=$fname;
	//Last name
	$lname=strip_tags($_POST['reg_lname']);
	$lname=str_replace(' ','',$lname);
	$lname=ucfirst(strtolower($lname));
	$_SESSION['reg_lname']=$lname;
	//email
	$em=strip_tags($_POST['reg_email']);
	$em=str_replace(' ','',$em);
	$em=ucfirst(strtolower($em));
	$_SESSION['reg_email']=$em;
	//email 2
	$em2=strip_tags($_POST['reg_email2']);
	$em2=str_replace(' ','',$em2);
	$em2=ucfirst(strtolower($em2));
	$_SESSION['reg_email2']=$em2;

	//student/teacher check
	if(!empty($_POST['userpreferences'])){
		$userpreferences = $_POST['userpreferences'];
	}
	//$userpreferences=$_POST['userpreferences'];
	//$_SESSION['userpreferences']=$userpreferences;

	//student_id
	if(!empty($_POST['student_id'])){
		$student_id = $_POST['student_id'];
	}
	//$student_id=$_POST['student_id'];
	$_SESSION['student_id']=$student_id;

	//student_id validity check
	if (filter_var($student_id,FILTER_VALIDATE_EMAIL)) {
			$student_id=filter_var($student_id,FILTER_VALIDATE_EMAIL);
			//check email already not used
			$id_check = mysqli_query($con,"SELECT email FROM users WHERE email='$student_id'");

			//count number of rows returned
			$num_rows=mysqli_num_rows($id_check);
			if ($num_rows>0) {
				array_push($error_array,"student id Already in use.<br>");//storing a error message into a array.
			}
		}


	//password
	$password=strip_tags($_POST['reg_password']);

	
	//password 2
	$password2=strip_tags($_POST['reg_password2']);

	$date=date("Y-m-d");//current date

	if ($em==$em2) {
		//email validity check[regex]
		if (filter_var($em,FILTER_VALIDATE_EMAIL)) {
			$em=filter_var($em,FILTER_VALIDATE_EMAIL);
			//check email already not used
			$e_check = mysqli_query($con,"SELECT email FROM users WHERE email='$em'");

			//count number of rows returned
			$num_rows=mysqli_num_rows($e_check);
			if ($num_rows>0) {
				array_push($error_array,"Email Already in use.<br>");//storing a error message into a array.
			}
		}else{
			array_push($error_array, "Invalide Email Format.<br>");//storing a error message into a array.
		}
	}else{
		array_push($error_array, "Email Not Matched.<br>");//storing a error message into a array.
	}

	//First Name Validity Check
	if(strlen($fname)>25||strlen($fname)<2){
		array_push($error_array,"Your First name must be between 2 to 25 charecter.<br>");//storing a error message into a array.
	}

	//Last Name Validity Check
	if(strlen($lname)>25||strlen($lname)<2){
		array_push($error_array,"Your Last name must be between 2 to 25 charecter.<br>");//storing a error message into a array.
	}

	//Password Validity & Match check
	if($password!=$password2){
		array_push($error_array,"Password do not matched.<br>");//storing a error message into a array.
	}
	else{
		if (preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array,"your password can be only upper & lower case letters & numbers.<br>");//storing a error message into a array.
		}
	}
	if (strlen($password>30||strlen($password)<5)) {
		array_push($error_array, "your password must be between 5 to 30 charecter.<br>");//storing a error message into a array.
	}

	//
	//encrypting password & giving user a unique user name.
	//
	if (empty($error_array)) {
		$password=md5($password);//encrypt password before sending into the database.

		//genarating username by concataneting first&last name.
		$username=strtolower($fname . "_" . $lname);
		$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");

		$i=0;
		//if username exists add number to user name.
		while (mysqli_num_rows($check_username_query)!=0) {
			$i++;//Add 1 to i
			$username='username'. "_" .$i;
			$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");

		}
		//Default Profile Picture.
		$rand=rand(1,2);

		if($rand==1)
			$profile_pic="assets/images/profile_pics/defaults/head_belize_hole.png";
		else if ($rand==2)
			$profile_pic="assets/images/profile_pics/defaults/head_wet_asphalt.png";

		$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',','$userpreferences','$student_id')");

		array_push($error_array, "<span style='color: #116606;'>you are all set.</span><br>");

		//clear session variables
		$_SESSION['reg_fname']='';
		$_SESSION['reg_lname']='';
		$_SESSION['reg_email']='';
		$_SESSION['reg_email2']='';
	}
}

 ?>