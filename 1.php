<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>Login</h3>
            </center>
            <?php
              session_start();
            if(isset($_POST['formsubmit'])){
  include 'connection.php';
  $useremail = $_POST['useremail'];
  $sql = "select * from signup where useremail = '{$useremail}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  if(mysqli_num_rows($result)>0){
    //   while($row = mysqli_fetch_assoc($result)){
      
        
        $_SESSION['$username'] = $row['username'];
        $_SESSION['$useremail'] = $row['useremail'];
        $_SESSION['$userid'] = $row['user_id'];
        $_SESSION['$status'] = $row['status'];
          header("LOCATION: 2.php");
          
    //   }
  }else{
    echo "input correct email!";
}
            }
  ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <label for="" class="w-100">
                    Enter Useremail
                    <input type="email" class="form-control" name="useremail" placeholder="Enter Useremail" required>
                </label>
                <input type="submit" name="formsubmit" value="Login" class="btn btn-primary mt-2 mb-5">
            </form> 
        </div>
    </div>








