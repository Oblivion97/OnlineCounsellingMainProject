<?php 
class post{
	public $user_obj;
	private $con;
	public $username;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new user($con,$user);
	}
	public function submitPost($body,$options,$user_to){
		$body=strip_tags($body);
		$body=mysqli_escape_string($this->con,$body);
		$check_empty=preg_replace('/\s+/', '', $body);

		if ($check_empty!= "") {
			//current date & time.
			$date_added=date("Y-m-d H:i:s");
			$added_by=$this->user_obj->getnewusername();
			//if user is on own profile ,user to is non
			if ($user_to==$added_by) {
				$user_to-"none";
			}
						
			//insert post
			$post_query=mysqli_query($this->con,"INSERT INTO posts values('','$body','$options','$added_by','$user_to','$date_added','no','no','0')");
			$returned_id=mysqli_insert_id($this->con);

			//update post count
			//$num_posts="";
			$num_posts=$this->user_obj->getnumposts();
			$num_posts++;
			$update_query=mysqli_query($this->con,"UPDATE users SET num_posts='$num_posts'WHERE username='$added_by'");



		}
	}
	
	public function loadpostfriends(){
		$str="";
		$getnewusername=$this->user_obj->getnewusername();
		$option_query=mysqli_query($this->con,"SELECT DISTINCT GROUP_CONCAT('\'', OPTIONS, '\'') AS options FROM posts WHERE added_by = '$getnewusername'");
		while ($option_query_array=mysqli_fetch_array($option_query)) {
			$option=$option_query_array['options'];
			/*var_dump($option);
			die();*/
			$data=mysqli_query($this->con,"SELECT * FROM posts WHERE OPTIONS IN ($option)  AND deleted='no' ORDER BY id DESC ");
			/*var_dump("SELECT * FROM posts WHERE OPTIONS IN ($option) AND added_by != '$getnewusername' AND deleted='no' ORDER BY id DESC");
			die();*/
		}
		while($row=mysqli_fetch_array($data)){
			$id=$row['id'];
			$body=$row['body'];
			$added_by=$row['added_by'];
			$date_time=$row['date_added'];
			$options=$row['options'];

			$added_by_obj=new user($this->con,$added_by);
			if($added_by_obj->isclosed()){
				continue;
			}
			$userLoggedIn =$_SESSION['username'];
			//var_dump($userLoggedIn);
			if($userLoggedIn==$added_by)
				$delete_button="<button class='delete_button btn-danger' id='post$id'>X</button>";
			else
				$delete_button="";

			$user_details_query=mysqli_query($this->con,"SELECT first_name,last_name,profile_pic FROM users WHERE username='$added_by'");
			$user_row=mysqli_fetch_array($user_details_query);
			$first_name = $user_row['first_name'];
			$last_name = $user_row['last_name'];
			$profile_pic = $user_row['profile_pic'];


			?>
			<script >
				function toggle(e, id){
					//console.log(e.target.id+"post"+id);
					if(e.target.tagName != 'A' && e.target.id !="post"+id){
						var element = document.getElementById("toggleComment_"+id);
				 		if(element.style.display=="block")
				 			element.style.display="none";
				 		else
				 			element.style.display="block";
					}
			 	}

			</script>
			<?php
			$comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='$id'");
			$comments_check_num = mysqli_num_rows($comments_check);
			//Timeframe
			$date_time_now = date("Y-m-d H:i:s");
			$start_date = new DateTime($date_time); //Time of post
			$end_date = new DateTime($date_time_now); //Current time
			$interval = $start_date->diff($end_date); //Difference between dates 
			if($interval->y >= 1) {
				if($interval == 1)
					$time_message = $interval->y . " year ago"; //1 year ago
				else 
					$time_message = $interval->y . " years ago"; //1+ year ago
			}
			else if ($interval-> m >= 1) {
				if($interval->d == 0) {
					$days = " ago";
				}
				else if($interval->d == 1) {
					$days = $interval->d . " day ago";
				}
				else {
					$days = $interval->d . " days ago";
				}


				if($interval->m == 1) {
					$time_message = $interval->m . " month". $days;
				}
				else {
					$time_message = $interval->m . " months". $days;
				}

			}
			else if($interval->d >= 1) {
				if($interval->d == 1) {
					$time_message = "Yesterday";
				}
				else {
					$time_message = $interval->d . " days ago";
				}
			}
			else if($interval->h >= 1) {
				if($interval->h == 1) {
					$time_message = $interval->h . " hour ago";
				}
				else {
					$time_message = $interval->h . " hours ago";
				}
			}
			else if($interval->i >= 1) {
				if($interval->i == 1) {
					$time_message = $interval->i . " minute ago";
				}
				else {
					$time_message = $interval->i . " minutes ago";
				}
			}
			else {
				if($interval->s < 30) {
					$time_message = "Just now";
				}
				else {
					$time_message = $interval->s . " seconds ago";
				}
			}

			$str .= "<div class='status_post' onclick='toggle(event, $id)'>
				<div class='post_profile_pic'>
					<img src='$profile_pic' width='50'>
				</div>

				<div class='posted_by' style='color:#ff9d3a;'>
					<a href='$added_by'> $first_name $last_name </a> to $options &nbsp;&nbsp;&nbsp;&nbsp;
					<br>
					$time_message
					$delete_button 
				</div>
				<div id='post_body'>
					$body
					<br>
					<br>
					<br>
				</div>
				<div class='newsfeedPostOptions'>
					Comments($comments_check_num)&nbsp;&nbsp;&nbsp;
					<iframe src='like.php?post_id=$id' scrolling='no'></iframe>
				</div>

			</div>
			<div class='post_comment' id='toggleComment_$id' style='display:none;'>
				<iframe src='comment.php?post_id=$id' id='comment_iFrame' frameborder='0'></iFrame>
			</div>
			<hr>";


		?>
		 
		<script>
			$(document).ready(function(){
				$('#post<?php echo $id; ?>').on('click',function(){
					bootbox.confirm("Are you sure you want to delete this post?",function(result){
						$.post("includes/form_handlers/delete_post.php?post_id=<?php echo $id; ?>",{result:result});
					});
				});
			});

		</script>

		<?php
		}


		echo $str;

	}

	public function loadpostprofile(){
		$str="";
		$getnewusername=$this->user_obj->getnewusername();
		$option_query=mysqli_query($this->con,"SELECT DISTINCT GROUP_CONCAT('\'', OPTIONS, '\'') AS options FROM posts WHERE added_by = '$getnewusername'");
		while ($option_query_array=mysqli_fetch_array($option_query)) {
			$option=$option_query_array['options'];
			/*var_dump($option);
			die();*/
			$data=mysqli_query($this->con,"SELECT * FROM posts WHERE OPTIONS IN ($option) AND added_by = '$getnewusername' AND deleted='no' ORDER BY id DESC ");
			/*var_dump("SELECT * FROM posts WHERE OPTIONS IN ($option) AND added_by != '$getnewusername' AND deleted='no' ORDER BY id DESC");
			die();*/
		}
		while($row=mysqli_fetch_array($data)){
			$id=$row['id'];
			$body=$row['body'];
			$added_by=$row['added_by'];
			$date_time=$row['date_added'];
			$options=$row['options'];

			$added_by_obj=new user($this->con,$added_by);
			if($added_by_obj->isclosed()){
				continue;
			}
			$userLoggedIn =$_SESSION['username'];
			//var_dump($userLoggedIn);
			if($userLoggedIn==$added_by)
				$delete_button="<button class='delete_button btn-danger' id='post$id'>X</button>";
			else
				$delete_button="";

			$user_details_query=mysqli_query($this->con,"SELECT first_name,last_name,profile_pic FROM users WHERE username='$added_by'");
			$user_row=mysqli_fetch_array($user_details_query);
			$first_name = $user_row['first_name'];
			$last_name = $user_row['last_name'];
			$profile_pic = $user_row['profile_pic'];


			?>
			<script >
				function toggle(e, id){
					//console.log(e.target.id+"post"+id);
					if(e.target.tagName != 'A' && e.target.id !="post"+id){
						var element = document.getElementById("toggleComment_"+id);
				 		if(element.style.display=="block")
				 			element.style.display="none";
				 		else
				 			element.style.display="block";
					}
			 	}

			</script>
			<?php
			$comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='$id'");
			$comments_check_num = mysqli_num_rows($comments_check);
			//Timeframe
			$date_time_now = date("Y-m-d H:i:s");
			$start_date = new DateTime($date_time); //Time of post
			$end_date = new DateTime($date_time_now); //Current time
			$interval = $start_date->diff($end_date); //Difference between dates 
			if($interval->y >= 1) {
				if($interval == 1)
					$time_message = $interval->y . " year ago"; //1 year ago
				else 
					$time_message = $interval->y . " years ago"; //1+ year ago
			}
			else if ($interval-> m >= 1) {
				if($interval->d == 0) {
					$days = " ago";
				}
				else if($interval->d == 1) {
					$days = $interval->d . " day ago";
				}
				else {
					$days = $interval->d . " days ago";
				}


				if($interval->m == 1) {
					$time_message = $interval->m . " month". $days;
				}
				else {
					$time_message = $interval->m . " months". $days;
				}

			}
			else if($interval->d >= 1) {
				if($interval->d == 1) {
					$time_message = "Yesterday";
				}
				else {
					$time_message = $interval->d . " days ago";
				}
			}
			else if($interval->h >= 1) {
				if($interval->h == 1) {
					$time_message = $interval->h . " hour ago";
				}
				else {
					$time_message = $interval->h . " hours ago";
				}
			}
			else if($interval->i >= 1) {
				if($interval->i == 1) {
					$time_message = $interval->i . " minute ago";
				}
				else {
					$time_message = $interval->i . " minutes ago";
				}
			}
			else {
				if($interval->s < 30) {
					$time_message = "Just now";
				}
				else {
					$time_message = $interval->s . " seconds ago";
				}
			}

			$str .= "<div class='status_post' onclick='toggle(event, $id)'>
				<div class='post_profile_pic'>
					<img src='$profile_pic' width='50'>
				</div>

				<div class='posted_by' style='color:#ff9d3a;'>
					<a href='$added_by'> $first_name $last_name </a> to $options &nbsp;&nbsp;&nbsp;&nbsp;
					<br>
					$time_message
					$delete_button 
				</div>
				<div id='post_body'>
					$body
					<br>
					<br>
					<br>
				</div>
				<div class='newsfeedPostOptions'>
					Comments($comments_check_num)&nbsp;&nbsp;&nbsp;
					<iframe src='like.php?post_id=$id' scrolling='no'></iframe>
				</div>

			</div>
			<div class='post_comment' id='toggleComment_$id' style='display:none;'>
				<iframe src='comment.php?post_id=$id' id='comment_iFrame' frameborder='0'></iFrame>
			</div>
			<hr>";


		?>
		 
		<script>
			$(document).ready(function(){
				$('#post<?php echo $id; ?>').on('click',function(){
					bootbox.confirm("Are you sure you want to delete this post?",function(result){
						$.post("includes/form_handlers/delete_post.php?post_id=<?php echo $id; ?>",{result:result});
					});
				});
			});

		</script>

		<?php
		}


		echo $str;

	}
}

 ?>