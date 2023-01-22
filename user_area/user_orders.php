<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Order</title>
</head>
<body>
    <?php
    // include('../includes/connect.php');
    // session_start();
    $user = $_SESSION['name'];
    $get_user = "Select * from `customer` where name = '$user'";
    $result = mysqli_query($con,$get_user);
    $row_data_fetch = mysqli_fetch_assoc($result);
    $customer_id = $row_data_fetch['customer_id'];
    
    ?>
<table class="table table-hover text-light">
    <thead class="text-center">
        <tr>
            <th scope="col">Order #</th>
            <th scope="col">Amount due</th>
            <th scope="col">Total Products</th>
            <th scope="col">Date</th>
            <th scope="col">Complete/Incomplete</th>
            <th scope="col">Order Confirmation</th>
        </tr>
    </thead>

    <tbody class="text-center">
        <?php
        $get_order_details = "Select * from `transaction` where customer_id = '$customer_id'";
        $result_orders = mysqli_query($con, $get_order_details);
        while($row_orders = mysqli_fetch_assoc($result_orders)){
            $order_id = $row_orders['transaction_id'];
            $amount = $row_orders['price'];
            $quantity = $row_orders['quantity'];
            $date = $row_orders['date'];
            $order_status = $row_orders['order_status'];
            echo "<tr>
            <th scope='row'>$order_id</th>
            <td>$amount</td>
            <td>$quantity</td>
            <td>$date</td>
            <td>$order_status</td>
            <td><a href='user_logout.php' class='text-decoration-none'>Confirm</a></td>
        </tr>";
        }
        ?>
        
    </tbody>
</table>

    
</body>
</html>