 <?php 

require 'config/config.php';

if(!isset($_SESSION)) { 
    session_start(); 
}

 ?>



<html>
    <head>
        <title>Online Counseling</title>
        <link rel="stylesheet" type="text/css" href="assets/css/admin_style.css">

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
    

<?php


error_reporting(E_ALL ^ E_WARNING); 
if(isset($_GET['id'])){


    $id=$_GET['id'];
    if(isset($_POST['submitadmin'])){
        try{

        $course_code=$_POST['course_code'];
        $course_name=$_POST['course_name'];
        $credit=$_POST['credit'];

        $query3=mysqli_query($con,"UPDATE courses set course_code='$course_code', course_name='$course_name' , credit='$credit' where id=$id");

        if($query3){
            header("Location:course.php");
            exit();
        }else{
             
            header("Location:edit_course.php?id=$id");
            exit();
        }
    }catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
 
    }else{
            /*get data*/
    
        $id=$_GET['id'];
        $get_query=mysqli_query($con,"SELECT * FROM COURSES WHERE id=$id");
        $get_fetch=mysqli_fetch_array($get_query) ;

    /*    echo $get_fetch['course_name'];
        var_dump($get_fetch);
        die();*/
    }
    
    ?>
    <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
        <div>
            
        </div>
    <div>
    <form method="post" action="edit_course.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            
             <div class="uk-margin">
                 
                <input class="uk-input" type="text" placeholder="Course Code" name="course_code" value="<?php echo $get_fetch['course_code']; ?>">
            </div>
            
             <div class="uk-margin">
                 
                <input class="uk-input" type="text" placeholder="Course Name" name="course_name" value="<?php echo $get_fetch['course_name']; ?>">
            </div>
            
             <div class="uk-margin">
                 
                <input class="uk-input" type="text" placeholder="Credit" name="credit" value="<?php echo $get_fetch['credit']; ?>">
            </div>
            
            
             <button class="uk-button uk-button-primary " type="submitadmin" name="submitadmin">Submit</button>
    </form>
    </div>

    <div></div>
    </div>
    <?php
}
?>

</body>
</html>