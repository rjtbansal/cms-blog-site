<?php
        if(isset($_POST['publish'])){
            $post_title=$_POST['post_title'];
            $post_category_id=$_POST['select_category'];
            $post_author=$_POST['post_author'];
            $post_status=$_POST['post_status'];
            $post_image=$_FILES['post_image']['name'];
            $post_image_temp=$_FILES['post_image']['tmp_name'];
            $post_tags=$_POST['post_tags'];
            $post_content=$_POST['post_content'];
            $post_date=date('mm-dd-yyyy');

            move_uploaded_file($post_image_temp, "../images/$post_image");

            $addPostQuery= "INSERT into posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
            $addPostQuery.="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

            $addPostQueryResult=mysqli_query($connection,$addPostQuery);

            if(!$addPostQueryResult){
                die("Insertion query failed" .mysqli_error($connection));
            }



        }
    ?>

    <form method="post" action="" enctype="multipart/form-data">

        <div class="form-group">
        <label for="post_title">Post Title</label>
            <input type="text" name="post_title" class="form-control">
        </div>

        <div class="form-group">
            <label for="select_category">Post Category</label>
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
            <input type="text" name="post_author" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_status">Post Status</label>
                <select name="post_status" class="form-control">
                    <option selected>published</option>
                    <option>draft</option>
                </select>
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="post_image" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" name="post_tags" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_content">Post Content</label>
           <textarea cols="30" rows="10" name="post_content" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="publish" class="btn btn-success" value="Publish">
        </div>

    </form>