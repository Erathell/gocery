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
            <a href="index.php"><button type="button" class="btn btn-green btn-rounded mb-3">Continue Shopping</button></a>
                
                    <div class="row">
                    <form action="" method="post">  
                            <table class="table table-bordered text-center"> 
                                
                                <tbody>
                                    <!-- PHP Dynamic Data Display-->
                                    <?php

                                        $total_price=0;
                                        $get_ip = getIPAddress();
                                        $cart_query="Select * from `cart` where ip_address= '$get_ip'";
                                        $result_cart=mysqli_query($con,$cart_query);
                                        $result_count=mysqli_num_rows($result_cart);
                                        if($result_count>0){
                                            echo "<thead>
                                            <tr>
                                                <th>Product Title</th>
                                                <th>Product Image</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Remove</th>
                                                <th colspan='2'>Operations</th>
                                            </tr>
                                        </thead>";
                                            
                                        while($row=mysqli_fetch_array($result_cart)){
                                            $product_id=$row['product_id'];
                                            $select_products="Select * from `products` where product_id=$product_id";
                                            $result_products=mysqli_query($con,$select_products);
                                            while($row_product_price=mysqli_fetch_array($result_products)){
                                                $product_price=array($row_product_price['product_price']);
                                                $price_table=$row_product_price['product_price'];
                                                $product_title=$row_product_price['name'];
                                                $product_image=$row_product_price['product_image'];
                                                $product_values=array_sum($product_price);
                                                $total_price+=$product_values;
                                                                  
                                    ?>
                                    <tr>
                                        <td><?php echo $product_title?></td>
                                        <td><img src="./product_images/<?php echo $product_image ?>" class="cart_img" alt="sus"></td>
                                        <td><input type="number" min="1" name="qty" id="" class="form-input w-50" ></td> <?php
                                            // $get_ip = getIPAddress();
                                            // if(isset($_POST['update_cart'])){
                                            //     $quantities=$_POST['qty'];
                                            //     $update_cart="update `cart` set quantity=$quantities where ip_address='$get_ip'";
                                            //     $result=mysqli_query($con, $update_cart);
                                            //     $total_price=$total_price*$quantities;
                                            // }
                                         ?>
                                        <td>₱ <?php echo $price_table?></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <button type="submit" value="Update Cart" name="update_cart" class="btn btn-warning btn-rounded me-3">Update</button>
                                           
                                            <button type="submit" name="remove_cart" class="btn btn-danger btn-rounded">Delete</button>
                                            
                                        </td>
                                    </tr>
                                <?php }
                                }
                            }else{
                                echo "<h2 class='text-center'>Cart is Empty!</h2>";
                            }       ?>
                                </tbody>
                            </table>
                            <!-- subtotal -->
                            <?php 
                            
                            $get_ip = getIPAddress();
                            $cart_query="Select * from `cart` where ip_address= '$get_ip'";
                            $result_cart=mysqli_query($con,$cart_query);
                            $result_count=mysqli_num_rows($result_cart);
                            if($result_count>0){
                                echo "<div class='d-flex align-items-end flex-column'>
                                <h4 class='pb-2'>Subtotal: <strong>₱ $total_price</strong></h4>
                                <a href='#'><button type='button' class='btn btn-green btn-rounded'>Proceed to checkout</button></a>
                            </div>";
                            }
                            
                            ?>
                            
                        </div>
                    </div>
                </form>      
                
                <!-- remove product function -->

                <?php 
                    function update_cart_item() {
                        global $con;
                        global $total_price;
                        $get_ip = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];

                            foreach($_POST['removeitem'] as $remove_id){
                                echo $remove_id;
                                $query="update `cart` set quantity=$quantities where ip_address='$get_ip' AND product_id=$remove_id";
                                $query_results=mysqli_query($con, $query);
                                
                                if($query_results){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    } echo $update_item=update_cart_item();
                
                ?>

                <?php 
                    function remove_cart_item() {
                        global $con;

                        if(isset($_POST['remove_cart'])){
                            foreach($_POST['removeitem'] as $remove_id){
                                echo $remove_id;
                                $delete_query="Delete from `cart` where product_id=$remove_id";
                                $run_delete=mysqli_query($con, $delete_query);
                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    } echo $remove_item=remove_cart_item();
                
                ?>
    <!-- last child -->
    
    </div>
    <div  class="p-3 text-center footer">
    <p>Dela Cruz, Vinzon, Somoza, Senina - 2022 &copy</p>

    <!-- JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>