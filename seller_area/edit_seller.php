<?php
include('../includes/connect.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Order</title>
  <link rel="stylesheet" href="../styles.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  <?php
  $seller = $_SESSION['name'];
  $seller_id = $_SESSION['seller_id'];
  $user_ip = getIPAddress();
  $name_query = "Select * from `seller` where seller_id ='$seller_id' and user_ip ='$user_ip'";
  $result_name = mysqli_query($con, $name_query);
  $name_data = mysqli_fetch_assoc($result_name);

  if (isset($name_data['first_name'])) {
    $name = $name_data['first_name'];
    $seller_id = $name_data['seller_id'];
  }
  $get_user = "Select * from `seller` where user_ip = '$user_ip' and seller_id = '$seller_id'";
  $result = mysqli_query($con, $get_user);
  if ($row_data_fetch = mysqli_fetch_array($result)) {
    $oldemail = $row_data_fetch['email'];
  }

  //save password triggers
  if (isset($_POST['save_pass'])) {
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $conf_password = $_POST['conf_password'];

    //check password strength
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (password_verify($old_password, $row_data_fetch['password'])) {
      if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $password_not_strong = 'Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.';
      } else if ($password != $conf_password) {
        $password_not_match = 'Password do not match';
      } else {
        //update query password
        $update_query_password = "update `seller` set password='$hash_password' where seller_id='$seller_id' and user_ip ='$user_ip'";
        $sql_execute_pass = mysqli_query($con, $update_query_password);
        if ($sql_execute_pass) {
          $_SESSION['name'] = $name;
          $_SESSION['seller_id'] = $seller_id;
          echo "<script>Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Password Change',
          showConfirmButton: false,
          timer: 1500
        }).then(function(){window.location = 'index.php?edit_profile'})</script>";
        } else {
          die(mysqli_error($con));
        }
      }
    } else {
      $old_password_incorrect = 'Old Password Incorrect';
    }
  }
  //save image triggers   
  if (isset($_POST['save_image'])) {

    // accessing image
    $seller_img = $_FILES['seller_image']['name'];
    // accessing image temp
    $seller_img_tmp = $_FILES['seller_image']['tmp_name'];

    move_uploaded_file($seller_img_tmp, "../user_images/$seller_img");

    //update query image
    $update_query_img = "update `seller` set seller_img = '$seller_img' where seller_id = '$seller_id' and user_ip = '$user_ip' ";
    $sql_execute_img = mysqli_query($con, $update_query_img);

    if ($sql_execute_img) {
      $_SESSION['name'] = $name;
      $_SESSION['seller_id'] = $seller_id;
      echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Edit Profile Successful',
        showConfirmButton: false,
        timer: 1500
      }).then(function(){window.location = 'index.php?edit_profile'})</script>";
    } else {
      die(mysqli_error($con));
    }
  }
  //seller profile save trigger
  if (isset($_POST['save_info'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];
    $province = $_POST['province'];
    $contact_num = $_POST['contact_num'];
    $select_query_email = "Select * from `seller` where email='$email' and user_ip ='$user_ip'";
    $result = mysqli_query($con, $select_query_email);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
      $name_data = mysqli_fetch_assoc($result);
      if ($oldemail != $email) {
        if ($email == $name_data['email']) {
          $ne_error = 'Email aldready taken';
        } else {
          //update_query personal info
          $update_query = "update `seller` set first_name= '$fname' ,middle_name= '$mname',last_name= '$lname',house_no= '$house_no',street= '$street',barangay= '$barangay',municipality= '$municipality',province= '$province',contact_num='$contact_num',email='$email' where seller_id='$seller_id' and user_ip ='$user_ip'";
          $sql_execute = mysqli_query($con, $update_query);
          if ($sql_execute) {
            $_SESSION['name'] = $name;
            $_SESSION['seller_id'] = $seller_id;
            echo "<script>Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Edit Profile Successful',
          showConfirmButton: false,
          timer: 1500
        }).then(function(){window.location = 'index.php?edit_profile'})</script>";
          } else {
            die(mysqli_error($con));
          }
        }
      } else {

        //update_query personal info
        $update_query = "update `seller` set first_name= '$fname' ,middle_name= '$mname',last_name= '$lname',house_no= '$house_no',street= '$street',barangay= '$barangay',municipality= '$municipality',province= '$province',contact_num='$contact_num',email='$email' where seller_id='$seller_id' and user_ip ='$user_ip'";
        $sql_execute = mysqli_query($con, $update_query);


        if ($sql_execute) {
          $_SESSION['name'] = $name;
          $_SESSION['seller_id'] = $seller_id;
          echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Edit Profile Successful',
        showConfirmButton: false,
        timer: 1500
      }).then(function(){window.location = 'index.php?edit_profile'})</script>";
        } else {
          die(mysqli_error($con));
        }
      }
    } else {
      //update_query personal info
      $update_query = "update `seller` set first_name= '$fname' ,middle_name= '$mname',last_name= '$lname',house_no= '$house_no',street= '$street',barangay= '$barangay',municipality= '$municipality',province= '$province',contact_num='$contact_num',email='$email' where seller_id='$seller_id' and user_ip ='$user_ip'";
      $sql_execute = mysqli_query($con, $update_query);
      if ($sql_execute) {
        $_SESSION['name'] = $name;
        $_SESSION['seller_id'] = $seller_id;
        echo "<script>Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Edit Profile Successful',
      showConfirmButton: false,
      timer: 1500
    }).then(function(){window.location = 'index.php?edit_profile'})</script>";
      } else {
        die(mysqli_error($con));
      }
    }
  }


  ?>
  <div class="container text-">
    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
      <div class="ms-5 my-2">
        <h1>Edit Profile</h1>
      </div>
      <div class="row my-3">
        <!-- left column -->
        <div class="col-md-3">
          <div class="text-center">
            <img src="../user_images/<?php echo $row_data_fetch['seller_img']; ?>" class="profile-img m-1 rounded-circle" alt="avatar">
            <h6>Upload a different photo...</h6>
            <input type="file" class="form-control" name="seller_image" required>
            <input type="submit" class="btn btn-green my-3" value="Upload Image" name="save_image">
          </div>
        </div>
    </form>

    <!-- edit form column -->

    <div class="col-md-8 personal-info">
      <form class="form-group row" role="form" action="" method="post" enctype="multipart/form-data">
        <h3>Personal info</h3>
        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">First Name:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control " type="text" value=<?php echo $row_data_fetch['first_name']; ?> name="fname" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="middlename" class="col-lg-2 control-label fw-bold">Middle Name:</label>
          <div class="col-lg-8 mb-2">
            <input id="middlename" class="form-control" type="text" value=<?php echo $row_data_fetch['middle_name']; ?> name="mname" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">last Name:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="text" value=<?php echo $row_data_fetch['last_name']; ?> name="lname" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">House No/Building No:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="text" value=<?php echo $row_data_fetch['house_no']; ?> name="house_no" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">Street:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="text" value=<?php echo $row_data_fetch['street']; ?> name="street" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">Barangay:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="text" value=<?php echo $row_data_fetch['barangay']; ?> name="barangay" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">Municipality/City:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="text" value=<?php echo $row_data_fetch['municipality']; ?> name="municipality" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">Province:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="text" value=<?php echo $row_data_fetch['province']; ?> name="province" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-2 control-label fw-bold">Email:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="text" value=<?php echo $row_data_fetch['email']; ?> name="email" required>
            <?php if (isset($ne_error)) : ?>
              <span><?php echo $ne_error; ?></span>
            <?php endif ?>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 control-label fw-bold">Province:</label>
          <div class="col-lg-8 mb-2">
            <input class="form-control" type="number" value=<?php echo $row_data_fetch['contact_num']; ?> name="contact_num" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-3 control-label fw-bold"></label>
          <div class="col-md-8 mb-2">
            <input type="submit" class="btn btn-green" value="Save Changes" name="save_info">
            <span></span>
            <input type="reset" class="btn btn-light" value="Cancel">
          </div>
        </div>
      </form>

      <form class="form-group row" role="form" action="" method="post" enctype="multipart/form-data">
        <h3>Password</h3>
        <div class="form-group row">
          <label class="col-md-2 control-label fw-bold">Old Password:</label>
          <div class="col-md-8 mb-2">
            <input class="form-control" type="password" value="" name="old_password">
            <?php
            if (isset($old_password_incorrect)) :
            ?>
              <span><?php echo $old_password_incorrect; ?></span>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 control-label fw-bold">New Password:</label>
          <div class="col-md-8 mb-2">
            <input class="form-control" type="password" value="" name="password">
            <?php
            if (isset($password_not_strong)) :
            ?>
              <span><?php echo $password_not_strong; ?></span>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 control-label fw-bold">Confirm password:</label>
          <div class="col-md-8 mb-2">
            <input class="form-control" type="password" value="" name="conf_password">
            <?php
            if (isset($password_not_match)) : ?>
              <span><?php echo $password_not_match; ?></span>
            <?php endif ?>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-3 control-label fw-bold"></label>
          <div class="col-md-8 mb-2">
            <input type="submit" class="btn btn-green" value="Save Changes" name="save_pass">
            <span></span>
            <input type="reset" class="btn btn-light" value="Cancel">
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>

</html>