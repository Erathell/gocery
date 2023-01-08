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
</head>

<body>
        <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #563D7C;">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="logo">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #563D7C;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-white fw-bold"><i class="fa-solid fa-user fa-xl"></i> Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
        <!-- second child -->
        <div class="mb-n12 secondary text-white">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row p-0">
            <div class="col-md-12 secondary p-2 px-5 d-flex align-items-center">
                <div>
                    <a href="#"><img src="../images/pineapple-juice.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Seller Name</p>
                </div>
                <div class="button text-center ms-auto me-auto">
                        <button type="button" class="btn btn-green m-2"><a href="index.php?add_product" class="nav-link">Add Product</a></button>
                        <button type="button" class="btn btn-green m-2"><a href="index.php?add_category" class="nav-link">Add Category</a></button>
                        <button type="button" class="btn btn-green m-2"><a href="index.php?view_products" class="nav-link">View Products</a></button>
                        <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">View Transactions</a></button>
                        <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">Edit Profile</a></button>
                        <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">Log Out</a></button> 
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php 
                if(isset($_GET['add_category'])){
                    include('add_category.php');
                }
                elseif(isset($_GET['add_product'])){
                    include('add_product.php');
                }
                elseif(isset($_GET['view_products'])){
                    include('view_products.php');
                }
            ?>

        </div>
    <!-- Bootstrap JS Link -->
    <div class=" p-3 text-center footer">
        <p>Dela Cruz, Vinzon, Somoza, Senina - 2022 &copy</p>
    </div>
</body>
</html>