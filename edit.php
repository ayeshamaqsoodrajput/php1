<?php include_once 'header.php';
include_once 'connection.php';
echo $edit_id = $_GET['edit_id'].'<br>';
$select = "SELECT * FROM signup WHERE user_id = '$edit_id'";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query);
echo $row['username'].'<br>';
echo $row['useremail'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3 mb-3">
            <center>
                <h3>Form Edit</h3>
            </center>
            <form action="Function.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $edit_id?>">
                <label for="" class="w-100">
                    Enter Your Name
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" placeholder="Enter Your Name" readonly>
                </label>
                <label for="" class="w-100">
                    Enter Your Email
                    <input type="email" class="form-control" name="useremail" value="<?php echo $row['useremail'] ?>" placeholder="Enter Your Name" readonly>
                </label>
                <label for="" class="w-100">
                     Status:
                    Admin <input type="radio"  name="status" value="admin" >
                    User <input type="radio" name="status" value="user">
                </label>
                <input type="submit" name="formupdate" class="btn btn-primary mt-2">
            </form>
        </div>
    </div>

</div>




<?php include_once 'footer.php'; ?>