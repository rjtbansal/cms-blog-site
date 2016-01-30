<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Status</th>
        <th>Comment For the Post</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $commentsQuery="SELECT * FROM comments";
    $resultFromCommentsQuery=mysqli_query($connection, $commentsQuery);
    while($row = mysqli_fetch_assoc($resultFromCommentsQuery)){
        $comment_id=$row['comment_id'];
        $comment_author=$row['comment_author'];
        $comment_email=$row['comment_email'];
        $comment_content=$row['comment_content'];
        $comment_post_id=$row['comment_post_id'];
        $comment_status=$row['comment_status'];
        $comment_date=$row['comment_date'];
        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $getPostByIdQuery="select * from posts where post_id={$comment_post_id}";
        $getPostByIdQueryResult=mysqli_query($connection, $getPostByIdQuery);
        if(!$getPostByIdQueryResult){
            die("Post id fetch query failed ".mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($getPostByIdQueryResult)){
            $post_id=$row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
        }

        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "</tr>";
    }

    if(isset($_GET['approve'])){
        $this_comment_id=$_GET['approve'];
        $commentApprovedQuery="UPDATE comments SET comment_status='approved' WHERE comment_id={$this_comment_id}";
        $commentApprovedQueryResult=mysqli_query($connection,$commentApprovedQuery);
        if(!$commentApprovedQueryResult){
            die("Approval update query failed " . mysqli_error($connection));
        }
        header("location:./comments.php");
    }

    if(isset($_GET['unapprove'])){
        $this_comment_id=$_GET['unapprove'];
        $commentUnapprovedQuery="UPDATE comments SET comment_status='unapproved' WHERE comment_id={$this_comment_id}";
        $commentUnapprovedQueryResult=mysqli_query($connection,$commentUnapprovedQuery);
        if(!$commentUnapprovedQueryResult){
            die("Unapproval update query failed " . mysqli_error($connection));
        }
        header("location:./comments.php");
    }



    if(isset($_GET['delete'])){
        $this_comment_id=$_GET['delete'];
        $deleteCommentQuery="DELETE from comments WHERE comment_id={$this_comment_id}";
        $deleteCommentQueryResult=mysqli_query($connection,$deleteCommentQuery);
        if(!$deleteCommentQueryResult){
            die("Delete failed " . mysqli_error($connection));
        }

        header("location:./comments.php");

    }



    ?>

    </tbody>
</table>