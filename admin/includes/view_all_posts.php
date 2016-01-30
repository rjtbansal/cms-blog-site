<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Post Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comment Count</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $postsQuery="SELECT * FROM posts";
    $resultFromPostsQuery=mysqli_query($connection, $postsQuery);
    while($row = mysqli_fetch_assoc($resultFromPostsQuery)){
        $post_id=$row['post_id'];
        $post_author=$row['post_author'];
        $post_title=$row['post_title'];
        $post_category_id=$row['post_category_id'];
        $post_status=$row['post_status'];
        $post_image=$row['post_image'];
        $post_tags=$row['post_tags'];
        $post_comment_count=$row['post_comment_count'];
        $post_date=$row['post_date'];
        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        $getCategoryQuery="select * from category WHERE cat_id='{$post_category_id}'";
        $getCategoryQueryResult=mysqli_query($connection, $getCategoryQuery);
        if(!$getCategoryQueryResult){
            die("Category query failed ".mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($getCategoryQueryResult)){
            $cat_id=$row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<td>{$cat_title}</td>";
        }
        echo "<td>{$post_status}</td>";
        echo "<td><img src='../images/$post_image' width='100px' height='100px'></td>";
        echo "<td>{$post_tags}</td> <td>{$post_comment_count}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }

    if(isset($_GET['delete'])){
        $this_post_id=$_GET['delete'];
        $deletePostsQuery="DELETE from posts WHERE post_id={$this_post_id}";
        $deletePostsQueryResult=mysqli_query($connection,$deletePostsQuery);
        if(!$deletePostsQueryResult){
            die("Delete failed " . mysqli_error($connection));
        }

        header("location:./posts.php");

    }



    ?>

    </tbody>
</table>