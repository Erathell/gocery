<?php
    include('../includes/connect.php')
?>


<div class="container text-">
    <div class="ms-5 my-2">
        <h1>Edit Profile</h1>
    </div>
	<div class="row my-3">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="../product_images/among-us-twerk.gif" class="profile-img m-1 rounded-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        
        <h3>Personal info</h3>
        
        <form class="form-group" role="form">
          <div class="form-group row">
            <label class="col-lg-2 control-label fw-bold">Full Name:</label>
            <div class="col-lg-8 mb-2">
              <input class="form-control" type="text" value="Jane">
            </div>
          </div>


            <div class="form-group row">
                <label class="col-lg-2 control-label fw-bold">Address:</label>
                <div class="col-lg-8 mb-2">
                <input class="form-control" type="text" value="United States of Sus">
            </div>
            </div>

          <div class="form-group row">
            <label class="col-md-2 control-label fw-bold">Email:</label>
            <div class="col-lg-8 mb-2">
              <input class="form-control" type="text" value="janesemail@gmail.com">
            </div>
          </div>

          
          
          <div class="form-group row">
            <label class="col-md-2 control-label fw-bold">Password:</label>
            <div class="col-md-8 mb-2">
              <input class="form-control" type="password" value="11111122333">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 control-label fw-bold">Confirm password:</label>
            <div class="col-md-8 mb-2">
              <input class="form-control" type="password" value="11111122333">
            </div>
          </div>


          <div class="form-group row">
            <label class="col-md-3 control-label fw-bold"></label>
            <div class="col-md-8 mb-2">
              <input type="button" class="btn btn-green" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-light" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
