<?php
session_start();
if (isset($_REQUEST['addtocart'])) {
     $id = $_REQUEST['product_id'];
     $qty = 1;
    $_SESSION['mycart'][$id] = array('id' => $id, 'qty' => $qty);
    header("location:index.php?true=created");

}
if (isset($_REQUEST['event'])) {
    $id = $_REQUEST['id'];
    $qty = $_REQUEST['qtys'];
    $btn = $_REQUEST['event'];
    if($btn == "Update"){
   $_SESSION['mycart'][$id] = array('id' => $id, 'qty' => $qty);
   header('location:cart.php?value=updated');
    }else if($btn == "Delete"){
        unset( $_SESSION['mycart'][$id]);
        header('location:cart.php?value=deleted');
    }


}
?>
