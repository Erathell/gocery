<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gocery</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../styles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

        
        <div class="main container-fluid p-0 overflow-hidden">
            <!-- navbar -->
            <!-- first child -->
            <nav class="navbar sticky-nav navbar-expand-lg bg-purple-light" >
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-button" aria-current="page" href="../index.php"><i class="fa-solid fa-house fa-xl "></i><strong> Home</strong></a>
                    </li>
                    <?php
                    if(!isset($_SESSION['name'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' style='color: white;' href='./user_area/user_registration.php'><i class='fa-solid fa-user fa-xl'></i><strong> Register</strong></a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a class='nav-link' style='color: white;' href='user_profile.php'><i class='fa-solid fa-user fa-xl'></i><strong> My Account</strong></a>
                    </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link nav-button" href="../cart.php"><i class="fa-solid fa-cart-shopping fa-xl "></i><strong><sup> <?php
                            cart_number();
                        ?></sup> Cart</strong></a>
                    </li>
                    <li class="nav-item">
                    <span class="nav-link nav-button"><i class=" fa-solid fa-hand-holding-dollar fa-xl "></i><strong> Total Price: ₱ <?php total_cart_price()?></strong></span>
                    </li>
                </ul>
                <form class="d-flex" action="../search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <button class="btn btn-outline-success" type="submit" value="Search" name="search_product"><img src="../images/search-icon-endless-icons-33.png" width="25rem" alt="" ></button>
                </form>
                </div>
            </div>
            </nav>

            <!-- second child -->
            <nav class="navbar navbar-expand-lg p-2" style="background-color: #322348;">
                <ul class="navbar-nav me-auto">
                <?php
                if(!isset($_SESSION['name'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' style='color: white;' href='#'>Welcome Guest</a>
                </li>";
                }else{
                    echo "<li class='nav-item'>
                    
                    <a class='nav-link' style='color: white;' href='#'>Welcome ".$_SESSION['name']."</a>
                </li>";
                }

                if(!isset($_SESSION['name'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' style='color: white;' href='./user_area/user_login.php'>Login</a>
                </li>";
                }else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' style='color: white;' href='user_logout.php'>Logout</a>
                </li>";
                }
                ?>
                </ul>
            </nav>
                <!-- third child -->
                <div class="bg-light pt-4 pb-1">
                    <h3 class="text-center">Customer Dashboard</h3>
                    
                </div>
            
            <!-- fourth child -->
                <div class="row">
                    <div class="col-md-2 ms-4 mt-3">
                        <ul class="rounded-4 navbar-nav bg-purple-light text-center">
                            <li class="nav-item p-3">
                                <h4 class="text-light"> <i class="fa-solid fa-circle-user fa-xl"></i>  Your Profile</h4>
                            </li>
                            <li class="nav-item p-3">
                                <img src="../product_images/among-us-twerk.gif" class="profile-img m-1 rounded-circle" alt="profile_image">
                            </li>
                            <li class="nav-item nav-link p-3 text-start fs-5">
                                <a class="nav-link nav-button" aria-current="page" href="user_profile.php?get_order_details" > <i class="fa-solid fa-circle-user fa-xl"></i>  <strong>Pending Orders</strong></a>
                                
                            </li>
                            <li class="nav-item nav-link p-3 text-start fs-5">
                                <a class="nav-link nav-button" aria-current="page" href="user_profile.php?edit_profile"> <i class="fa-solid fa-circle-user fa-xl"></i>  <strong>Edit Account</strong></a>
                                
                            </li>
                            <li class="nav-item nav-link p-3 text-start fs-5">
                                <a class="nav-link nav-button" aria-current="page" href="user_profile.php?my_orders"> <i class="fa-solid fa-circle-user fa-xl"></i>  <strong>Orders</strong> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 ms-3 mt-3 bg-purple-light rounded-4">
                                <?php 
                            if(isset($_GET['get_order_details'])){
                                get_order_details();
                            }
                            elseif(isset($_GET['edit_profile'])){
                                include('edit_profile.php');
                            }
                            elseif(isset($_GET['my_orders'])){
                                
                            }

                        if(isset($_GET['my_orders'])){
                                include('user_orders.php');
                        }
                        ?>
                    </div>

                </div>


    <!-- JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

