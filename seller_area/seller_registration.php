<?php
@session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Registration</title>
  <!-- bootstrap CSS link -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- font awesome link -->
  <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
  <!-- CSS file -->
  <link rel="stylesheet" href="../styles.css">
  <!-- Sweet Alert 2 Link -->
  <script type="text/javascript" src="../sweetalert2/dist/sweetalert2.all.js"></script>

</head>

<body class="" data-new-gr-c-s-check-loaded="14.1093.0" data-gr-ext-installed>
  <?php
  if (isset($_POST['user_register'])) {
    $user_fname = $_POST['first_name'];
    $user_mname = $_POST['middle_name'];
    $user_lname = $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];
    $province = $_POST['province'];
    $store_name = $_POST['store_name'];
    $contact_num = $_POST['contact_num'];


    $number = preg_match('@[0-9]@', $user_password);
    $uppercase = preg_match('@[A-Z]@', $user_password);
    $lowercase = preg_match('@[a-z]@', $user_password);
    $specialChars = preg_match('@[^\w]@', $user_password);

    // accessing image
    $seller_img = $_FILES['seller_img']['name'];

    // accessing image temp
    $seller_img_tmp = $_FILES['seller_img']['tmp_name'];

    move_uploaded_file($seller_img_tmp, "../user_images/$seller_img");

    $user_ip = getIPAddress();
    //select query


    $select_query_email = "Select * from `seller` where  email='$user_email'";
    $result = mysqli_query($con, $select_query_email);
    $rows_count = mysqli_num_rows($result);
    $name_data = mysqli_fetch_assoc($result);


    if ($rows_count != 0) {
      $ne_error = 'Email aldready taken';
    } else if (strlen($user_password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
      $password_not_strong = 'Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.';
    } else if ($user_password != $conf_user_password) {
      $password_not_match = 'Password do not match';
    } else {

      //insert_query
      $insert_query = "insert into `seller`(first_name,middle_name,last_name,house_no,street,barangay,municipality,province,contact_num,email,password,user_ip,seller_img, store_name) values('$user_fname','$user_mname','$user_lname','$house_no','$street','$barangay','$municipality','$province',$contact_num,'$user_email','$hash_password','$user_ip', '$seller_img', '$store_name')";
      $sql_execute = mysqli_query($con, $insert_query);
      //selecting name for session
      $name_query = "Select * from `seller` where first_name like '%$user_fname%'";
      $result_name = mysqli_query($con, $name_query);
      $name_data = mysqli_fetch_assoc($result_name);
      //$name = $name_data['name'];
      if (isset($name_data['first_name'])) {
        $name = $name_data['first_name'];
        $seller_id = $name_data['seller_id'];
      }

      if ($sql_execute) {
        $_SESSION['name'] = $name;
        $_SESSION['seller_id'] = $seller_id;
        $_SESSION['seller_img'] = $seller_img;
        echo "<script>Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registration Successful',
            showConfirmButton: false,
            timer: 1500
          }).then(function(){window.location = 'index.php'})</script>";
      } else {
        die(mysqli_error($con));
      }
    }
  }
  ?>
  <section class="p-5" style="background-color: #563D7C;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form class="mx-1 mx-md-4" action="" method="post" enctype="multipart/form-data">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="user_fname" class="form-control" placeholder="Enter your first name" name="first_name" required autocomplete="off" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="user_mname" class="form-control" placeholder="Enter your middle name (optional)" name="middle_name" autocomplete="off" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="user_lname" class="form-control" placeholder="Enter your last name" name="last_name" required autocomplete="off" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email address" name="user_email" required autocomplete="off" />
                        <?php if (isset($ne_error)) : ?>
                          <span><?php echo $ne_error; ?></span>
                        <?php endif ?>

                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" name="user_password" required autocomplete="off" />
                        <?php
                        if (isset($password_not_strong)) :
                        ?>
                          <span><?php echo $password_not_strong; ?></span>
                        <?php endif ?>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Repeat your password" name="conf_user_password" required autocomplete="off" />
                        <?php
                        if (isset($password_not_match)) :
                        ?>
                          <span><?php echo $password_not_match; ?></span>
                        <?php endif ?>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-house fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="house_no" class="form-control" placeholder="House no. / Building no." name="house_no" required autocomplete="off" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-house fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="street" class="form-control" placeholder="Street" name="street" required autocomplete="off" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-house fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="barangay" class="form-control" placeholder="Barangay" name="barangay" required autocomplete="off" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-house fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="municipality" class="form-control" placeholder="Municipality/City" name="municipality" required autocomplete="off" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-house fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="province" class="form-control" placeholder="Province" name="province" required autocomplete="off" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-shop fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="store_name" class="form-control" placeholder="Store Name" name="store_name" required autocomplete="off" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-phone fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="number" id="contact_num" class="form-control" placeholder="Enter your contact number" name="contact_num" required autocomplete="off" />
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fa-solid fa-lg me-3 fa-fw fa-image"></i>
                      <input name="seller_img" type="file" class="form-control">
                    </div>
                    <div class="form-check d-flex justify-content-center mb-5">
                      <label class="form-check-label" for="form2Example3">
                        Already have an account? <a class="fw-bold text-info" href="seller_login.php">Login</a>
                      </label>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-green" name="user_register">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-23 col-lg-6 col-xl-7 d-flex align-items-center justify-content-center order-2">
                  <div class="parent-img d-flex flex-column">
                    <img src="../images/shopping.gif" alt="shopping-gif" class="img-fluid ">
                    <img src="../images/logo.png" class="img-fluid " alt="Logo">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- JS link -->
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>