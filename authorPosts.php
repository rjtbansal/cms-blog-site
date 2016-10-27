<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if(isset($_GET['p_id'],$_GET['author'])) {
                $post_id = $_GET['p_id'];
                $post_author=$_GET['author'];

                $postsQuery = "SELECT * FROM posts WHERE post_author='$post_author'";
                $resultFromPostsQuery = mysqli_query($connection, $postsQuery);
                while ($row = mysqli_fetch_assoc($resultFromPostsQuery)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status = $row['post_status'];


                    ?>

                    <!-- First Blog Post -->
                    <h2>
                        <?php echo "<a href='#'>{$post_title}</a>"; ?>
                    </h2>
                    <p class="lead">
                        by <?php echo "<a href='index.php'>{$post_author}</a>";  ?>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;  ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content;  ?></p>
                    <hr>

                <?php }} ?>

        </div>


        <!-- Blog Sidebar Widgets Column -->
        <?php include 'includes/sidebar.php' ?>




    </div>
    <!-- /.row -->

    <?php
    include "includes/footer.php";
    ?>

