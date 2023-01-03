<?php
    include('../includes/connect.php')
?>

<form action="" method="post" class="my-5">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text secondary" id="basic-addon1"> <i class="fa-regular fa-clipboard"></i></span>
        <input type="text" class="form-control" placeholder="Insert Category" name ="category_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 text-center">
        
        <button type="submit" class="btn btn-green text-center" placeholder="Insert Category" name ="insert_category" value="Insert Category"aria-describedby="basic-addon1">Insert Category</button>
    </div>

</form>