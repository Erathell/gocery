<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_name'];
    $product_description = $_POST['description'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['price'];
    $product_status = 'true';

    //accessing images
    $product_image = $_FILES['product_image']['name'];

    //accessing image tmp name

    $temp_product_image = $_FILES['product_image']['tmp_name'];

    if($product_title =='' or  $product_description =='' or $product_category =='' or $product_price =='' or $product_image ==''){
        echo "<script>alert('Please fill all the fields') </script>";
        exit();
    }
    else{
        move_uploaded_file($temp_product_image, "../product_images/$product_image");

        //insert query

        $insert_product = "insert into `products`(name,product_description,category_id,product_image,product_price,date,status) values('$product_title','$product_description','$product_category','$product_image', '$product_price',NOW(),'$product_status')";
        $result_query = mysqli_query($con, $insert_product);
        if($result_query){
            echo "<script>alert('Product Successfully Added!') </script>";
        }
    }
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Add Products</h1>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" autocomplete="off" required>
        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="decription" class="form-label">Product Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="keywords" class="form-label">Product Keywords</label>
            <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required>
        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto"><select name="product_category" id="#" class="form-select">
                <option value="">Select Category</option>
                <?php
                $select_query = "Select * from `categories`";
                $result_query = mysqli_query($con, $select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }

                ?>
                
            </select>
        </div>
        <!-- image -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="form-control" required>
        </div>
        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
        </div>
        <!-- submit -->
        <div class="form-outline mb-4 d-flex justify-content-center ">
            <button type="submit" name="insert_product" class="insert_product btn btn-green" value="Insert Product">Insert Product</button>
        </div>

    </form>
</div> 
