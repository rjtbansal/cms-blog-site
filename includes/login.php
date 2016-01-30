<?php

    include "db.php";

    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $username=mysqli_real_escape_string($connection,$username);
        $password=mysqli_real_escape_string($connection,$password);

        $validate_user_credentials_query="select * from users WHERE username='{$username}' AND user_pwd='{$password}'";
        $validate_user_credentials_query_result=mysqli_query($connection,$validate_user_credentials_query);
        if(!$validate_user_credentials_query_result){
         die("Error in user search query ".mysqli_error($connection));
        }

        /*see if a row is returned*/
        if(mysqli_num_rows($validate_user_credentials_query_result)!= 0){

            header("location: ../admin/index.php");

        }
        else{
            header("location:../index.php");
        }
    }

?>

