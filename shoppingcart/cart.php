<?php
    session_start();
    include_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shoping Cart</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.js"></script>

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

           <div class="row">
            <h1 class="text-center border-bottom pb-4 mb-4">View Cart Products</h1>
            <?php
                if(isset($_GET['value']) == "updated"){
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Successfully!</strong> Your product updated.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }else if(isset($_GET['value']) == "deleted"){
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Successfully!</strong> Your product deleted.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <table class="table bg-success text-white">
                <thead>
                    <tr>
                       <td>Sno</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total Price</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                </thead>
 <tbody>               
<?php
// echo $_SESSION['mycart'];
$sno = 1;
$t=0;
$total=0;
foreach ($_SESSION['mycart'] as $value) {
    echo "<tr>";
    echo "<td>".$sno++."</td>";
    foreach ($value as $id => $content) {
        if ($id == 'qty') {
            $product_qty =  $content;
        }
        if ($id == 'id') {
            $product_id = $content;
        }

        // $product_id * @$product_qty;


        // echo $qty;

    }
    $select = "SELECT * FROM cart WHERE id ='$product_id'";
    $query = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_array($query)) {
        echo "<form action='action.php' method='POST'>";
        echo "<td><img src=upload/" . $row['p_img'] . " width='100px'></td>";
        echo "<input type='hidden' name='id' value='$row[id]'>";
        echo "<td>$row[p_name]</td>";
        echo "<td>$row[p_price]</td>";
        $p = $row['p_price'];
        // echo "<td>$product_qty</td>";
        echo "<td><input type='text' name='qtys' value='$product_qty'></td>";
        $t = $p*$product_qty;
        echo "<td>$t</td>";
        echo "<td><input type='submit' name='event' value='Update' class='btn btn-warning'></td>";
         echo "<td><input type='submit' name='event' value='Delete' class='btn btn-danger'></td>";
        echo "</tr>";
    }
    
}

?>

</tbody>
</table>
</div>
<a href="checkout.php" class="btn btn-primary ">checkout</a>
</body>
</html>


