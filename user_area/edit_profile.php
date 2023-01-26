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
</head>


<body>
<?php
    $user = $_SESSION['name'];
    $customer_id = $_SESSION['customer_id'];
    $user_ip = getIPAddress();

    $name_query = "Select * from `customer` where customer_id ='$customer_id' and user_ip ='$user_ip'";
    $result_name = mysqli_query($con,$name_query);
    $name_data = mysqli_fetch_assoc($result_name);
    //$name = $name_data['name'];
    if (isset($name_data['first_name'])) {
      $name = $name_data['first_name'];
      $customer_id = $name_data['customer_id'];
    } 

    $get_user = "Select * from `customer` where user_ip = '$user_ip' and customer_id = '$customer_id'";
    $result = mysqli_query($con,$get_user);
    $row_data_fetch = mysqli_fetch_array($result);


//save password triggers
  if (isset($_POST['save_password'])) {
    $password = $_POST['password'];
    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $conf_password = $_POST['conf_password'];

    //check password strength
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){
    $password_not_strong = 'Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.';
    }
    else if($password != $conf_password){
    $password_not_match = 'Password do not match';
    } 
    else {
    //update query password
    $update_query_password = "update `customer` set password='$hash_password' where customer_id='$customer_id' and user_ip ='$user_ip' ";
    $sql_execute_pass = mysqli_query($con, $update_query_password);
    if ($sql_execute_pass) {
      $_SESSION['name'] = $name;
      $_SESSION['customer_id'] = $customer_id;
      echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Password Change',
        showConfirmButton: false,
        timer: 1500
      }).then(function(){window.location = 'user_profile.php'})</script>";
    } 
    else {
      die(mysqli_error($con));
    }
  }
}

 //save image triggers   
if (isset($_POST['save_image'])) {
  // accessing image
  $customer_img= $_FILES['customer_img']['name'];

  // accessing image temp
  $customer_img_tmp= $_FILES['customer_img']['tmp_name'];

  move_uploaded_file($customer_img_tmp, "../user_images/$customer_img");
  //update query image
  $update_query_img = "update `customer` set customer_img = '$customer_img' where customer_id = '$customer_id' and user_ip = '$user_ip' " ;
  $sql_execute_img = mysqli_query($con, $update_query_img);

    

    if ($sql_execute_img) {
      $_SESSION['name'] = $name;
      $_SESSION['customer_id'] = $customer_id;
      echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Edit Profile Successful',
        showConfirmButton: false,
        timer: 1500
      }).then(function(){window.location = 'user_profile.php'})</script>";
    } 
    else {
      die(mysqli_error($con));
    }
    
}



    if(isset($_POST['save_info'])){
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

      //select query
    $select_query_email = "Select * from `customer` where  email='$email'";
    $result = mysqli_query($con, $select_query_email);
    $rows_count = mysqli_num_rows($result);
    $name_data = mysqli_fetch_assoc($result);
    
    if($rows_count != 0){
      $ne_error='Email aldready taken';
    }
    else{
    
    //update_query personal info
    $update_query = "update `customer` set first_name= '$fname' ,middle_name= '$mname',last_name= '$lname',house_no= '$house_no',street= '$street',barangay= '$barangay',municipality= '$municipality',province= '$province',contact_num='$contact_num',email='$email' where customer_id='$customer_id' and user_ip ='$user'";
    $sql_execute = mysqli_query($con, $update_query);
    if ($sql_execute) {
      $_SESSION['name'] = $name;
      $_SESSION['customer_id'] = $customer_id;
      echo "<script>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Edit Profile Successful',
        showConfirmButton: false,
        timer: 1500
      })</script>";
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



<div class="container text-light">
<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
    <div class="ms-5 my-3">
        <h1>Edit Profile</h1>
    </div>
	<div class="row my-3">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="../user_images/<?php echo $row_data_fetch['customer_img'];?>" class="profile-img m-1 rounded-circle" alt="../product_images/among-us-twerk.gif">
          <h6>Upload a different photo...</h6>
          <input type="file" class="form-control" name="customer_img" required>
          <input type="submit" class="btn btn-green my-3" value="Save Changes" name="save_image">
        </div>
      </div>

      </form>
      <!-- edit form column -->

      
      <div class="col-md-9 personal-info">
      <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
        <h3>Personal info</h3>
        
          <div class="form-group">
            <label class="col-lg-3 control-label">First Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fname" value= <?php echo $row_data_fetch['first_name'];?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Middle Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="mname" value=<?php echo $row_data_fetch['middle_name'];?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="lname" value=<?php echo $row_data_fetch['last_name'];?>>
            </div>
          </div>
          <div class="form-group">
              <label class="col-lg-3 control-label">House No/Building No:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name = "house_no" value=<?php echo $row_data_fetch['house_no'];?>>
              </div>
          </div>
          <div class="form-group">
              <label class="col-lg-3 control-label">Street:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name = "street" value=<?php echo $row_data_fetch['street'];?>>
              </div>
          </div>
          <div class="form-group">
              <label class="col-lg-3 control-label">Barangay:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name = "barangay" value=<?php echo $row_data_fetch['barangay'];?>>
              </div>
          </div>
          <div class="form-group">
              <label class="col-lg-3 control-label">Municipality/City:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name = "municipality" value=<?php echo $row_data_fetch['municipality'];?>>
              </div>
          </div>
          <div class="form-group">
              <label class="col-lg-3 control-label">Province:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name = "province" value=<?php echo $row_data_fetch['province'];?>>
              </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name = "email" value=<?php echo $row_data_fetch['email'];?>>
              <?php if(isset($ne_error)):?>
                      <span><?php echo $ne_error;?></span>
                      <?php endif?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Contact No:</label>
            <div class="col-lg-8">
              <input class="form-control" type="number" name = "contact_num" value=<?php echo $row_data_fetch['contact_num'];?>>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8 mb-5">
              <input type="submit" class="btn btn-green" value="Save Changes" name="save_info">
              <span></span>
              <input type="reset" class="btn btn-light" value="Cancel">
              </div>
            </div>        
        </form>  


          <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
          <h3>Password</h3>
          
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
          
            <div class="col-md-8">
              <input class="form-control" type="password"  name="password" required>
              <?php
                      if(isset($password_not_strong)):
                      ?>
                      <span><?php echo $password_not_strong;?></span>
                      <?php endif?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="conf_password" required> 
              <?php
                  if(isset($password_not_match)):?>
                  <span><?php echo $password_not_match;?></span>
              <?php endif?>
          
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-green" value="Save Changes" name="save_password">
              <span></span>
              <input type="reset" class="btn btn-light" value="Cancel">
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>

</body>
</html>