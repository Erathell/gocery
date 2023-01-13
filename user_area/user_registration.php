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
    <link rel="stylesheet" href="styles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body class="text-center" data-new-gr-c-s-check-loaded="14.1093.0" data-gr-ext-installed>
    <div class="container-fluid my-3" >
        <h2 class="text-center"> User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Enter Username" autocomplete="off" required name="floatingInput"/>
                        <label for="floatingInput" class="form-label">User Name</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Enter Email" autocomplete="off" required name="floatingInput"/>
                        <label for="floatingInput" class="form-label">Email</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Enter Email" autocomplete="off" required name="floatingPassword"/>
                        <label for="floatingPassword" class="form-label">Enter Your Password</label>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <!-- JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
    
</html>