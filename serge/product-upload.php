<?php
//session checker
session_start();
$admin=$_SESSION['email'];
?>
<?php
if(($_SESSION['email']) && ($_SESSION['password'])){
}
else{
header('location:login.php');
}
?>
<?php
require("connection.php");

//insert into product table
if(isset($_POST['log'])){

$name=$_POST['name'];

$price=$_POST['price'];

$cost=$_POST['cost'];

$quantity=$_POST['quantity'];

$file = $_FILES['image'];

$filename = $_FILES['image']['name'];

$tmpnm = $_FILES['image']['tmp_name'];

$type = $_FILES['image']['type'];

$size = $_FILES['image']['size'];

$error = $_FILES['image']['error'];

$fileExit = explode('.',$filename);

$fileActualExit = strtolower(end($fileExit));

$sql="INSERT INTO `product`(`name`, `image`, `cost`, `quantity`, `price`) VALUES ('$name','$filename','$cost','$quantity','$price')";

$query=mysqli_query($con,$sql);

$dir = "images/".$filename;

$arrayName = array('jpg','png','pdf','jpeg');

$move = move_uploaded_file($tmpnm, $dir);
if (in_array($fileActualExit,$arrayName,$query)){ 
if ($error === 0) {
if ($size<8388608) {

echo" file Upload successfully";
}
else {

echo"file upload is TOo big";
}
}
else {
echo"There was a problem uploading file";
}
}
else {
echo"can not upload this file type";
}


}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>product/upload</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />
<script src="jquery-2.2.4.js"></script>
<style>
body{
background-color: beige;
}
.form-group{
    text-align: left;
}
.header{
width: 100%;

height: 80px;

background-color:tan;
}
@media screen and (min-width:480px){
.body{

text-align: center;

width: 90%;

margin: auto;
}
}
.form-control{
border-radius:0px;
}
.footer{
background-color:black;
height:400px;
}
</style>
</head>
<body>
<div class="header">
    <br>
<a href="admin.php"><button type="button" class="btn btn-danger btn-lg" style="margin-left:30px;">
<i class="fa fa-angle-double-left">   Back</i>
</button></a>
</div><br><br><br>
<div class="body">
<form action="product-upload.php" class="form" method="post" enctype="multipart/form-data">
<div class="list-group-item" style="border-radius:0px;width95%;">
<div class="form-group">
<label for="email">product name:</label>
<input type="text" class="form-control" name="name" id="name">
</div>
<div class="form-group">
<label for="email">Select image to upload:</label>
<input type="file" class="form-control" name="image" id="fileToUpload">
</div>
<div class="form-group">
<label for="email">cost:</label>
<input type="number" class="form-control" name="cost" id="cost">
</div>
<div class="form-group">
<label for="email">quantity:</label>
<input type="number" class="form-control" name="quantity" id="quantity">
</div>
<div class="form-group">
<label for="email">price:</label>
<input type="number" class="form-control" name="price" id="price">
</div>
<div class="form-group" >
<input type="submit" class="btn btn-success btn-lg " value="upload" name="log">
</div>
</div>
</form>
</div>
<br><br>
<div class="footer">

</div>
</body>
</html>