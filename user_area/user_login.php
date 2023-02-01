<?php include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- bootstrap CSS link -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../styles.css">
    <!-- Sweet Alert 2 Link -->
    <script type="text/javascript" src="../sweetalert2/dist/sweetalert2.all.js"></script>

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../styles.css" rel="stylesheet">
</head>


<body class="text-center bg-purple-light login">
    
<main class="form-signin">
    <form action="" method="post" enctype="multipart/form-data">
        <img class="mb-4" src="../images/logo.png" alt="not working" width="100%" >
        <h1 class="h3 mb-3 fw-md text-light">Please sign in</h1>

        <div class="form-floating mb-2">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="user_email">
        <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="user_password">
        <label for="floatingPassword">Password</label><i class="far fa-eye" id="togglePassword" style="position: absolute; top: 20px;right:16px;cursor: pointer;"></i>
        </div>

        <div class="checkbox mb-3">
        <label class="text-light">
            <input  type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="w-100 btn btn-lg btn-green" type="submit" name="login">Sign in</button>
        <p class="small fw-bold mt-2 pt-1 mb-0 text-light">Don't have an account? <a class="text-info" href="user_registration.php">Register</a></p>
        <a class="small fw-bold mt-2 pt-1 mb-0 text-info" href="../index.php">Go Shopping</a></p>
    </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
  </body>

</html>

<?php

if (isset($_POST['login'])) {
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $user_ip = getIPAddress();


  // $name_query = "Select * from `customer` where email like '%$user_email%'";
  // $result_name = mysqli_query($con,$name_query);
  // $name_data = mysqli_fetch_assoc($result_name);
  //$name = $name_data['name'];
  
  
  $select_query = "Select * from `customer` where email='$user_email'";
  $result = mysqli_query($con, $select_query);
  $rows_count = mysqli_num_rows($result);
  $row_data = mysqli_fetch_assoc($result);

   //fetching name and customer id
  if (isset($row_data['first_name'])) {
    $name = $row_data['first_name'];
    $customer_id = $row_data['customer_id'];}

  //cart item
  $select_query_cart = "Select * from `cart` where ip_address='$user_ip'";
  $select_cart = mysqli_query($con, $select_query_cart);
  $rows_count_cart = mysqli_num_rows($select_cart);

  //checking for user existence
  if($rows_count>0){
    $_SESSION['name']= $name;
    $_SESSION['customer_id'] = $customer_id;
      if(password_verify($user_password,$row_data['password'])){
        $_SESSION['name']= $name;
        $_SESSION['customer_id'] = $customer_id;
      if ($user_email == $row_data['email']) {
        if ($rows_count == 1 and $rows_count_cart == 0) {
          $_SESSION['name'] = $name;
          $_SESSION['customer_id'] = $customer_id;
          echo "<script>Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Login successfuly ',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){window.location = '/gocery/index.php'})</script>";
        } 
        else {
          $_SESSION['name']= $name;
          $_SESSION['customer_id'] = $customer_id;
          echo "<script>Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Login successfuly',
              showConfirmButton: false,
              timer: 1500
            }).then(function(){window.location = '/gocery/index.php'})</script>";
        }
      }
      else{
        echo "<script>Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Invalid Email or Password ',
          showConfirmButton: false,
          timer: 1500
      })</script>";
      }
      }
      else{
        echo "<script>Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Invalid Email or Password ',
          showConfirmButton: false,
          timer: 1500
      })</script>";
      }
  }
  else{
    echo "<script>Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Invalid Email or Password ',
      showConfirmButton: false,
      timer: 1500
  })</script>";
  }
}   
?>

<script>const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#floatingPassword');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});</script>