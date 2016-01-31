<?php include "includes/header.php" ?>
<body>

<div id="wrapper">

    <?php

    if(isset($_SESSION['username'])){
        $session_username=$_SESSION['username'];
        $select_user_query="SELECT * FROM users WHERE username='{$session_username}'";
        $select_user_query_result=mysqli_query($connection,$select_user_query);
        if(! $select_user_query_result){
            die("Error in grabbing user ".mysqli_error($connection));
        }
        while($row=mysqli_fetch_assoc($select_user_query_result)){
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_pwd=$row['user_pwd'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_role=$row['user_role'];
        }
    }

    if(isset($_POST['editProfile'])){
        $username=$_POST['username'];
        $user_pwd=$_POST['user_pwd'];
        $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname'];
        /*$post_image=$_FILES['post_image']['name'];
        $post_image_temp=$_FILES['post_image']['tmp_name'];*/
        $user_email=$_POST['user_email'];
        $user_role=$_POST['user_role'];
        /*move_uploaded_file($post_image_temp, "../images/$post_image");*/
        $updateUserProfileQuery="UPDATE users SET username='{$username}', ";
        $updateUserProfileQuery.="user_pwd='{$user_pwd}', ";
        $updateUserProfileQuery.="user_firstname='{$user_firstname}', ";
        $updateUserProfileQuery.="user_lastname='{$user_lastname}', ";
        $updateUserProfileQuery.="user_email='{$user_email}', ";
        $updateUserProfileQuery.="user_role='{$user_role}' where username= '{$session_username}'";
        $updateUserProfileQueryResult=mysqli_query($connection, $updateUserProfileQuery);
        if(!$updateUserProfileQueryResult){
            die("Update user query failed".mysqli_error($connection));
        }
        header("location:./users.php");
    }

    ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin Area
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->

            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
                </div>

                <div class="form-group">
                    <label for="user_pwd">Password</label>
                    <input type="password" name="user_pwd" class="form-control" value="<?php echo $user_pwd ?>">
                </div>

                <div class="form-group">
                    <label for="user_firstname">Firstname</label>
                    <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname ?>">
                </div>

                <div class="form-group">
                    <label for="user_lastname">Lastname</label>
                    <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname ?>">
                </div>
                <!--<div class="form-group">
                    <label for="post_image">Post Image</label>
                    <input type="file" name="post_image" class="form-control">
                </div>-->

                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="email" name="user_email" class="form-control" value="<?php echo $user_email ?>">
                </div>

                <div class="form-group">
                    <label for="user_role">Role</label>
                    <select name="user_role" class="form-control">
                        <?php if($user_role === 'admin'){
                            echo "<option selected>admin</option>
            <option>subscriber</option>";
                        }else{
                            echo "<option>admin</option>
            <option selected>subscriber</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="editProfile" class="btn btn-success" value="Update Profile">
                </div>

            </form>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
