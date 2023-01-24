<?php
    include('../includes/connect.php');

    if(isset($_POST['submit'])){
        $seller_img=$_FILES['file']['name'];
        $seller_img_temp=$_FILES['file']['temp_name'];
        move_uploaded_file($seller_img_temp, "../images/$seller_img");

        $insert_query="update `seller` set `seller_img`='$seller_img'";
        $run=mysqli_query($con, $insert_query);
        echo "<script>alert('Upload success')</script>";
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>