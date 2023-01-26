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
    include('../includes/connect.php');
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $user = $_SESSION['name'];
    $customer_id = $_SESSION['customer_id'];
    $get_user = "Select * from `customer` where customer_id = '$customer_id'";
    $result = mysqli_query($con,$get_user);
    $row_data_fetch = mysqli_fetch_assoc($result);
    $customer_id = $row_data_fetch['customer_id'];
    
    
    ?>
    
<table class="table text-light ">
    <thead class="text-center">
        <tr>
            <th scope="col" >Order #</th>
            <th scope="col">Amount due</th>
            <th scope="col">Total Products</th>
            <th scope="col">Date</th>
            <th scope="col">Complete/Incomplete</th>
            <th scope="col">Order Confirmation</th>
        </tr>
    </thead>

    <tbody class="text-center">
        <form action="" method="POST">
        <?php
        $get_order_details = "Select * from `transaction` where customer_id= '$customer_id' AND order_status NOT LIKE 'complete'";
        $result_orders = mysqli_query($con, $get_order_details);
        while($row_orders = mysqli_fetch_assoc($result_orders)){
            $order_id = $row_orders['transaction_id'];
            $amount = $row_orders['price'];
            $quantity = $row_orders['quantity'];
            $date = $row_orders['date'];
            $order_status = $row_orders['order_status'];
            $product_id = $row_orders['product_id'];
            echo "<tr class='table-hover-orange'>
            <th scope='row' >$order_id</th>
            <td class='mb-2'>Php $amount</td>
            <td>$quantity</td>
            <td>$date</td>
            <td>$order_status</td>
            <td><button type='submit' name='confirm' class='btn btn-green-purple rounded-pill'>Confirm</button></td>
                </tr>";}
        ?>
        </form>
    </tbody>
</table>
<?php if(isset($_POST['confirm'])){
        $update_transaction ="update `transaction` set order_status='Complete' where customer_id = '$customer_id' and product_id=$product_id and transaction_id=$order_id";
        $run_query = mysqli_query($con, $update_pending);
        $run_query_transaction = mysqli_query($con, $update_transaction);
        if($run_query_transaction){
            echo "<script>window.open('./user_profile.php?get_order_details','_self')</script>";
        }
    }?>
    
</body>
</html>