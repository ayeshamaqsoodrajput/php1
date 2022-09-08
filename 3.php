<?php
session_start();
if(!isset($_SESSION['$useremail'])){
  header("LOCATION: 1.php");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>welcome</h3>
                <button class="bg-primary "><a class="text-white" href="4.php" name="logout">Logout</a></button>
</center>
    
              
        </div>
    </div>
