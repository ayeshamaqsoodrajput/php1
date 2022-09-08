<?php
session_start();
include_once 'connection.php';
if (isset($_POST['formsubmit'])) {
    $id =  $_POST['id'];
    $name =  $_POST['username'];
    $email =   $_POST['useremail'];
    $pass =  $_POST['userpassword'];
    // $pass = password_hash($password, PASSWORD_DEFAULT);
    $SelectST = "SELECT * FROM signup WHERE useremail ='$email'";
    $QueryST = mysqli_query($conn, $SelectST);
    if (mysqli_num_rows($QueryST) == 1) {
        echo '<script>alert("Data already Exsist")</script>';
    } 
    else {
        $INSERT = "INSERT INTO signup (user_id,username,useremail,userpassword) VALUES ('$id','$name','$email','$pass')";
        $query = mysqli_query($conn, $INSERT);
        if ($query) {
            header('location:login.php');
        } else {
            echo mysqli_error($conn);
        }
    }
}
if (isset($_REQUEST['formupdate'])) {
    $name =  $_POST['username'];
    $email =   $_POST['useremail'];
    $status = $_POST['status'];
    $user_id = $_REQUEST['user_id'];
   
    $update = "UPDATE `signup` SET `status`='$status'  WHERE user_id= '$user_id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        header('location: index.php');
    } else {
        echo "Not Update";
    }
}
// session_start();
if (isset($_POST['loginform'])) {
     $email = $_POST['useremail'];
     $pass = $_POST['userpassword']; 
    // $pass=password_verify($password, PASSWORD_DEFAULT);
    $select = "SELECT * FROM `signup` WHERE useremail = '$email' AND userpassword = '$pass'";
    $query = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($query);
    //   $row['user_id'];
   
   if($row['status']=="admin"){
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['useremail'] = $row['useremail'];
    header('location: dashboard.php');
    }
   }else if($row['status']=="user"){
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['useremail'] = $row['useremail'];
        header('location:about.php');
    }
   }
   else if($row['status']==""){
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['useremail'] = $row['useremail'];
        header('location:about.php');
    }
   }
   else {
        $_SESSION['message'] = "Email And Password Are Not Match<a href='index.php'>Please Reg Your Account</a>";
        header('location:login.php');
    }
}

// if(isset($_POST['updateprofile'])){
//     $id = $_POST['user_id'];
//     $phone_number = $_POST['phone-number'];
//     $city = $_POST['city-name'];
//     $country = $_POST['country-name'];
//     $gender = $_POST['gender'];
//     $address = $_POST['address'];
//     $username = $_POST['username'];
//     $user_id=  $_SESSION['user_id'];
//     $img = $_FILES['img']['name'];
//     $tmname = $_FILES['img']['tmp_name'];
//     $folder = "upload/" . $img;
//     move_uploaded_file($tmname, $folder);
//     echo $tmname;
//     $catch = "SELECT * FROM userdata WHERE  user_id = '$user_id'";
//     $query = mysqli_query($conn , $catch);
//     if(mysqli_num_rows($query)>0){
//        $UPDATE =  "UPDATE `userdata` SET `phone_num`=$phone_number, `city`='{$city}',
//        `country_name`='{$country}',`gender`='{$gender}',`main_address`='{$address}',`img`='{$img}'  WHERE user_id = $user_id";
//        $query =mysqli_query($conn, $UPDATE);
//       if($query){
//         echo "updated";
//       } else{
//         echo mysqli_error($conn);
//       }
//     }else{
//          $INSERT  = "INSERT INTO userdata (user_id,phone_num,city,country_name,gender,main_address,img) VALUES ('$id','$phone_number','$city','$country','$gender','$address','$img')";
//     $query = mysqli_query($conn , $INSERT);
//     if($query){
//         echo "profile updated";
//     }else
//     echo mysqli_error($conn);
//     }    

    
 
    
// }