<?php

    include('./includes/connect.php');

    // Getting products function
    function get_prod(){
        global $con;

        // condition to check isset or not
        if(!isset($_GET['category'])){
        $select_query = "Select * from `products` order by rand()";
        $result_query = mysqli_query($con, $select_query);
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id =$row['product_id'];
            $product_title = $row['name'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 90%'>
                <img src='product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-primary'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";}
        }
    }

    // get unique categories

    function get_uniq_cat(){
        global $con;

        // condition to check isset or not
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
            
        $select_query = "Select * from `products` where category_id=$category_id";
        $select_query_cat = "Select * from `categories` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $result_query_cat = mysqli_query($con, $select_query_cat);
        $num_rows=mysqli_num_rows($result_query);
        $row_cat = mysqli_fetch_assoc($result_query_cat);
        

        if($num_rows==0){
            echo "<h2 class='text-center text-danger'> No items for this category";
        }
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id =$row['product_id'];
            $product_title = $row['name'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_name = $row_cat['category_title'];
            echo "
            <h2 class='text-center'>$category_name</h2>
            <div class='col-md-4 mb-2'>
            <div class='card' style='width: 90%'>
                
                <img src='product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='#' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-primary'>Add to Cart</a>
                    <a href='#' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";}
        }
    }


    function get_cat(){
        global $con;
        $select_categories="Select * from `categories`";
        $result_categories=mysqli_query($con, $select_categories);
        while($row_data=mysqli_fetch_assoc($result_categories)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "<li class='nav-item' >
            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li> ";
        }
    }


    // search function
    function search_prod(){
        global $con;

        // condition to check isset or not
        if(isset($_GET['search_product'])){

            
            $search_value=$_GET['search_data'];
            $search_query="Select * from `products` where product_keywords like '%$search_value%'";
            $result_query = mysqli_query($con, $search_query);
            $num_rows=mysqli_num_rows($result_query);
            
            if($num_rows==0){
                echo "<h2 class='text-center text-danger'> No results found";
                echo "<h5 class='text-center text-grey'> Try using a different keyword";
            } else{
                echo "<h2 class='text-center'>Results for $search_value</h2>";
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id =$row['product_id'];
                    $product_title = $row['name'];
                    $product_description = $row['product_description'];
                    $product_category = $row['category_id'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 90%'>
                        <img src='product_images/$product_image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-primary'>Add to Cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
                }
            }
        }
    }


    //view more function
    function view_details() {
        global $con;

        // condition to check isset or not
        if(isset($_GET['product_id'])){

            if(!isset($_GET['category'])){
                $product_id=$_GET['product_id'];
                $select_query = "Select * from `products` order by rand()";
                $result_query = mysqli_query($con, $select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id =$row['product_id'];
                    $product_title = $row['name'];
                    $product_description = $row['product_description'];
                    $product_category = $row['category_id'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 90%'>
                        <img src='product_images/$product_image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-primary'>Add to Cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";}
            }
        }
    }
?>