<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_category'])){
        $category_title=$_POST['category_title'];
        // select data from database
        $select_query="Select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($con, $select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('Category already exists')</script>";
        }else{

            $insert_query="insert into `categories` (category_title) values ('$category_title')";
            $result=mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('Category has been added successfully')</script>";
            }
        }
    }
?>

<form action="" method="post" class="my-5">
    <div class="input-group w-90 h-90 mb-2">
        <span class="input-group-text secondary" id="basic-addon1"> <i class="fa-regular fa-clipboard"></i></span>
        <input type="text" class="form-control" placeholder="Insert Category" name ="category_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 text-center">  
        <button type="submit" class="btn btn-green text-center" placeholder="Insert Category" name ="insert_category" value="Insert Category"aria-describedby="basic-addon1">Insert Category</button>
    </div>

</form>