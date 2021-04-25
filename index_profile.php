<?php 
include("includes/header.php"); 
include("includes/classes/user.php");
 //session_destroy();
	$userLoggedIn =$_SESSION['username'];
	$user_obj = new user($con,$userLoggedIn);
	$user_obj->getFirstAndLastName();
 ?>
<html>
<head>
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
</head>

		<div class="user_detail column">
			<!-- picture & user basic data to user profile panel on dashboard -->
			<a href=" <?php echo $userLoggedIn; ?> "> <img src="<?php echo $user['profile_pic']; ?>" ></a>
			
			<div class="user_details_left_right">
				<a href=" <?php echo $userLoggedIn; ?> ">
				<?php 
					echo $user['first_name'] ." ". $user['last_name'];
				 ?>
				</a>
				<br>
				<?php
					echo "posts: " . $user['num_posts']. "<br>";
					echo "likes: " . $user['num_likes'];
				 ?>
			</div>


		</div>

		<div class="profile_column column">
			<div class="courses">
				<h3>My Courses</h3>
			</div>
			<!-- my course list will display here -->
			<hr/>
    <table class='uk-table uk-table-striped'> 
        <tr> 
            <td style="font-weight:bold" bgcolor="#ff9d3a">Course Code</td> 
            <td style="font-weight:bold" bgcolor="#ff9d3a">Course Name</td>
 
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
                
                ?>
                  <!--
                  <input type="button" name="add_to_profile" onclick='window.location.assign("add_course_to_profile.php?uname=&&ccode=def")'  value="Add To Profile">
                -->
                  
                </td> 
            </tr> 
            <?php 
        }
        ?>
        </table>
			<br>
			<a class="profile_addcoursebutton" href="./add_course_to_profile.php" >
						Edit My course
					</a>
		</div>

</html>