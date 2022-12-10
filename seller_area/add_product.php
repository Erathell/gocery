<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products-Seller Dashboard</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #563D7C;">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="logo">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #563D7C;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-white fw-bold"><i class="fa-solid fa-user fa-xl"></i> Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

    <div class="container mt-3">
        <h1 class="text-center">Add Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" autocomplete="off" required>
            </div>
            <!-- decription -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="decription" class="form-label">Product Decription</label>
                <input type="text" name="decription" id="decription" class="form-control" placeholder="Enter Product Decription" autocomplete="off" required>
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product Keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto"><select name="product_category" id="#" class="form-select">Product Keywords
                    <option value="">Select Category</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                    <option value="">Category1</option>
                </select>
            </div>
            <!-- image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product-image" class="form-label">Product Image</label>
                <input type="file" name="product-image" id="product_image" class="form-control" required>
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 d-flex justify-content-center ">
                <button type="submit" name="insert_product" class="insert_product btn btn-green" value="Insert Product">Insert Product</button>
            </div>

        </form>
    </div> 
    <!-- Bootstrap JS Link -->
    <div style="background-color: #563D7C; color: white;" class="p-3 text-center">
    <p>Dela Cruz, Vinzon, Somoza, Senina - 2022 &copy</p>
    </div>
</body>
</html>