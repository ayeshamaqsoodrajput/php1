<?php

$dbhost = 'localhost';
$dbuser ='root';
$dbpass = '';
$dbname = 'shoppingcart';

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($conn){
    echo"connect";
}else{
    echo mysqli_error($conn);
}

?>