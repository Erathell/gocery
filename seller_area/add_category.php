<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_category'])){
        $category_title=$_POST['category_title'];
        // select data from database
        $select_query="Select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($con, $select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Category already exists!',
                confirmButtonColor: '#42C84F'
                
            })</script>";
        }else{

            $insert_query="insert into `categories` (category_title) values ('$category_title')";
            $result=mysqli_query($con, $insert_query);
            if($result){
                echo "<script>Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Category added succesfully',
                            showConfirmButton: false,
                            timer: 1500
                    })</script>";
            }
        }
    }
?>
<h1 class="text-center">Add Categories</h1>
<form class="d-flex flex-column align-items-center"action="" method="post" class="my-5">
    <div class="input-group w-50 mb-2">
        <span class="input-group-text secondary" id="basic-addon1"> <i class="fa-regular fa-clipboard"></i></span>
        <input type="text" class="form-control" placeholder="Insert Category" name ="category_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-50 mb-2 text-center">  
        <button type="submit" class="btn btn-green text-center" placeholder="Insert Category" name ="insert_category" value="Insert Category"aria-describedby="basic-addon1">Insert Category</button>
    </div>
</form>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <table class="table-bordered text-center col-md-2 rounded">
                    <thead class="bg-purple-light text-light">
                        <tr>
                            <th>Categories</th>
                            <th class="w-25">Remove</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>