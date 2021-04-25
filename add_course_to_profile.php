<?php 
	require 'config/config.php';
	include("includes/classes/user.php");
	
	$userLoggedIn =$_SESSION['username'];
	$user_obj = new user($con,$userLoggedIn);
	$user_obj->getFirstAndLastName();

 ?>
<html>
    <head>
        <title>Online Counseling</title>
        <link rel="stylesheet" type="text/css" href="assets/css/addtoprofile_style.css">
        <script src="uikit/js/jquery.js"></script>

        <link rel="stylesheet" href="uikit/css/uikit.min.css" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- UI KIT JS File -->
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/uikit-icons.min.js"></script>

  
    <!-- javascript from get bootstarp.com -->
    <script <source src="assets/js/bootstrap.js"></script>
    
    <!-- css from get bootstarp.com -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    
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
          $user_obj = new user($con,$userLoggedIn);
          echo $user_obj->getFirstAndLastName();
         ?>
      </a>
      <!-- headbar icon -->
      <a href="index.php" style="color: #000000">
        <i class="fas fa-home fa-lg"></i>
      </a>
      <a href="register.php" style="color: #000000">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </nav>
  </div>
 <!-- ---------------------------------------------------------
COURSES IN PROFILE AND DELETE
--------------------------------------------------------- -->
    <div class="mycourse">
      <h2>MY Course List</h2>
    </div>
     <hr/>
    <table class='uk-table uk-table-striped'> 
        <tr> 
            <td style="font-weight:bold" bgcolor="#ff9d3a">Course Code</td> 
            <td style="font-weight:bold" bgcolor="#ff9d3a">Course Name</td>
            <td style="font-weight:bold" bgcolor="#ff9d3a">Action</td> 
 
        </tr> 
          <!-- course list And add to profile code -->
        <?php 
            $username=$user_obj->username;
            $sql=mysqli_query($con,"SELECT * FROM course_profile where username='$username'"); 
             
              
            while ($row=mysqli_fetch_array($sql)) { 
              $ccode=$row['course_code'];
              $cname=$row['course_name'];
              $cid=$row['id'];
              $username=$user_obj->username;
                  
        ?> 
            <?php  

                echo "<tr><td>".$row['course_code']."</td>";
                echo "<td>".$row['course_name']."</td>";
                echo "<td>";
                ?>
                  <?php
                  echo "<input type='button' value='Delete From Profile' name='delete_from_profile' onclick='window.location.assign(\"add_course_to_profile.php?uname=$username&&ccode=$ccode\")'>";
                  ?>
                  <!--
                  <input type="button" name="add_to_profile" onclick='window.location.assign("add_course_to_profile.php?uname=&&ccode=def")'  value="Add To Profile">
                -->
                  
                </td> 
            </tr> 
        <?php 
                  
            } 

            if(isset($_GET['uname']) && isset($_GET['ccode'])){
              $uname1=$_GET['uname'];
              $ccode1=$_GET['ccode'];

              $delete_from_profile=mysqli_query($con,"DELETE from course_profile where username='$uname1' AND course_code='$ccode1' ");
              if($delete_from_profile){
                   
                header("Location:add_course_to_profile.php");
                exit();
              }else{
                   
                  header("Location:add_course_to_profile.php");
                  exit();
              }
            }
                    ?> 
          
    </table>
<!-- ---------------------------------------------------------
ADD COURSE TO PROFILE
--------------------------------------------------------- -->
    <div class="courselist">
      <h2>All Course List</h2>  
    </div>
     <hr/>
    <table class='uk-table uk-table-striped'> 
        <tr> 
            <td style="font-weight:bold" bgcolor="#ff9d3a">Course Code</td> 
            <td style="font-weight:bold" bgcolor="#ff9d3a">Course Name</td>
            <td style="font-weight:bold" bgcolor="#ff9d3a">Action</td> 
 
        </tr> 
          <!-- course list And add to profile code -->
        <?php 
            $sql=mysqli_query($con,"SELECT * FROM courses"); 
             
              
            while ($row=mysqli_fetch_array($sql)) { 
              $ccodei=$row['course_code'];
              $cnamei=$row['course_name'];
              $usernamei=$user_obj->username;
                  
        ?> 
            <?php  

                echo "<tr><td>".$row['course_code']."</td>";
                echo "<td>".$row['course_name']."</td>";
                echo "<td>";
                ?>
                	<?php
                  echo "<input type='button' value='add to profile' name='add_to_profile' onclick='window.location.assign(\"add_course_to_profile.php?unamei=$usernamei&&ccodei=$ccodei&&cnamei=$cnamei\")'>";
                  ?>
                  <!--
                	<input type="button" name="add_to_profile" onclick='window.location.assign("add_course_to_profile.php?uname=&&ccode=def")'  value="Add To Profile">
                -->
                	
                </td> 
            </tr> 
        <?php 
                  
            } 

            if(isset($_GET['unamei']) && isset($_GET['ccodei']) && isset($_GET['cnamei'])){
              $uname1i=$_GET['unamei'];
              $ccode1i=$_GET['ccodei'];
              $cname1i=$_GET['cnamei'];

              $check=mysqli_query($con,"SELECT * FROM course_profile where course_code='$ccode1i' AND username='$uname1i'");
              $ret=mysqli_fetch_array($check);
              if ($ret>1) {
                echo "Course already Exists to your profile.";
              }else{
                $add_to_profile = mysqli_query($con, "INSERT INTO course_profile VALUES ('','$uname1i','$ccode1i','$cname1i')");
                header("Location:add_course_to_profile.php");
                echo "Course Added to your profile";

              }

              //echo "<script>window.alert('$uname1   $ccode1')</script>";
              ///database code here

              //$add_to_profile = mysqli_query($con, "INSERT INTO course_profile VALUES ('','$uname1','$ccode1','$cname1')");
            }

            /*echo $course_code;
            echo $usernameprofile;
            die();*/
        ?> 
          
    </table>
  </body>
  </html>
  