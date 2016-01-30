<?php
    if(isset($_GET['post_id'])) {
        $post_id=$_GET['post_id'];
        $postsQuery = "SELECT * FROM posts WHERE post_id={$post_id}";
        $resultFromPostsQuery = mysqli_query($connection, $postsQuery);
        while ($row = mysqli_fetch_assoc($resultFromPostsQuery)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_content=$row['post_content'];
        }
    }

    if(isset($_POST['update_post'])){

        $post_title=$_POST['post_title'];
        //$select_category=$_POST['select_category'];
        $post_category_id=$_POST['select_category'];
        $post_author=$_POST['post_author'];
        $post_status=$_POST['post_status'];
        $post_image=$_FILES['post_image']['name'];
        $post_image_temp=$_FILES['post_image']['tmp_name'];
        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        $post_date=date('mm-dd-yyyy');

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)){

            $findImageQuery="select post_image from posts where post_id='{$post_id}'";
            $findImageQueryResult=mysqli_query($connection, $findImageQuery);

            if(!$findImageQueryResult){
                die("Finding image failed");
            }
            while($row=mysqli_fetch_assoc($findImageQueryResult)){
                $post_image=$row['post_image'];
            }
        }

        $updatePostQuery="UPDATE posts SET post_title='{$post_title}', ";
        $updatePostQuery.="post_category_id='{$post_category_id}', ";
        $updatePostQuery.="post_author='{$post_author}', ";
        $updatePostQuery.="post_date=now(), ";
        $updatePostQuery.="post_status='{$post_status}', ";
        $updatePostQuery.="post_image='{$post_image}', ";
        $updatePostQuery.="post_tags='{$post_tags}', ";
        $updatePostQuery.="post_content='{$post_content}' ";
        $updatePostQuery.="WHERE post_id='{$post_id}'";

        $updatePostQueryResult=mysqli_query($connection, $updatePostQuery);
        if(!$updatePostQueryResult){
            die("Update post query failed");
        }

        header("Location: ./posts.php");


    }
?>

<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="select_category">Categories</label>
        <select name="select_category" class="form-control">
            <?php
             $findCategoriesQuery="select * from category";
                $findCategoriesQueryResult=mysqli_query($connection,$findCategoriesQuery);

                while($row=mysqli_fetch_assoc($findCategoriesQueryResult)){
                    $cat_id=$row['cat_id'];
                    $categoryTitle=$row['cat_title'];
                    if($cat_id==$post_category_id){
                        echo "<option selected value='$cat_id'>{$categoryTitle}</option>";
                    }
                    else{
                        echo "<option value='$cat_id'>{$categoryTitle}</option>";
                    }
                }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
       <label for="post_image">Post Image</label>
        <input type="file" name="post_image" class="form-control">
        <img width=100 height="100" src="../images/<?php echo $post_image ?>" >
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags?>" type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea cols="30" rows="10" name="post_content" class="form-control"><?php echo $post_content ?>
            </textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="update_post" class="btn btn-success" value="Update Post">
    </div>

</form>
