<?php
if(isset($_POST['addUser'])){
    $username=$_POST['username'];
    $user_pwd=$_POST['user_pwd'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    /*$post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];*/
    $user_email=$_POST['user_email'];
    $user_role=$_POST['user_role'];

    /*move_uploaded_file($post_image_temp, "../images/$post_image");*/

    $addUserQuery= "INSERT into users(username,user_firstname,user_lastname,user_email,user_pwd,user_role)";
    $addUserQuery.="VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_pwd}','{$user_role}')";
    $addUserQueryResult=mysqli_query($connection,$addUserQuery);

    if(!$addUserQueryResult){
        die("Insertion query failed" .mysqli_error($connection));
    }

    echo "<p class='bg-success'> User added successfully. <a href='users.php'>View user table</a> </p>";

}
?>

<form method="post" action="" enctype="multipart/form-data">
    <div id="userNotify"></div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_pwd">Password</label>
        <input type="password" name="user_pwd" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>
    <!--<div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>-->

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" class="form-control">
            <option selected>admin</option>
            <option>subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="addUser" class="btn btn-success" value="Add User">
    </div>

</form>