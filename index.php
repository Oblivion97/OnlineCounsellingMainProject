<?php 
include("includes/header.php"); 
include("includes/classes/user.php");
include("includes/classes/post.php");
$userLoggedIn =$_SESSION['username'];
$user_obj = new user($con,$userLoggedIn);
$user_obj->getFirstAndLastName();
//session_destroy();


/*---------------------------------------------
post code
---------------------------------------------*/
if(isset($_POST['post'])){
	$post=new post($con,$userLoggedIn);
	$post->submitPost($_POST['post_text'],$_POST['options'],'non');
}

 ?>
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
			<br>
            <br>
			<div class="user_details_left_right1">
                <a class="" href="./index_profile.php" >
                        My Course
                    </a>
            </div>
            <br>
            <div class="user_details_left_right1">
                <a class="" href="./messages.php" >
                        Messages
                    </a>
            </div>

		</div>

		<?php 
			$username=$user_obj->username;

            /*echo $username;
            die();*/

			$subject=mysqli_query($con,"SELECT course_name FROM course_profile where username='$username'");
			$options="";
			while ($subject1=mysqli_fetch_array($subject)) {
				$options=$options."<option>$subject1[0]</option>";
			}
		 ?>

		<div class="main_column column">
			<form class="post_form" action="index.php" method="POST">
				<textarea name="post_text" id="post-text" placeholder="Got Something To say?"></textarea>
				<input type="submit" name="post" id="post_button" value="post" >
				<br>	
				<div>
					Select Course :				
				</div>			
				
				<select name="options">
					<?php echo $options; ?>
				</select>
			</form>



			<?php 
				$post=new post($con,$userLoggedIn);
				$post->loadpostfriends();
			?>

		</div>


	</div>
</body>
</html>