<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');

    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
        

        // getting total items and total price
        $get_ip_address = getIPAddress();
        $total_price = 0;
        $cart_query_price = "Select * from `cart` where ip_address='$get_ip_address'";
        $result_cart_price=mysqli_query($con, $cart_query_price);
        $count_products=mysqli_num_rows($result_cart_price);
        $status='PENDING';
        while($row_price=mysqli_fetch_array($result_cart_price)){
            $product_id=$row_price['product_id'];
            $select_product="Select * from `products` where product_id=$product_id";
            $run_price=mysqli_query($con, $select_product);
            while($row_product_price=mysqli_fetch_array($run_price)){
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $get_cart="select * from `cart` where product_id=$product_id";
                $run_cart=mysqli_query($con,$get_cart);
                $get_item_quantity=mysqli_fetch_array($run_cart);
                $quantity=$get_item_quantity['quantity'];
                $total_price+=$product_values*$quantity;
                
                // insert for transaction table
                $insert_orders="insert into `transaction` (customer_id, product_id, courier_id, seller_id, price, quantity, date, order_status) values 
                ($user_id, $product_id, 0, 0, $product_values*$quantity, $quantity, NOW(), '$status')";
                $result_orders=mysqli_query($con, $insert_orders);



            }
        }

        // delete items for cart
        $empty_cart="Delete from `cart` where ip_address='$get_ip_address'";
        $result_delete=mysqli_query($con, $empty_cart);

        if($result_orders){
            echo "<script>window.open('user_profile.php', '_self')</script>";
        }
        
        echo $total_price;
    }
?>