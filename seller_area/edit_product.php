<?php include('../includes/connect.php');
include('../functions/common_function.php');
session_start();






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../styles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #563D7C;">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="logo">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #563D7C;">

                </nav>
            </div>
        </nav>
    </div>
    <!-- second child -->
    <div class="mb-n12 secondary text-white">
        <h3 class="text-center p-3 pt-3">Manage Details</h3>
    </div>

    <!-- third child -->
    <div class="row p-0">
        <div class="col-md-12 secondary p-2 px-5 d-flex align-items-center">

            <div>
                <a href="#"><img src="../user_images/<?php echo $_SESSION['seller_img'] ?>" alt="" class="admin_image rounded-circle mb-2 "></a>
                <p class="text-light text-center fw-bold"><?php echo $_SESSION['name'] ?></p>
            </div>


            <div class="button text-center ms-auto me-auto">
                <button type="button" class="btn btn-green m-2"><a href="index.php?add_product" class="nav-link">Add Product</a></button>
                <button type="button" class="btn btn-green m-2"><a href="index.php?add_category" class="nav-link">Add Category</a></button>
                <button type="button" class="btn btn-green m-2"><a href="index.php?view_products" class="nav-link">View Products</a></button>
                <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">View Transactions</a></button>
                <button type="button" class="btn btn-green m-2"><a href="index.php?edit_profile" class="nav-link">Edit Profile</a></button>
                <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">Log Out</a></button>
            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3 p-4 bg-purple-light rounded">
        <?php
        if (isset($_GET['product_id'])) {
            global $con;
            $product_id = $_GET['product_id'];
            $select_product = "select * from products where product_id=$product_id";
            $run_select = mysqli_query($con, $select_product);


            $row = mysqli_fetch_assoc($run_select);
            $product_name = $row['name'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_brand = $row['brands'];
            $category_id = $row['category_id'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $date = $row['date'];
            $product_stock = $row['product_stock'];
        }

        ?>
        <div class="container text-light">
            <div class="ms-5 my-3">
                <h1>Edit Product</h1>
            </div>
            <form class="form-horizontal"  method="POST" enctype="multipart/form-data">
                <div class="row my-3">
                    <!-- left column -->
                    <div class="col-md-3 form-group">
                        <div class="text-center">
                            <img src="../product_images/<?php echo "$product_image" ?>" class="admin_image m-1 rounded-circle" alt="product">
                            <h6>Upload a different photo...</h6>
                            <input class="form-control" name="product_image" type="file" >
                        </div>

                    </div>

                    <!-- edit form column -->
                    <div class="col-md-9 ">


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Product Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="product_name" type="text" value="<?php echo "$product_name" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Product Description:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="product_description" type="text" value="<?php echo "$product_description" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Product Keywords:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="product_keywords" type="text" value="<?php echo "$product_keywords" ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Product Brand:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="product_brand" type="text" value="<?php echo "$product_brand" ?>">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-lg-3 control-label">Category:</label>
                            <div class="col-lg-8">
                                <select name="product_category" id="#" class="form-select col-lg-3" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    $select_query = "Select * from `categories`";
                                    $result_query = mysqli_query($con, $select_query);
                                    while ($row = mysqli_fetch_assoc($result_query)) {
                                        $category_title = $row['category_title'];
                                        $category_id = $row['category_id'];
                                        echo "<option  value='$category_id'>$category_title</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Product Price:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name='product_price' type="number" value="<?php echo "$product_price" ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Product Stock:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name='product_stock' type="number" value="<?php echo "$product_stock" ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" name="save_changes" class="btn btn-green" value="Save Changes">
                                <input type="reset" class="btn btn-light" value="Cancel">
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>

    </div>
    <!-- Bootstrap JS Link -->


    <?php


    if (isset($_POST['save_changes'])) {
        global $con;
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $product_keywords = $_POST['product_keywords'];
        $category_id = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $product_stock = $_POST['product_stock'];
        $product_img = $_FILES['product_img']['name'];
        $product_img_tmp = $_FILES['product_img']['tmp_name'];


            move_uploaded_file($product_img_tmp , "../product_images/$product_img");
            $update_product = "update `products` SET name='$product_name', product_description='$product_description', product_keywords='$product_keywords', brands='$product_brand', category_id=$category_id, product_price=$product_price, date=NOW(), product_stock=$product_stock, product_image='$product_img' where product_id=$product_id";
            $run_update = mysqli_query($con, $update_product);
            if ($run_update) {
                echo "<script>window.open('edit_product.php?product_id=$product_id','_self')</script>";
            } 
  
                

    }
    ?>
</body>

</html>