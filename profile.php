<?php 
include("includes/header.php");
include("includes/classes/user.php");
include("includes/classes/post.php");
$userLoggedIn =$_SESSION['username'];
$user_obj = new user($con,$userLoggedIn);
$user_obj->getFirstAndLastName();

if(isset($_GET['profile_username'])) {
    $profile_username = $_GET['profile_username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$profile_username'");
    $user_array = mysqli_fetch_array($user_details_query);

    $num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
}



if(isset($_POST['remove_friend'])) {
    $user = new User($con, $userLoggedIn);
    $user->removeFriend($profile_username);
}

if(isset($_POST['add_friend'])) {
    $user = new user($con, $userLoggedIn);
    $user->sendRequest($profile_username);
}
if(isset($_POST['respond_request'])) {
    header("Location: requests.php");
}

 ?>

    <style type="text/css">
        .wrapper {
            margin-left: 0px;
            padding-left: 0px;
        }

    </style>
    
    <div class="profile_left">
        <img src="<?php echo $user_array['profile_pic']; ?>">

        <div class="profile_info">
            <p><?php echo $user_array['first_name'] ." ". $user_array['last_name']; ?></p>
            <p><?php echo "Posts: " . $user_array['num_posts']; ?></p>
            <p><?php echo "Likes: " . $user_array['num_likes']; ?></p>
            <p><?php echo "Friends: " . $num_friends ?></p>
        </div>

        <form action="<?php echo $profile_username; ?>" method="POST">
            <?php 
            $profile_user_obj = new user($con, $profile_username); 
            if($profile_user_obj->isClosed()) {
                header("Location: user_closed.php");
            }

            $logged_in_user_obj = new user($con, $userLoggedIn); 

            if($userLoggedIn != $profile_username) {

                if($logged_in_user_obj->isFriend($profile_username)) {
                    echo '<input type="submit" name="remove_friend" class="danger" value="Remove Friend"><br>';
                }
                else if ($logged_in_user_obj->didReceiveRequest($profile_username)) {
                    echo '<input type="submit" name="respond_request" class="warning" value="Respond to Request"><br>';
                }
                else if ($logged_in_user_obj->didSendRequest($profile_username)) {
                    echo '<input type="submit" name="" class="default" value="Request Sent"><br>';
                }
                else 
                    echo '<input type="submit" name="add_friend" class="success" value="Add Friend"><br>';

            }

            ?>
        </form>
        <?php  
    if($userLoggedIn != $profile_username) {
      echo '<div class="profile_info_bottom">';
        echo $logged_in_user_obj->getMutualFriends($profile_username) . " Mutual friends";
      echo '</div>';
    }


    ?>

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



            <?php /*
            var_dump($profile_username.$userLoggedIn);
                    die();*/
                if($profile_username == $userLoggedIn){
                    
                    $post=new post($con,$userLoggedIn);
                    $post->loadpostprofile();
                }
            ?>

        </div>



</body>
</html>