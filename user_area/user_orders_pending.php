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
    if (!isset($_SESSION)) {
        session_start();
    }
    $user = $_SESSION['name'];
    $customer_id = $_SESSION['customer_id'];
    $get_user = "Select * from `customer` where customer_id = '$customer_id'";
    $result = mysqli_query($con, $get_user);
    $row_data_fetch = mysqli_fetch_assoc($result);
    $customer_id = $row_data_fetch['customer_id'];


    ?>

    <table class="table font-grey">
        <thead class="text-center">
            <tr>
                <th scope="col">Order #</th>
                <th scope="col">Amount due</th>
                <th scope="col">Product</th>
                <th scope="col">Total Products</th>
                <th scope="col">Date</th>
                <th scope="col">Complete/Incomplete</th>
                <th scope="col">Order Confirmation</th>
            </tr>
        </thead>

        <tbody class="text-center">

            <?php
            $get_order_details = "Select * from `transaction` where customer_id= '$customer_id' AND order_status NOT LIKE 'complete'";
            $result_orders = mysqli_query($con, $get_order_details);
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['transaction_id'];
                $amount = $row_orders['price'];
                $quantity = $row_orders['quantity'];
                $date = $row_orders['date'];
                $order_status = $row_orders['order_status'];
                $product_id = $row_orders['product_id'];
                $get_prod_details = "Select * from `products` where product_id= '$product_id'";
                $result_products = mysqli_query($con, $get_prod_details);
                $row_prod = mysqli_fetch_assoc($result_products);
                $product_name = $row_prod['name'];
                echo "<tr class='table-hover-orange'>
            <form action='' method='POST'>
            <td scope='row' >$order_id</td>
            <td class='mb-2'>Php $amount</td>
            <td>$product_name</td>
            <td>$quantity</td>
            <td>$date</td>
            <td>$order_status</td>
            <td>
            <input type='hidden' value='$order_id' name='order_id'>
            <input type='hidden' value='$product_id' name='product_id'>
            <button type='submit' name='confirm' class='btn btn-green-purple rounded-pill'>Delivered</button></td>
            </form> </tr>";
            }
            ?>
            <?php if (isset($_POST['confirm'])) {
                if ($order_status == 'RECEIVED') {
                    echo "<script>Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Item already delivered.',
                        showConfirmButton: false,
                        timer: 1500})</script>";
                } else {
                    $product_id = $_POST['product_id'];
                    $order_id = $_POST['order_id'];
                    $update_transaction = "update `transaction` set order_status='RECEIVED' where customer_id ='$customer_id' and product_id=$product_id and transaction_id=$order_id";
                    $run_query_transaction = mysqli_query($con, $update_transaction);
                    if ($run_query_transaction) {
                        echo "<script>window.open('user_profile.php?get_order_details','_self')</script>";
                    }
                }
            } ?>
        </tbody>
    </table>


</body>

</html>