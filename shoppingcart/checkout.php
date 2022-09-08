<?php
    session_start();
    include_once 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .heading{
          font-size:25px !important;
        }
    </style>
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
<div class="row mt-3">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
          </h4>
          <ul class="list-group mb-3">
            <?php
              $sno = 1;
              $t=0;
              $total=0;
              foreach ($_SESSION['mycart'] as $value) {
                //   echo "<li>".$sno++."</td>";
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
                   echo" <li class='list-group-item d-flex justify-content-between lh-condensed'>";
                     echo "<div>";
                      echo "<h6 class='heading'>$row[p_name]</h6>";
                      echo" <small class='text-muted'>Quantity: $product_qty </small>";
                      echo" <small class='text-muted'>X Price: $row[p_price] </small>";
                      $p = $row['p_price'];
                      $t = $p*$product_qty;
                      echo "</div>";
                      echo "<span class='text-muted'>RS:$t</span>";
                      echo"</li>";
                     
                       $total += $t;
                     
                  }
                  
              }
                
            ?>
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$<?php echo number_format($total,2);?></strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" value="<?php echo (isset($fnameValue) && !empty($fnameValue)) ? $fnameValue:'' ?>" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" value="<?php echo (isset($lnameValue) && !empty($lnameValue)) ? $lnameValue:'' ?>" >
              </div>
            </div>
 
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue:'' ?>">
            </div>
 
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue:'' ?>">
            </div>
 
            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="<?php echo (isset($address2Value) && !empty($address2Value)) ? $address2Value:'' ?>">
            </div>
 
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="country" id="country" >
                  <option value="">Choose...</option>
                  <option value="United States" >United States</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="state" id="state" >
                  <option value="">Choose...</option>
                  <option value="California">California</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zipcode" placeholder="" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue:'' ?>" >
              </div>
            </div>
            <hr class="mb-4">
 
            <h4 class="mb-3">Payment</h4>
 
            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input" checked="" >
                <label class="custom-control-label" for="cashOnDelivery">Cash on Delivery</label>
              </div>
            </div>
           
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
        </div>
        
        </body>
        </html>