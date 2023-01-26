<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Order</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
    // include('../includes/connect.php');
    // session_start();
    $user = $_SESSION['name'];
    $customer_id = $_SESSION['customer_id'];
    $get_user = "Select * from `customer` where first_name = '$user' and customer_id = '$customer_id'";
    $result = mysqli_query($con,$get_user);
    $row_data_fetch = mysqli_fetch_assoc($result);
    $customer_id = $row_data_fetch['customer_id'];
    
    ?>
    
<table class="table text-light ">
    <thead class="text-center">
        <tr>
            <th scope="col" >Order #</th>
            <th scope="col">Amount due</th>
            <th scope="col">Product</th>
            <th scope="col">Total Products</th>
            <th scope="col">Date</th>
            <th scope="col">Complete/Incomplete</th>
            <!-- <th scope="col">Order Confirmation</th> -->
        </tr>
    </thead>

    <tbody class="text-center">
        <?php
        $get_order_details = "Select * from `transaction` where customer_id= '$customer_id' AND order_status LIKE 'complete'";
        $result_orders = mysqli_query($con, $get_order_details);
        while($row_orders = mysqli_fetch_assoc($result_orders)){
            $order_id = $row_orders['transaction_id'];
            $amount = $row_orders['price'];
            $quantity = $row_orders['quantity'];
            $date = $row_orders['date'];
            $order_status = $row_orders['order_status'];
            $product_id = $row_orders['product_id'];
            $get_prod_details = "Select * from `products` where product_id= '$product_id'";
            $result_products = mysqli_query($con, $get_prod_details);
            $row_prod = mysqli_fetch_assoc($result_products); 
            $product_name=$row_prod['name'];
                echo "<tr class='table-hover-orange'>
                    <th scope='row' >$order_id</th>
                    <td class='mb-2'>Php $amount</td>
                    <td>$product_name</td>
                    <td>$quantity</td>
                    <td>$date</td>
                    <td>$order_status
                    </td>
                    <!-- <td><a href='user_logout.php' class='text-decoration-none'>Confirm</a></td>
                        </tr> -->";
                }
  
        ?>
    </tbody>
</table>

    
</body>
</html>