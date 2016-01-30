<?php



    function addCategories(){

        global $connection;
        if(isset($_POST['submit'])){
            $cat_title=$_POST['cat_title'];
            if($cat_title == "" || empty($cat_title)){
                echo "You can't submit an empty field. Please enter a value";
            }
            else{
                $insertCatQuery="INSERT into category(cat_title)";
                $insertCatQuery.="VALUES('{$cat_title}')";
                $resultOfInsertCatQuery=mysqli_query($connection, $insertCatQuery);
                if(!$resultOfInsertCatQuery){
                    die("Insert query failed ".mysqli_error($connection));
                }
                else{

                }

            }

        }
    }

    function displayCategories(){
        global $connection;
        $categoryQuery="SELECT * FROM category";
        $resultFromCategoryQuery=mysqli_query($connection, $categoryQuery);
        while($row = mysqli_fetch_assoc($resultFromCategoryQuery)){
            $cat_title=$row['cat_title'];
            $cat_id=$row['cat_id'];
            echo "<tr> <td>{$cat_id}</td> <td>{$cat_title}</td>
                                          <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                          <td><a href='categories.php?edit={$cat_id}'>Edit</a></td></tr>";
        }
    }

    function deleteCategory(){
        global $connection;
        if(isset($_GET['delete'])){
            $get_cat_id=$_GET['delete'];
            $deleteCatQuery="DELETE from category WHERE cat_id={$get_cat_id}";
            $deleteCatQueryResult=mysqli_query($connection, $deleteCatQuery);
            header("Location: categories.php");
        }
    }

?>