<?php include "includes/header.php" ?>

<body>

<div id="wrapper">


    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin Area
                        <small>Username</small>
                    </h1>


                    <div class="col-xs-6">
                        <form method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Categories</label>
                                <input type="text" class="form-control" id="cat_title" name="cat_title">
                            </div>
                            <button type="submit" class="btn btn-success" name="submit">Add</button>
                        </form>

                        <br>
                        <?php
                        /*grabs cat id for 'edit click*/
                        if(isset($_GET['edit'])){
                            $cat_id=$_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        ?>
                        <?php

                            addCategories();
                        ?>


                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>category title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                displayCategories();
                                deleteCategory();

                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
