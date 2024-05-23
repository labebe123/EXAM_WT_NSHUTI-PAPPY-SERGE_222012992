<?php
//db connection include
require('connection.php');
$resulti = "SELECT * FROM `cart` WHERE `email`='$user'";
$sqli = mysqli_query($con,$resulti);
$num_rows = mysqli_num_rows($sqli);
?>