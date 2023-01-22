

<?php

    //include('../includes/connect.php');

    // Getting products function
    function get_prod(){
        global $con;

        // condition to check isset or not
        if(!isset($_GET['category'])){
        $select_query = "Select * from `products` order by rand()";
        $result_query = mysqli_query($con, $select_query);
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id =$row['product_id'];
            $product_title = $row['name'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 90%'>
                <img src='product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h4 class='card-title'>$product_title</h4>
                    <h5>₱$product_price</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-green'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";}
        }
    }

    // get unique categories

    function get_uniq_cat(){
        global $con;

        // condition to check isset or not
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
            
        $select_query = "Select * from `products` where category_id=$category_id";
        $select_query_cat = "Select * from `categories` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $result_query_cat = mysqli_query($con, $select_query_cat);
        $num_rows=mysqli_num_rows($result_query);
        $row_cat = mysqli_fetch_assoc($result_query_cat);
        

        if($num_rows==0){
            echo "<h2 class='text-center text-danger'> No items for this category";
        } else {
        $category_name = $row_cat['category_title'];
        echo "<h2 class='text-center text-uppercase fw-bold'>$category_name</h2>";
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id =$row['product_id'];
            $product_title = $row['name'];
            $product_description = $row['product_description'];
            $product_category = $row['category_id'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            $category_name = $row_cat['category_title'];
            echo
            "<div class='col-md-4 mb-2'>
            <div class='card' style='width: 90%'>
                
                <img src='product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h4 class='card-title'>$product_title</h4>
                    <p class='card-text'>$product_description</p>
                    <h5>₱$product_price</h5>
                    <a href='index.php?add_to_cart=$product_id' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-green'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";}
            }
        }
    }


    function get_cat(){
        global $con;
        $select_categories="Select * from `categories`";
        $result_categories=mysqli_query($con, $select_categories);
        while($row_data=mysqli_fetch_assoc($result_categories)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "<li class='nav-item' >
            <a href='index.php?category=$category_id' class='nav-link text-uppercase fw-bold text-light mt-2 categories'>$category_title</a>
        </li> ";
        }
    }


    // search function
    function search_prod(){
        global $con;

        // condition to check isset or not
        if(isset($_GET['search_product'])){

            
            $search_value=$_GET['search_data'];
            $search_query="Select * from `products` where product_keywords like '%$search_value%'or name like '$search_value'";
            $result_query = mysqli_query($con, $search_query);
            $num_rows=mysqli_num_rows($result_query);
            
            if($num_rows==0){
                echo "<h2 class='text-center text-danger'> No results found";
                echo "<h5 class='text-center text-grey'> Try using a different keyword";
            } else{
                echo "<h2 class='text-center'>Results for $search_value</h2>";
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id =$row['product_id'];
                    $product_title = $row['name'];
                    $product_description = $row['product_description'];
                    $product_category = $row['category_id'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card' style='width: 90%'>
                        <img src='product_images/$product_image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                        <h4 class='card-title'>$product_title</h4>
                            <p class='card-text'>$product_description</p>
                            <h5>₱$product_price</h5>
                            <a href='index.php?add_to_cart=$product_id' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-green'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
                }
            }
        }
    }


    //view more function
    function view_details() {
        global $con;

        // condition to check isset or not
        if(isset($_GET['product_id'])){

            if(!isset($_GET['category'])){
                $product_id=$_GET['product_id'];
                $select_query = "Select * from `products` where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id =$row['product_id'];
                    $product_title = $row['name'];
                    $product_description = $row['product_description'];
                    $product_category = $row['category_id'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    echo "<div class='col-md-4 mb-2 '>

                    <div class='text-center' style='width: 100%'>
                        <img src='product_images/$product_image' class='img-detailed' alt='$product_title'>
                        
                        <h4 class='card-title'>$product_title</h4>
                        <p class='card-text'>$product_description</p>
                        <h5>₱$product_price</h5>
                            <a href='index.php?add_to_cart=$product_id' style='background-color:#42C84F; border-color: #42C84F;' class='btn btn-green'>Add to Cart</a>
                        
                    </div>
                </div>
                
                <div class='col-md-4 text-center'>
                    <h3>Related Items</h3>       
                </div>
                ";}
            }
        }
    }

    // Get IP function
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    } 
    
    // Cart Function

    function cart(){
        
            if(isset($_GET['add_to_cart'])){
                global $con;
                if(isset($_SESSION['customer_id'])){
                    $customer_id = $_SESSION['customer_id'];
                $get_ip = getIPAddress();
                $get_product_id=$_GET['add_to_cart'];
                $select_query="Select * from `cart` where ip_address= '$get_ip' and product_id=$get_product_id and customer_id=$customer_id";
                $result_query = mysqli_query($con, $select_query);
                $num_rows=mysqli_num_rows($result_query);
                
                if($num_rows>0){
                    echo "<script>Swal.fire({
                        icon: 'warning',
                        title: 'Item already in the cart!',
                        text: 'Select other items or proceed to Cart',
                        confirmButtonColor: '#42C84F'
                    }).then(function(){window.location = 'index.php'});</script>";       
                }else{
                    $insert_query="insert into `cart` (product_id, customer_id, ip_address, quantity) values ($get_product_id, $customer_id,'$get_ip', 1)";
                    $result_query = mysqli_query($con, $insert_query);
                    echo"<script>Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Item added succefully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function(){window.location = 'index.php'})</script>";
                }
            } else echo "<script>window.open('./user_area/user_login.php', '_self')</script>"; 
        } 
    }

    // function to get Cart number

    function cart_number() {
        $count_cart_items = 0;
        if(isset($_SESSION['customer_id'])){
            $customer_id = $_SESSION['customer_id'];
            if(isset($_GET['add_to_cart'])){
                global $con;
                $get_ip = getIPAddress();
                $select_query="Select * from `cart` where ip_address= '$get_ip' and customer_id = $customer_id";
                $result_query = mysqli_query($con, $select_query);
                $count_cart_items=mysqli_num_rows($result_query);
            }else{
                global $con;
                $get_ip = getIPAddress();
                $select_query="Select * from `cart` where ip_address= '$get_ip' AND customer_id = $customer_id";
                $result_query = mysqli_query($con, $select_query);
                $count_cart_items=mysqli_num_rows($result_query);
            }
            echo $count_cart_items;
        } 
        
    }
        
     
        // function for total price

        function total_cart_price() {
            global $con;
            $get_ip_address = getIPAddress();
            $total_price = 0;
            if(isset($_SESSION['customer_id'])){
            $customer_id = $_SESSION['customer_id'];
            $cart_query_price = "Select * from `cart` where ip_address='$get_ip_address' and customer_id = $customer_id";
            $result_cart_price=mysqli_query($con, $cart_query_price);
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
                    }
                }
            }
                echo "$total_price";
        }
        

      // get user order details
    function get_order_details() {
        global $con;
        $username=$_SESSION['name'];
        $get_details = "Select * from `customer` where name = '$username'";
        $result_query = mysqli_query($con, $get_details);
        $row_query=mysqli_fetch_array($result_query);
            $user_id = $row_query['customer_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                $get_orders = "Select * from `transaction` where customer_id = '$user_id' and order_status = 'pending'";
                $result_order_query = mysqli_query($con, $get_orders);
                $row_count = mysqli_num_rows($result_order_query);
                
                if($row_count>0){
                    echo "<h3 class = 'text-light text-center my-2' >You have <span class= 'text- danger'>$row_count</span> pending orders</h3>";
                    echo "<p class= 'text-center'><a class ='text-decoration-none text-light p-0' href = './user_area/user_profile.php?my_orders'> Order Details</a></p>";
                }
                else{
                    echo "<h3 class = 'text-light text-center my-2' >You have <span class= 'text- danger'>Zero</span> pending orders</h3>";
                    echo "<p class= 'text-center'><a class ='text-decoration-none text-light p-0' href = '/gocery/index.php'> Explore Products</a></p>";

                }
                }
            }
        


    }  


        
?>