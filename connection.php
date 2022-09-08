<?php
$dbname = 'school';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn) {
    echo "Connect".'<br>';
} else {
    echo "Not Connect";
}
?>
