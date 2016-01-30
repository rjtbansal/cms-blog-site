<?php

    /*here we will simply connect to the database*/

    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','cms');

    $connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

    if($connection){

    }
    else{
        die("db connection error");
    }

?>