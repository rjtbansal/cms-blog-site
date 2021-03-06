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

                $posts_per_page= 5;

                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }else{
                    $page='';
                }

                if($page==="" || $page===1){
                    $page_1=0;
                }else{
                    $page_1=($page*$posts_per_page)-$posts_per_page;
                }


                $postsCountQuery="SELECT * FROM posts WHERE post_status='published'";
                $resultFromPostsCountQuery=mysqli_query($connection, $postsCountQuery);
                $posts_count=mysqli_num_rows($resultFromPostsCountQuery);
                $page_count=ceil($posts_count/5); //we want to display 5 posts per page

                $postsQuery="SELECT * FROM posts WHERE post_status='published' LIMIT $page_1, $posts_per_page";
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

                <!-- First Blog Post -->
                <h2>
                    <?php echo "<a href='post.php?p_id={$post_id}'>{$post_title}</a>"; ?>
                </h2>
                <p class="lead">
                    by <?php echo "<a href='authorPosts.php?author={$post_author}&p_id={$post_id}'>{$post_author}</a>";  ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date;  ?></p>
                <hr>
                    <a href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                <hr>
                <p><?php echo $post_content;  ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>" >Read More <span class="glyphicon glyphicon-chevron-right"></span> </a>
                <hr>

                <?php } } ?>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php' ?>


        </div>
        <!-- /.row -->

        <hr>
        <ul class='pager'>
            <?php
                for($i=1;$i<=$page_count;$i++){
                    if($i==$page){
                        echo "<li><a class='active' href='index.php?page={$i}'>{$i}</a></li>";
                    }
                    else if($page==''){
                        $page=1;
                        echo "<li><a class='active' href='index.php?page={$i}'>{$i}</a></li>";
                    }
                    else{
                        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>
        </ul>
<?php
    include "includes/footer.php";
?>

