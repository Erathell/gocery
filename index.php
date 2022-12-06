<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gocery</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg" style="background-color: #563D7C;">
        <div class="container-fluid">
            <img src="images/logo.png" alt="logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style="color: white;" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#">Register</a>

                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: white;"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#"><i class="fa-solid fa-hand-holding-dollar"></i>Total Price</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg" style="background-color: #322348;">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#">Login</a>
                </li>
            </ul>
        </nav>
    </div>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Available Products</h3>
            <p class="text-center">Grocery items at the click of your mouse</p>
        </div>
    
    
    <!-- fourth child -->
    <div class="row">
        <div class="col-md-10 ">
            <!-- products -->
            <div class="row">
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="images/bear-brand-milk-320.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                    </div>
                </div>
                <div class="col-md-4  mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="images/jack-daniels.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                <img src="images/tender-juicy.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
                </div>
                </div>
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                <img src="images/tender-juicy.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
                </div>
                </div>
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                <img src="images/tender-juicy.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
                </div>
                </div>
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                <img src="images/tender-juicy.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
                </div>
                </div>
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                <img src="images/pancit-canton.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
                </div>
                </div>
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                <img src="images/magnum.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
                </div>
                </div>
                <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                <img src="images/pineapple-juice.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>
        
    <!-- last child -->
    <div style="background-color: #563D7C; color: white;" class="p-3 text-center">
    <p>Dela Cruz, Vinzon, Somoza, Senina - 2022 &copy</p>
    </div>


    <!-- JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>