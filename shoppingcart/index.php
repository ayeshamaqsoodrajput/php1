<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="container">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Online Shoping Cart</span>
                </a>

                <nav class="d-inline-flex mt-md-0 ms-md-auto">
                    <a class="me-3 py-2 text-light text-decoration-none btn btn-dark btn-md" href="index.php">Home</a>
                    <a class="me-3 py-2 text-light text-decoration-none btn btn-dark btn-md" href="cart.php">View Cart</a>
                </nav>
            </div>
        </header>
    <div class="container-fluid">
    <div class="row">
            <h1 class="text-center border-bottom pb-4 mb-4">Latest Products</h1>
            <?php
                if(isset($_GET['true']) == "created"){
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successfully!</strong> Your product added to Cart.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <?php
            include_once 'connection.php';
            $select = "SELECT * FROM cart";
            $query = mysqli_query($conn, $select);
            while ($row = mysqli_fetch_array($query)) {

            ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="upload/<?php echo $row['p_img'] ?>" width="100%" alt="">
                        </div>
                        <div class="card-footer">
                            <h4>Product: <?php echo $row['p_name'] ?></h4>
                            <h6><?php echo $row['p_price'] ?> <del>400</del></h6>
                            <form action="action.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>">
                                <!-- <input type="text" name="qty" placeholder="Quantity" required class="form-control"> -->
                                <button class="btn btn-success" type="submit" name="addtocart">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>