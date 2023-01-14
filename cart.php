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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

        <div class="main container-fluid p-0">
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
                        <a class="nav-link nav-button" aria-current="page" href="index.php"><i class="fa-solid fa-house fa-xl "></i><strong> Home</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-button" href="./user_area/user_registration.php"><i class="fa-solid fa-user fa-xl "></i><strong> Register</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-button" href="cart.php"><i class="fa-solid fa-cart-shopping fa-xl "></i><strong><sup> <?php
                            cart_number();
                        ?></sup> Cart</strong></a>
                    </li>

                </ul>

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
                <div class="bg-light pt-4 pb-1 mb-4">
                    <h3 class="text-center">Shopping Cart</h3>
                    
                </div>
            
            
            <!-- fourth child table -->
            <div class="container">
                <div class="row">
                    <table class="table table-bordered text-center"> 
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>Sus</td>
                            <td><img src="./product_images/among-us-twerk.gif" width="100"alt="sus"></td>
                            <td><input type="text" name="" id=""></td>
                            <td>9000</td>
                            <td><input type="checkbox"></td>
                            <td>
                                <p>Update</p>
                                <p>Remove</p>
                            </td>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div>
                        <h4 class="px-3">Subtotal: <strong>9000</strong></h4>
                        <a href="index.php"><button type="button" class="btn btn-green btn-rounded">Continue Shopping</button></a>
                    </div>
                </div>
            </div>
     
    <!-- last child -->
    
    </div>
    <div  class="p-3 text-center footer">
    <p>Dela Cruz, Vinzon, Somoza, Senina - 2022 &copy</p>

    <!-- JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>