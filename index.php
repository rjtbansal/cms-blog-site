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
                $postsQuery="SELECT * FROM posts WHERE post_status='Published'";
                $resultFromPostsQuery=mysqli_query($connection, $postsQuery);

                $rowsReturned=mysqli_num_rows($resultFromPostsQuery);
                if($rowsReturned<=0){
                    echo "<h1 class='text-center'>No Posts Found</h1>";
                }
                else{
                while($row = mysqli_fetch_assoc($resultFromPostsQuery)){

                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=substr($row['post_content'],0,150);
                    $post_tags=$row['post_tags'];
                    $post_comment_count=$row['post_comment_count'];
                    $post_status=$row['post_status'];


                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <?php echo "<a href='post.php?p_id={$post_id}'>{$post_title}</a>"; ?>
                </h2>
                <p class="lead">
                    by <?php echo "<a href='index.php'>{$post_author}</a>";  ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;  ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content;  ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

                <?php } } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php' ?>


        </div>
        <!-- /.row -->

        <hr>

<?php
    include "includes/footer.php";
?>

