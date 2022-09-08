<?php 
// session_start    ();
// session_destroy();
// if (empty($_SESSION['user_id'])) {
//     header('location: login.php');
// }


include_once 'header.php';
include_once 'connection.php';
echo $_SESSION['user_id'];
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
    <div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>Dashborad</h3>
            </center>
      </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-primary table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($Query)) {
                       

                    ?>
                        <tr>
                            <td><?php echo $row['user_id']?></td>
                            <td><?php echo $row['username']?></td>
                            <td><?php echo $row['useremail']?></td>
                            <td><a href="edit.php?edit_id=<?php echo $row['user_id']?>"><button class="btn btn-primary">Edit</button></a>
                            <a href="delete.php?del_id=<?php echo $row['user_id']?>"><button class="btn btn-danger">Delete</button></a>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <!-- <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="container">
<div class="row">
        <div class="col-md-6 offset-3">
            <center>
              <button class="btn-primary mb-2">
            <a class="dropdown-item" href="logout.php">Logout Here</a>
            </button>
            </center>
      </div>

</div>
</div>
</body>
</html>
<?php
include_once 'footer.php';
?>