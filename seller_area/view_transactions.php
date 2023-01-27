<?php
include('../includes/connect.php');
if (!isset($_SESSION)) {
    session_start();
}
$user = $_SESSION['name'];
$customer_id = $_SESSION['seller_id'];
$get_user = "Select * from `customer` where customer_id = '$customer_id'";
$result = mysqli_query($con, $get_user);
$row_data_fetch = mysqli_fetch_assoc($result);
$customer_id = $row_data_fetch['customer_id'];


?>
<div class="card">
    <table class="table text-dark ">
        <thead class="text-center">
            <tr>
                <th scope="col">Order #</th>
                <th scope="col">Customer Address</th>
                <th scope="col">Customer Contact No.</th>
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
            $get_order_details = "Select * from `transaction` ";
            $result_orders = mysqli_query($con, $get_order_details);
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['transaction_id'];
                $amount = $row_orders['price'];
                $quantity = $row_orders['quantity'];

                $date = $row_orders['date'];
                $order_status = $row_orders['order_status'];
                $product_id = $row_orders['product_id'];

                $customer_id = $row_orders['customer_id'];
                $get_customer = "select * from `customer` where customer_id=$customer_id";
                $result_customer = mysqli_query($con, $get_customer);
                $row_customer = mysqli_fetch_assoc($result_customer);
                $customer_address = $row_customer['house_no'] . " " . $row_customer['street'] . " " . $row_customer['barangay'] . " " . $row_customer['municipality'] . " " . $row_customer['province'];
                $customer_number = "0" . $row_customer['contact_num'];


                $get_prod_details = "Select * from `products` where product_id= '$product_id'";
                $result_products = mysqli_query($con, $get_prod_details);
                $row_prod = mysqli_fetch_assoc($result_products);
                $product_name = $row_prod['name'];
                if ($order_status == 'pending') {
                    echo "<tr class='table-hover-orange'>
                    <th scope='row' >$order_id</th>
                    <td>$customer_address</td>
                    <td>$customer_number</td>
                    <td class='mb-2'>Php $amount</td>
                    <td>$product_name</td>
                    <td>$quantity</td>
                    <td>$date</td>
                    <td><span class='fw-bold' style='color:#ffc107;'>$order_status</span></td>
                    <!-- <td><a href='user_logout.php' class='text-decoration-none'>Confirm</a></td>
                        </tr> -->";
                } else  echo "<tr class='table-hover-orange'>
                <th scope='row' >$order_id</th>
                <td>$customer_address</td>
                <td>$customer_number</td>
                <td class='mb-2'>Php $amount</td>
                <td>$product_name</td>
                <td>$quantity</td>
                <td>$date</td>
                <td><span class='fw-bold' style='color:green;'>$order_status</span></td>
                <!-- <td><a href='user_logout.php' class='text-decoration-none'>Confirm</a></td>
                    </tr> -->";
            }



            ?>
        </tbody>
    </table>
</div>