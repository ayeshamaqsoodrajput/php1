<?php
session_start();
include_once 'connection.php';
$Select = "SELECT * FROM cart";
$Query = mysqli_query($conn, $Select);
include_once 'connection.php';
if (isset($_POST['formsubmit'])) {
    $name =  $_POST['product_name'];
    $price =   $_POST['product_price'];
    $img = $_FILES['img']['name'];
    $tmname = $_FILES['img']['tmp_name'];
    $folder = "upload/" . $img;
    move_uploaded_file($tmname, $folder);
    $SelectST = "SELECT * FROM cart ";
    $QueryST = mysqli_query($conn, $SelectST);
    if ($QueryST) {
            $INSERT = "INSERT INTO cart (p_name,p_price,p_img) VALUES ('$name','$price','$img')";
            $query = mysqli_query($conn, $INSERT);
            if ($query) {
                header('location:new_product.php');
            } 
        }
        else{
            echo mysqli_error($conn);
        }
    } 
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center class="mb-5 mt-2">
                <h3>Enter You're New Product</h3>
            </center>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" class="form-control  bg-dark text-white  ">
           
                <label for="" class="w-100">
                    Enter Your Product Name
                    <input type="text" class="form-control  bg-dark text-white" name="product_name" placeholder="Enter Product Name" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Product Price
                    <input type="number" class="form-control bg-dark text-white" name="product_price" placeholder="Enter Product Price" required>
                </label>
                <label for="file" class="w-100 " id="upload-label">
                    Upload Product Image
                    <input type="file" class="form-control file bg-dark text-white" name="img" id="file"   >
                    <!-- <input type="submit" name="delimg" class="btn btn-primary" value="delete"> -->
                </label>
                <input type="submit" name="formsubmit" class="btn btn-success mt-2">
            </form>
        </div>


        <div class="row">
        <div class="col-md-12">
            <table class="table table-primary table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <!-- <th scope="col">Product Image</th> -->
                        <!-- <th scope="col">Edit</th> -->
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($Query)) {
                       

                    ?>
                        <tr>
                            <td><?php echo $row['p_name']?></td>
                            <td><?php echo $row['p_price']?></td>
                         <td>   <a href="delete.php?del_id=<?php echo $row['id']?>"><button class="btn btn-danger">Delete</button></a>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div> 
</body>
</html>