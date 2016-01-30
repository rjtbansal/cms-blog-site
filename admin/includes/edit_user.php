<?php

if(isset($_GET['edit_user_id'])){
    $get_user_id=$_GET['edit_user_id'];
    $get_user_infoQuery="select * from users where user_id={$get_user_id}";
    $get_user_infoQueryResult=mysqli_query($connection, $get_user_infoQuery);
    if(! $get_user_infoQueryResult){
        die("Problem getting user data ".mysqli_error($connection));
    }
    while($row=mysqli_fetch_assoc($get_user_infoQueryResult)){
        $username=$row['username'];
        $user_pwd=$row['user_pwd'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];

    }

}

if(isset($_POST['editUser'])){
    $username=$_POST['username'];
    $user_pwd=$_POST['user_pwd'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    /*$post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];*/
    $user_email=$_POST['user_email'];
    $user_role=$_POST['user_role'];

    /*move_uploaded_file($post_image_temp, "../images/$post_image");*/

    $updateEditUserQuery="UPDATE users SET username='{$username}', ";
    $updateEditUserQuery.="user_pwd='{$user_pwd}', ";
    $updateEditUserQuery.="user_firstname='{$user_firstname}', ";
    $updateEditUserQuery.="user_lastname='{$user_lastname}', ";
    $updateEditUserQuery.="user_email='{$user_email}', ";
    $updateEditUserQuery.="user_role='{$user_role}' where user_id= {$get_user_id}";
    $updateEditUserQueryResult=mysqli_query($connection, $updateEditUserQuery);
    if(!$updateEditUserQueryResult){
        die("Update user query failed".mysqli_error($connection));
    }

    header("location:./users.php");



}
?>

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
        <input type="submit" name="editUser" class="btn btn-success" value="Update User">
    </div>

</form>