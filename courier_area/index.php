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
    <title>Courier Dashboard</title>
    <!-- bootstrap CSS link -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Sweet Alert 2 Link -->
    <script type="text/javascript" src="../sweetalert2/dist/sweetalert2.all.js"></script>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="fonts.css">
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #563D7C;">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="logo">

            </div>
        </nav>
    </div>
    <!-- second child -->
    <div class="mb-n12 secondary text-white">
        <h3 class="text-center p-3 pt-3">Manage Details</h3>
    </div>

    <!-- third child -->
    <div class="row p-0">
        <div class="col-md-12 secondary p-2 px-5 d-flex align-items-center">
            <div>
                <a href="#"><img src="../user_images/<?php echo $_SESSION['courier_img'] ?>" alt="" class="admin_image"></a>
                <p class="text-light text-center"><?php echo $_SESSION['name'] ?></p>
            </div>
            <div class="button text-center ms-auto me-auto">
                <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">Available Deliveries</a></button>
                <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">Delivery History</a></button>
                <button type="button" class="btn btn-green m-2"><a href="#" class="nav-link">Edit Profile</a></button>
                <button type="button" class="btn btn-green m-2"><a href="courier_logout.php" class="nav-link">Log Out</a></button>

            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3">
        <?php
        if (isset($_GET['available_deliveries'])) {
            include('add_category.php');
        } elseif (isset($_GET['delivery_history'])) {
            include('add_product.php');
        } elseif (isset($_GET['edit_profile'])) {
            include('view_products.php');
        }
        ?>

    </div>
    <!-- Bootstrap JS Link -->
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>