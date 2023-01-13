<?php
    include('../includes/connect.php')
?>

<h1 class='text-center'>Products</h1>
<div class="row mt-4 view-prod-row">
<div class="col-md-10">
            <!-- products -->
            <div class="row ">
                <!--fetching products-->
                <?php
                $select_query = "Select * from `products` order by name";
                $result_query = mysqli_query($con, $select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id =$row['product_id'];
                    $product_title = $row['name'];
                    $product_description = $row['product_description'];
                    $product_category = $row['category_id'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card' >
                        <img src='../product_images/$product_image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-primary'>Edit Product</a>
                        </div>
                    </div>
                </div>";}
                ?>
            <!--row end -->
            </div>
</div>
<div style="clear: both"></div>