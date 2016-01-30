<div class="col-md-4">

    <!-- Login form -->
    <div class="well">
        <h4>Login</h4>
        <form action="/includes/login.php" method="post">
            <div class="form-group">
                <input placeholder="Username" name="username" type="text" class="form-control">
            </div>
            <div class="form-group">
                <input placeholder="Password" name="password" type="password" class="form-control">
            </div>

            <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
            </div>

        </form>
        <!-- /.input-group -->
    </div>


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="../searchResults.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <?php
        $categoryQuery="SELECT * FROM category";
        $resultFromCategoryQuery=mysqli_query($connection, $categoryQuery);
        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    while($row = mysqli_fetch_assoc($resultFromCategoryQuery)){
                        $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                        echo "<li><a href='./category.php?c_id={$cat_id}'>{$cat_title}</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>