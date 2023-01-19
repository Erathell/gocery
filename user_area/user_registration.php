<?php
    session_start();
    include('../includes/connect.php');
    include('../functions/common_function.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../styles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="text-center login" data-new-gr-c-s-check-loaded="14.1093.0" data-gr-ext-installed>
  <?php
        if(isset($_POST['user_register'])){
          $user_fullname = $_POST['user_fullname'];
          $user_email = $_POST['user_email'];
          $user_password = $_POST['user_password'];
          $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
          $conf_user_password = $_POST['conf_user_password'];
          $user_address = $_POST['user_address'];
          $contact_num = $_POST['contact_num'];
          $user_ip = getIPAddress();
          //select query

        $select_query_email = "Select * from `customer` where  email='$user_email'";
        $result = mysqli_query($con, $select_query_email);
        $rows_count = mysqli_num_rows($result);

        if($rows_count != 0){
          $ne_error='Email aldready taken';
        }
        else if($user_password != $conf_user_password){
        $password_not_match = 'Password do not match';
        }
        else{
        //insert_query
        $insert_query = "insert into `customer`(name,address,contact_num,email,password,user_ip) values('$user_fullname','$user_address',$contact_num,'$user_email','$hash_password','$user_ip')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
          echo "<script>Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registration Successful',
            showConfirmButton: false,
            timer: 1500
          }).then(function(){window.location = 'user_login.php'})</script>";
        } 
        else {
          die(mysqli_error($con));
        }
        }
        //selecting cart items
        // $select_cart_items = "Select * from `cart` where ip_address = '$user_ip'";
        // $result_cart = mysqli_query($con, $select_cart_items);
        // $rows_count_cart = mysqli_num_rows($result_cart);
        // if($rows_count_cart>0){
        //   $_SESSION['name'];
        // echo "<script> alert('You have items in your cart')</script>";
        // } 
}
?>
<section class="vh-100 vw-100" style="background-color: #563D7C;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" action="" method="post" enctype="multipart/form-data">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="user_fullname" class="form-control" placeholder="Enter your full name" name="user_fullname" required autocomplete="off"/>
                  
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="user_email" class="form-control" placeholder="Enter your email address" name="user_email" required autocomplete="off"/>
                      
                      <?php if(isset($ne_error)):?>
                      <span><?php echo $ne_error;?></span>
                      <?php endif?>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="user_password" class="form-control" placeholder="Enter your password" name="user_password" required autocomplete="off"/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="conf_user_password" class="form-control" placeholder="Repeat your password" name="conf_user_password" required autocomplete="off"/>
                      <?php
                      if(isset($password_not_match)):
                      ?>
                      <span><?php echo $password_not_match;?></span>
                      <?php endif?>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fa-solid fa-house fa-lg me-3 fa-fw1"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="user_address" class="form-control" placeholder="Enter your address" name="user_address" required autocomplete="off"/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fa-solid fa-phone fa-lg me-3 fa-fw1"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="contact_num" class="form-control" placeholder="Enter your contact number" name="contact_num" required autocomplete="off"/>
                    </div>
                  </div>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <label class="form-check-label" for="form2Example3">
                      Already have an account? <a class="fw-bold text-info" href="user_login.php">Login</a>
                    </label>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-green" name="user_register">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../images/logo.png"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>

</html>

