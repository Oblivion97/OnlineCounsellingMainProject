 <?php 

require 'config/config.php';
require 'includes/form_handlers/course_handler.php';
session_destroy();

 ?>


<html>
    <head>
        <title>Online Counseling</title>
        <link rel="stylesheet" type="text/css" href="assets/css/admin_style.css">
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
			<a href="course.php">Online Counselling</a>
		</div>

		<nav>
			<a href=" <?php echo $userLoggedIn; ?> " style="color: #ffffff">
				<!-- Headbar user name show code snap -->
				<?php
					$headbadadmin='';
					$headbadadmin = mysqli_query($con,"SELECT first_name,last_name FROM admin");
					$followingdata = $headbadadmin->fetch_array(MYSQLI_ASSOC);
					echo "Admin : ".$followingdata['first_name']." ".$followingdata['last_name']; 
				 ?>
			</a>
			<!-- headbar icon -->
			
			<a href="includes/admin_logout.php" style="color: #000000">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</nav>
	</div>


    	<!-- -----search---- -->
    	<!-- search -->
    	<?php 
    		$output='';
    		if (isset($_POST['search'])) {
    			$search_query=$_POST['search'];
    			//$search_query=preg_replace("#[^0-9a-z]#i", "", $search_query);

    			$query=mysqli_query($con,"SELECT * FROM courses WHERE course_code LIKE '%$search_query%' OR course_name LIKE '%$search_query%'");

    			$count = mysqli_num_rows($query);
    			if ($count==0) {
    				$output='there is no search result!';
    			}else{
    				while ($row=mysqli_fetch_array($query)) {
    					$course_code=$row['course_code'];
    					$course_name=$row['course_name'];
    					$output .= '<div class="search_result">'.$course_code.' '.$course_name.'</div>';
    				}
    			}
    		}
    	 ?>
    	<body>
            <div class="wrapper_admin">

            <div class="search_box">     
            
        		<form action="course.php" method="post" accept-charset="utf-8">
        			<div class="search_admin">
                        <input type="text" name="search" placeholder="Search By Course Code/Name....">
                    </div>
                    <div class="search_adminbutton">
        			    <input type="submit" name="" value="Search" placeholder=""/>
                    </div>
        		</form>

    		</div>
            <?php 
    			print("$output");
    		 ?>
    	</body>
    	<!-- search -->
    	<!-- -----search---- -->
           
<p uk-margin >
  
    <button class="uk-button uk-button-primary uk-align-center" uk-toggle="target: #modal-close-default">ADD Courses</button>
   
</p>


<!-- This is the modal with the default close button -->
<div id="modal-close-default" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Add Courses</h2>
       
          <form method="post" action="course.php" enctype="multipart/form-data">
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Course Code" name="course_code" required>
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Course Name" name="course_name" required>
        </div>
        
         <div class="uk-margin">
             
            <input class="uk-input" type="text" placeholder="Credits" name="credit" required>
        </div>

         <input class="uk-button uk-button-primary " type="submit" name="submitbutton" value="Submit">
</form>

    </div>
</div>
        
        
        
        
        
        
        
        
        
        
        
<?php
	$query_course = mysqli_query($con,"SELECT * FROM courses");
	/*$query1=mysql_query("select * from courses");*/
	echo "<table class='uk-table uk-table-striped'>
        <tr>
            <td>Course Code</td>
            <td>Course Name</td>
            <td>Credit</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>";
	while($query2=mysqli_fetch_array($query_course)){

		
		echo "<tr><td>".$query2['course_code']."</td>";
		echo "<td>".$query2['course_name']."</td>";
		echo "<td>".$query2['credit']."</td>";

		echo "<td><a href='edit_course.php?id=".$query2['id']."'><span  class='uk-icon-button' uk-icon='icon: file-edit' style='color:#0090C1;'></span></a></td>";
		echo "<td><a href='delete_course.php?id=".$query2['id']."'><span  class='uk-icon-button' uk-icon='icon: trash' style='color:#E63462;'></span></a></td><tr>";
}
?>
</ol>
</table>


        
        
       
	</body>
</html>