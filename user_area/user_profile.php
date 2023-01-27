<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gocery</title>
    <!-- bootstrap CSS link -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Sweet Alert 2 Link -->
    <script type="text/javascript" src="../sweetalert2/dist/sweetalert2.all.js"></script>
</head>

<body>
    <?php
    $user = $_SESSION['name'];
    $customer_id = $_SESSION['customer_id'];
    $user_ip = getIPAddress();;
    $get_user = "Select * from `customer` where customer_id = '$customer_id' and user_ip ='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $row_data_fetch = mysqli_fetch_array($result);
    ?>

    <div class="main container-fluid p-0 overflow-hidden">
        <!-- navbar -->
        <!-- first child -->
        <nav class="navbar sticky-nav navbar-expand-lg bg-purple-light">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-button" aria-current="page" href="../index.php"><i class="fa-solid fa-house fa-xl "></i><strong> Home</strong></a>
                        </li>
                        <?php
                        if (!isset($_SESSION['name'])) {
                            echo "<li class='nav-item'>
                        <a class='nav-link' style='color: white;' href='./user_area/user_registration.php'><i class='fa-solid fa-user fa-xl'></i><strong> Register</strong></a>
                    </li>";
                        } else {
                            echo "<li class='nav-item'>
                        <a class='nav-link' style='color: white;' href='user_profile.php'><i class='fa-solid fa-user fa-xl'></i><strong> My Account</strong></a>
                    </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link nav-button" href="../cart.php"><i class="fa-solid fa-cart-shopping fa-xl "></i><strong><sup> <?php
                                                                                                                                            cart_number();
                                                                                                                                            ?></sup> Cart</strong></a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link nav-button"><i class=" fa-solid fa-hand-holding-dollar fa-xl "></i><strong> Total Price: ₱ <?php total_cart_price() ?></strong></span>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <button class="btn btn-outline-success" type="submit" value="Search" name="search_product"><img src="../images/search-icon-endless-icons-33.png" width="25rem" alt=""></button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg p-2" style="background-color: #322348;">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['name'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' style='color: white;' href='#'>Welcome Guest</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    
                    <a class='nav-link' style='color: white;' href='#'>Welcome " . $_SESSION['name'] . "</a>
                </li>";
                }

                if (!isset($_SESSION['name'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' style='color: white;' href='./user_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' style='color: white;' href='user_logout.php'>Logout</a>
                </li>";
                }
                ?>
            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light pt-4 pb-1">
            <h3 class="text-center">Customer Dashboard</h3>

        </div>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2 ms-4 mt-3">
                <ul class="rounded-4 navbar-nav bg-purple-light text-center">
                    <li class="nav-item p-3">
                        <h4 class="text-light"> <i class="fa-solid fa-circle-user fa-xl"></i> Your Profile</h4>
                    </li>
                    <li class="nav-item p-3">
                        <img src="../user_images/<?php echo $row_data_fetch['customer_img']; ?>" class="profile-img m-1 rounded-circle" alt="profile_image">
                    </li>
                    <li class="nav-item nav-link p-3 text-start fs-5">
                        <a class="nav-link nav-button" aria-current="page" href="user_profile.php?get_order_details"> <i class="fa-solid fa-circle-user fa-xl"></i> <strong>Pending Orders</strong></a>

                    </li>
                    <li class="nav-item nav-link p-3 text-start fs-5">
                        <a class="nav-link nav-button" aria-current="page" href="user_profile.php?edit_profile"> <i class="fa-solid fa-circle-user fa-xl"></i> <strong>Edit Account</strong></a>

                    </li>
                    <li class="nav-item nav-link p-3 text-start fs-5">
                        <a class="nav-link nav-button" aria-current="page" href="user_profile.php?my_orders"> <i class="fa-solid fa-circle-user fa-xl"></i> <strong>Completed Orders</strong> </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 card ms-3 mt-3 mb-5 bg-purple-light rounded-4">
                <?php
                if (isset($_GET['get_order_details'])) {
                    include('user_orders_pending.php');
                } elseif (isset($_GET['edit_profile'])) {
                    include('edit_profile.php');
                } elseif (isset($_GET['my_orders'])) {
                }

                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                ?>
            </div>

        </div>


        <!-- JS link -->
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>