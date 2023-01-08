<?php

    include('./includes/connect.php');

    // Getting products function
    function getProducts(){
        global $con;
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
    function getCategories(){
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
?>