<?php
//session starter
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
require('connection.php');
$arert="";
?>
<?php

require('connection.php');
//update codes
if(isset($_POST['update'])){
$id=$_GET['id'];
$name=$_POST['name'];
$cost=$_POST['cost'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$file = $_FILES['image'];
$filename = $_FILES['image']['name'];
$tmpnm = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];
$error = $_FILES['image']['error'];
$fileExit = explode('.',$filename);
$fileActualExit = strtolower(end($fileExit));
$sql="UPDATE `product` SET `name`='$name',`image`='$filename',`cost`='$cost',`quantity`='$quantity',`price`='$price' WHERE `id`='$id'";
$query=mysqli_query($con,$sql);
$dir = "images/".$filename;
$arrayName = array('jpg','png','pdf','jpeg');
$move = move_uploaded_file($tmpnm, $dir);
if (in_array($fileActualExit,$arrayName,$query)){ 
if ($error === 0) {
if ($size<8388608) {
$arert='<div class="alert alert-success">
<strong class="icon-alert"><i class="fa fa-exclamation-triangle"></i></strong>Item Updated Successfull 
</div>';
}
else {
$arert='<div class="alert alert-success">
<strong class="icon-alert"><i class="fa fa-exclamation-triangle"></i></strong>Image is too big 
</div>';
}
}
else {
$arert='<div class="alert alert-success">
<strong class="icon-alert"><i class="fa fa-exclamation-triangle"></i></strong>Item Not Updated 
</div>';
}
}
else {
$arert='<div class="alert alert-success">
<strong class="icon-alert"><i class="fa fa-exclamation-triangle"></i></strong>Item Can Not Updated 
</div>';
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
text-align: center;
}
@media screen and (min-width: 480px) {
td{
width:90px;
}
}
@media screen and (min-width: 480px) {
td{

}
}
.lit-grop-itm{
height:80px;
width: 100%;
background-color: #dddddd;
text-align: center;
}
form{
   
}
.table-responsive{
width: 95%;
margin: auto;
}
.table{
margin: auto;
}
th{
text-align: center;
}
td{
text-align: center;
}
.icon-alert{
font-size: 20px;
}
.btn{
display: inline-block;
padding: 3px 9px;
}
.footer{
background-color:black;
height:400px;
}
</style>
</head>
<body>
<div class="lit-grop-itm"><br>
<a href="admin.php"><button type="button" class="btn btn-danger btn-lg">
<i class="fa fa-angle-double-left">   Back</i>
</button>
</a>
</div>
</div>
<h2 class="text-default"> Admin </h2>
<h3 class="text-primary">All Product Management Details Table</h3><br/>
<?php
echo $arert;
?>
<div class="table-responsive">
<table class="table">
<tr>
<th >id</th>
<th >name</th>
<th >image</th>
<th >cost</th>
<th >quantity</th>
<th >price</th>
<th >Action</th>
</tr>
<?php
require('connection.php');
if (isset($_POST['delete'])) {
$id=$_GET['id'];
$del="DELETE FROM `product` WHERE `id`='$id'";
$delete=mysqli_query($con,$del);
if ($delete) {
?>
<div class="alert alert-success">
  <strong class="icon-alert"><i class="fa fa-exclamation-triangle"></i></strong>Item Deleted Successfull 
</div>
<?php
}
else {
?>
<div class="alert alert-danger">
  <strong class="icon-alert"><i class="fa fa-exclamation-triangle"></i></strong>There Was Problem Delete Item Try Again 
</div>
<?php
}
}
?>
<?php
$link5="SELECT * FROM `product`";
$sql5=mysqli_query($con,$link5);
if (mysqli_num_rows($sql5)) {
while ($result=mysqli_fetch_assoc($sql5)) {
 ?>
<form action="manage.php?id=<?php echo $result['id']; ?>" method="post" enctype="multipart/form-data">
<tr>
<td><?php  echo $result['id']; ?></td>
<td><input type="text" name="name" class="form-control" value="<?php  echo $result['name']; ?>"></td>
<td><input type="file" class="form-control" name="image" id="fileToUpload" value="<?php  echo $result['image']; ?>" ></td>
<td><input type="text"  name="cost" class="form-control" value="<?php  echo $result['cost']; ?>"></td>
<td><input type="text"  name="quantity" class="form-control" value="<?php  echo $result['quantity']; ?>"></td>
<td><input type="text" name="price" class="form-control" value="<?php  echo $result['price']; ?>"></td>
<td>
<button type="submit" name="update" class="btn btn-success"><i class="fa fa-cogs"></i> Update</button>
<button type="submit" name="delete" class= "btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
</td>
</tr>
</form>
<?php
}
}
?>
</table>
</div>
</div>
<br><br>
<div class="footer">

</div>
</body>
</html>