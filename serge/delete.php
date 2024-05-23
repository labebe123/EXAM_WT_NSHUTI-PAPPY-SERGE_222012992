<?php
//db connect
require('connection.php');

//to delete from db
if (isset($_POST['delete'])) {
   $got=$_GET['id'];
$link6="DELETE FROM `product` WHERE `id`='$got'";
$query6=mysqli_query($con,$link6);
if ($query6) {
    header('location:manage.php');
}
else{
    echo "not deleted";
}
}
?>