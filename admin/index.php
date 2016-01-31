<?php include "includes/header.php" ?>
<body>

    <div id="wrapper">

        <?php

        ?>

        <!-- Navigation -->
    <?php include "includes/navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Area
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <!--<ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                            //getting post count dynamically
                                            $posts_count_query="SELECT * FROM posts";
                                            $posts_count_query_result=mysqli_query($connection,$posts_count_query);
                                            if(!$posts_count_query_result){
                                                die("Posts select query failed ".mysqli_error($connection));
                                            }
                                            $posts_count=mysqli_num_rows($posts_count_query_result);
                                            echo "<div class='huge'>{$posts_count}</div>";
                                        ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        //getting comment count dynamically
                                        $comments_count_query="SELECT * FROM comments";
                                        $comments_count_query_result=mysqli_query($connection,$comments_count_query);
                                        if(!$comments_count_query_result){
                                            die("Comments select query failed ".mysqli_error($connection));
                                        }
                                        $comments_count=mysqli_num_rows($comments_count_query_result);
                                        echo "<div class='huge'>{$comments_count}</div>";
                                        ?>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        //getting users count dynamically
                                        $users_count_query="SELECT * FROM users";
                                        $users_count_query_result=mysqli_query($connection,$users_count_query);
                                        if(!$users_count_query_result){
                                            die("Users select query failed ".mysqli_error($connection));
                                        }
                                        $users_count=mysqli_num_rows($users_count_query_result);
                                        echo "<div class='huge'>{$users_count}</div>";
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        //getting categories count dynamically
                                        $categories_count_query="SELECT * FROM category";
                                        $categories_count_query_result=mysqli_query($connection,$categories_count_query);
                                        if(!$categories_count_query_result){
                                            die("Category select query failed ".mysqli_error($connection));
                                        }
                                        $categories_count=mysqli_num_rows($categories_count_query_result);
                                        echo "<div class='huge'>{$categories_count}</div>";
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                        /*grabbing draft posts, unapproved comments, subscriber users*/

                        $draft_posts_count_query="SELECT * FROM posts WHERE post_status='draft'";
                        $draft_posts_count_query_result=mysqli_query($connection,$draft_posts_count_query);
                        if(!$draft_posts_count_query_result){
                             die("Post draft select query failed ".mysqli_error($connection));
                        }
                        $draft_posts_count=mysqli_num_rows($draft_posts_count_query_result);


                        $unapproved_comments_count_query="SELECT * FROM comments WHERE comment_status='unapproved'";
                        $unapproved_comments_count_query_result=mysqli_query($connection,$unapproved_comments_count_query);
                        if(!$unapproved_comments_count_query_result){
                                die("Unapproved comments select query failed ".mysqli_error($connection));
                        }
                        $unapproved_comments_count=mysqli_num_rows($unapproved_comments_count_query_result);

                        $subscribers_count_query="SELECT * FROM users WHERE user_role='subscriber'";
                        $subscribers_count_query_result=mysqli_query($connection,$subscribers_count_query);
                        if(!$subscribers_count_query_result){
                            die("Subscribers select query failed ".mysqli_error($connection));
                        }
                        $subscribers_count=mysqli_num_rows($subscribers_count_query_result);
                ?>

                <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],

                                <?php
                                    $cms_params=['posts','draft posts','comments','unapproved comments','users', 'suscribers','categories'];
                                    $cms_params_count=[$posts_count,$draft_posts_count,$comments_count,$unapproved_comments_count,$users_count, $subscribers_count,$categories_count];

                                    for($i=0;$i<count($cms_params);$i++){
                                        echo "['{$cms_params[$i]}',{$cms_params_count[$i]}],";
                                    }

                                 ?>
                            ])

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, options);
                        }
                    </script>

                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                </div>

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
