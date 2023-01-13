<?php
    include('includes/connect.php');
    include('functions/common_function.php');
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
    <link rel="stylesheet" href="styles.css">
</head>
<body>

        
        <div class=" main container-fluid p-0">
            <!-- navbar -->
            <!-- first child -->
            <nav class="navbar sticky-nav navbar-expand-lg" style="background-color: #563D7C;">
            <div class="container-fluid">
                <img src="images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="color: white;" href="index.php"><i class="fa-solid fa-house fa-xl"></i><strong> Home</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="./user_area/user_registration.php"><i class="fa-solid fa-user fa-xl"></i><strong> Register</strong></a>

                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white;"><i class="fa-solid fa-cart-shopping fa-xl"></i><strong><sup>1</sup> Cart</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="#"><i class="fa-solid fa-hand-holding-dollar fa-xl"></i><strong> Total Price</strong> </a>
                    </li>
                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <button class="btn btn-outline-success" type="submit" value="Search" name="search_product"><img src="images/search-icon-endless-icons-33.png" width="25rem" alt="" ></button>
                </form>
                </div>
            </div>
            </nav>
            <!-- second child -->
            <nav class="navbar navbar-expand-lg p-2" style="background-color: #322348;">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="#">Welcome Guest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="./user_area/user_login.php">Login</a>
                    </li>
                </ul>
            </nav>
                <!-- third child -->
                        
            
            
            <!-- fourth child -->
            <div class="row px-1">
                <div class="col-md-10">
                    <!-- products -->
                    <div class="row m-5">
                        <!--fetching products-->
                        <?php
                            view_details();
                            get_uniq_cat();
                        ?>
                    <!--row end -->
                    </div>
                <!--col end -->
                </div>



                <div class="col-md-2 p-0" style="background-color: #322348;">
                    <ul class="navbar-nav me-auto text-center" >
                        <li class="nav-item" style="background-color: #563D7C;">
                            <a href="#" class="nav-link text-light"><h3><strong>Categories</strong></h3></a>
                        </li>
                        <!-- categories -->
                        <?php
                            get_cat();
                        ?>
                        

                    </ul>
                    
                </div>
            </div>
    
        </div>
     
    <!-- last child -->
    <div  class="p-3 text-center footer">
    <p>Dela Cruz, Vinzon, Somoza, Senina - 2022 &copy</p>
    </div>


    <!-- JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>