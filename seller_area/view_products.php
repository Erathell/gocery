<?php
    include('../includes/connect.php');


          
        
        if(isset($_POST['remove_product'])){
            


            $product_id=$_POST['product_id'];
            $delete_query="Delete from `products` where product_id=$product_id";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo"<script>Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Product removed succesfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function(){window.location = 'index.php?view_products'})</script>";
            }

      }
    


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
                    $product_stock = $row['product_stock'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card' >
                        <img src='../product_images/$product_image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <form method='POST' >
                                <a href='#' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-primary'>Edit Product</a>
                                <input type='hidden' name='product_id' value=$product_id>
                                <button type='submit' name='remove_product' class='btn btn-danger'><i class='fa-solid fa-xmark fa-lg'></i></button>
                            </form>
                        </div>
                    </div>
                </div>";}
                ?>
            <!--row end -->
            </div>
</div>
<div style="clear: both"></div>


