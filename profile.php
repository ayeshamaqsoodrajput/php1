<?php 
// session_start();
include_once 'header.php';
include_once 'connection.php';
$idofuser=  $_SESSION['user_id'];
// $Select = "SELECT * FROM signup WHERE  user_id = '$user_id'";
$Select = "SELECT * FROM signup INNER JOIN  userdata ON  signup.user_id=userdata.user_id  INNER JOIN city ON userdata.city=city.city_id WHERE signup.user_id = '{$idofuser}' ";
$query = mysqli_query($conn, $Select);
$row = mysqli_fetch_array($query);
// $pick = "SELECT * FROM userdata WHERE  user_id = '$user_id'";
// $query = mysqli_query($conn , $pick);
// $urow = mysqli_fetch_array($query);

if(isset($_POST['updateprofile'])){
    $id = $_POST['user_id'];
    $phone_number = $_POST['phone-number'];
    $city = $_POST['city-name'];
    $country = $_POST['country-name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $user_id=  $_SESSION['user_id'];
    $img = $_FILES['img']['name'];
    $tmname = $_FILES['img']['tmp_name'];
    $folder = "upload/" . $img;
    move_uploaded_file($tmname, $folder);
    // echo $tmname;
    $catch = "SELECT * FROM userdata WHERE  user_id = '$user_id'";
    $Query = mysqli_query($conn , $catch);
    if(mysqli_num_rows($Query)>0){
        // unlink("upload/".$row['img']);
       $UPDATE =  "UPDATE `userdata` SET `phone_num`='{$phone_number}', `city`='{$city}',
       `country_name`='{$country}',`gender`='{$gender}',`main_address`='{$address}',`img`='{$img}'  WHERE user_id = $user_id";
       $Query =mysqli_query($conn, $UPDATE);
       
      if($Query){
        
        echo "updated";
      } else{
        echo mysqli_error($conn);
      }
    }else{
         $INSERT  = "INSERT INTO userdata (user_id,phone_num,city,country_name,gender,main_address,img) VALUES ('$id','$phone_number','$city','$country','$gender','$address','$img')";
    $Query = mysqli_query($conn , $INSERT);
    if($Query){
        echo "profile updated";
    }else
    echo mysqli_error($conn);
    }    

      
}


if(isset($_POST['delimg'])){
    error_reporting(0);
    unlink("upload/".$row['img']) ;
    $update_img =  "UPDATE `userdata` SET `img`=' '  WHERE user_id = $user_id";
    $Query_img =mysqli_query($conn, $update_img);
    }
 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>Update Your Profile</h3>
                <?php  error_reporting(0); echo"<img src='upload/$row[img]'  alt='Please upload your image' style='width:150px;height:100px;border:5px solid; border-radius: 50px;'>";
          ?>
            </center>
      </div>
     
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            
            <div class="row">
            <div class="div col-md-8 offset-2">
                <label for="file" class="w-100" id="upload-label">
                    Upload Your Image
                    <input type="file" class="form-control file" name="img" id="file"   >
                    <input type="submit" name="delimg" class="btn btn-primary" value="delete">
                </label>
                </div>
            <div class="div col-md-4 offset-2">
                <label for="" class="w-100">
                    Enter Your id
                    <input type="text" class="form-control" name="user_id" value ="<?php  echo $_SESSION['user_id']; ?>" readonly>
                </label>
                </div>
                <div class="div col-md-4">
                <label for="" class="w-100">
                    Enter Your Email
                    <input type="email" class="form-control" name="useremail" value ="<?php  echo $_SESSION['useremail']; ?>" readonly >
                </label></div>
                <div class="div col-md-4 offset-2">
                <label for="" class="w-100">
                    Enter Your Name
                    <input type="text" class="form-control" name="username" value ="<?php  echo $_SESSION['username']; ?>">
                </label>
                </div>
                
                <div class="div col-md-4  mt-2">
                <label for="" class="w-100">
                    Enter Your Phone Number
                    <input type="num" class="form-control" name="phone-number" value ="<?php  if(mysqli_num_rows($query)>0){
                        echo $row['phone_num'];
                    }else{
                        echo "";
                    } ?>"  placeholder="Enter Your Phone number">
                </label>
                </div>
                <div class="div col-md-4 mt-2  offset-2">
                <label for="" class="w-100">
                    Enter Your City </br>
                  <select name="city-name" class="form-control">
                    <option value="1" <?php 
                     if(empty($row['city'])){
                        echo "";
                       }else{
                        if($row['city']=="1"){
                            echo "selected";
                        }else{
                            echo "";
                        }
                       }
                     ?> >Faislabad</option>
                    <option value="2"
                    <?php
                   if(empty($row['city'])){
                    echo "";
                   }else{
                    if($row['city']=="2"){
                        echo "selected";
                    }else{
                        echo "";
                    }
                   }?>
                    >Lahore</option>
        
                  </select>
                    
                </label></div>
                <div class="div col-md-4 mt-2  ">
                <label for="" class="w-100">
                    Enter Your Country </br>
                  <select name="country-name" class="form-control"  >
                    <option value="PAK"
                    <?php
                      if(empty($row['country_name'])){
                        echo "";
                       }else{
                        if($row['country_name']=="PAK"){
                            echo "selected";
                        }else{
                            echo "";
                        }
                       }
                   ?>
                    >Pakistan</option>
                    <option value="IND"
                    <?php
                    if(empty($row['country_name'])){
                        echo "";
                       }else{
                        if($row['country_name']=="IND"){
                            echo "selected";
                        }else{
                            echo "";
                        }
                       }
                   ?>
                    >india</option>
                    <option value="SL"
                    <?php
                  if(empty($row['country_name'])){
                    echo "";
                   }else{
                    if($row['country_name']=="SL"){
                        echo "selected";
                    }else{
                        echo "";
                    }
                   }?>
                    >Sri lanka</option>
                  </select>
                    
                </label></div>
                <div class="div col-md-6 mt-2 offset-2">
                <label for="" class="w-100">
                    Enter Your Gender </br>
                   Male <input type="radio"  class="mt-3" name="gender" value="Male" <?php 
                   if(empty($row['gender'])){
                    echo "";
                   }else{
                    if($row['gender']=="Male"){
                        echo "checked";
                    }else{
                        echo "";
                    }
                   }
                   ?>>
                    Female <input type="radio"  name="gender" value="female"
                    <?php 
                   if(empty($row['gender'])){
                    echo "";
                   }else{
                    if($row['gender']=="female"){
                        echo "checked";
                    }else{
                        echo "";
                    }
                   }
                   ?>>
                    
                </label></div>
                <div class="div col-md-8 offset-2 mt-2">
                <label for="" class="w-100">
                    Enter Your Address
                   <textarea name="address" class="form-control"   cols="20" rows="5"  ><?php  if(mysqli_num_rows($query)>0){
                        echo $row['main_address'];
                    }else{
                        echo "";
                    } ?> </textarea>
                </label>
                </div>
                <div class="btn">
                <input type="submit" name="updateprofile" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
    <?php
   
    include_once 'footer.php';
    ?>