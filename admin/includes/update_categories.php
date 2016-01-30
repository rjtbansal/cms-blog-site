
<form method="post">
    <div class="form-group">
        <label for="cat_update">Update Categories</label>
        <?php
        if(isset($_GET['edit'])) {
            $get_cat_id = $_GET['edit'];
            $categoryQueryEdit = "SELECT * FROM category WHERE cat_id={$get_cat_id}";
            $resultFromCategoryQueryEdit = mysqli_query($connection, $categoryQueryEdit);
            while ($row = mysqli_fetch_assoc($resultFromCategoryQueryEdit)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                ?>
                <input type="text" value="<?php echo $cat_title ?>" class="form-control" name="cat_title">

            <?php } }

    if(isset($_POST['update'])){
        $cat_title=$_POST['cat_title'];
        $updateCatQuery="UPDATE category SET cat_title='{$cat_title}' WHERE cat_id='{$cat_id}' ";
        $updateCatQueryResult=mysqli_query($connection, $updateCatQuery);

        if(!$updateCatQueryResult){
            die("update failed");
        }

    }
    ?>

    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-success" name="update">Update</button>
    </div>
</form>

