<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        <!--<th>Date Created</th>-->
    </tr>
    </thead>
    <tbody>
    <?php
    $usersQuery="SELECT * FROM users";
    $resultFromUsersQuery=mysqli_query($connection, $usersQuery);
    while($row = mysqli_fetch_assoc($resultFromUsersQuery)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];
        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        /*echo "<td><img src='../images/$post_image' width='100px' height='100px'></td>";*/
        echo "<td>{$user_email}</td> <td>{$user_role}</td>";
        echo "<td><a href='users.php?switch_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?switch_to_subscriber={$user_id}'>Subscriber</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }

    if(isset($_GET['delete'])){
        $this_user_id=$_GET['delete'];
        $deleteUserQuery="DELETE from users WHERE user_id={$this_user_id}";
        $deleteUserQueryResult=mysqli_query($connection,$deleteUserQuery);
        if(!$deleteUserQueryResult){
            die("Delete failed " . mysqli_error($connection));
        }

        header("location:./users.php");

    }

    if(isset($_GET['switch_to_admin'])){
        $this_user_id=$_GET['switch_to_admin'];
        $switch_to_admin_query="UPDATE users SET user_role='admin' WHERE user_id={$this_user_id}";
        $switch_to_admin_queryResult=mysqli_query($connection,$switch_to_admin_query);
        if(!$switch_to_admin_queryResult){
            die("Switch to admin failed " . mysqli_error($connection));
        }
        header("location:./users.php");
    }

    if(isset($_GET['switch_to_subscriber'])){
        $this_user_id=$_GET['switch_to_subscriber'];
        $switch_to_subscriber_query="UPDATE users SET user_role='subscriber' WHERE user_id={$this_user_id}";
        $switch_to_subscriber_queryResult=mysqli_query($connection,$switch_to_subscriber_query);
        if(!$switch_to_subscriber_queryResult){
            die("Switch to subscriber failed " . mysqli_error($connection));
        }
        header("location:./users.php");
    }



    ?>

    </tbody>
</table>