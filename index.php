<?php 
session_start();
// session_destroy();
// if (empty($_SESSION['user_id'])) {
//     header('location: login.php');
// }
// echo $_SESSION['user_id'];
include_once 'connection.php';
$Select = "SELECT * FROM signup";
$Query = mysqli_query($conn, $Select);
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
            <center>
                <h3>signup</h3>
            </center>
            <form action="Function.php" method="POST">
            <label for="" class="w-100">
                    Enter Your id
                    <input type="text" class="form-control" name="id" placeholder="Enter Your id" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Name
                    <input type="text" class="form-control" name="username" placeholder="Enter Your Name" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Email
                    <input type="email" class="form-control" name="useremail" placeholder="Enter Your Name" required>
                </label>
                <label for="" class="w-100">
                    Enter Your password
                    <input type="password" class="form-control" name="userpassword" placeholder="Enter Your password" required>
                </label>
                <input type="submit" name="formsubmit" class="btn btn-primary mt-2">
            </form>
        </div>
    </div>
    <div class="container mt-2">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <div class="alert alert-primary">
                    <?php
                    echo "if already have an account :<a href='login.php'>Login here</a>  "
                    ?>
                </div>
            </center>
                </div>
                </div>  
                </div>
</body>
                </html>

