<div class="col-md-4">



    <?php


    if (isset($_POST['submit'])) {

        $search = $_POST['search'];

        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";

        $search_query = mysqli_query($connection, $query);

        if (!$search_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        $count = mysqli_num_rows($search_query);

        if ($count == 0) {

            echo "<h1>No Result</h1>";
        } else {
            echo "<h1>RESULTS</h1>";
        }
    }






    ?>

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form> <!-- Search form -->
        <!-- /.input-group -->
    </div>





    <!-- Blog Categories Well -->
    <div class="well">


        <?php
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection, $query);



        ?>



        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    while ($row = mysqli_fetch_array($select_categories_sidebar)) {
                        $cat_title = $row['cat_title'];
                        echo "<li> <a href='#'>{$cat_title}</a></li>";
                    } ?>

                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>