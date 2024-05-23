<?php

//check session
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
?>
<?php
$sql="SELECT COUNT('name') AS total FROM `product`";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($query);
$prod_num=$result['total'];
?>
<?php
$sql3="SELECT SUM(price) As total FROM product";
$qery3=mysqli_query($con,$sql3);
$result3=mysqli_fetch_assoc($qery3);
$price_sum=$result3['total'];
?>
<?php
$sql3="SELECT SUM(cost) As totall FROM product";
$qery3=mysqli_query($con,$sql3);
$result3=mysqli_fetch_assoc($qery3);
$cost_sum=$result3['totall'];
?>
<?php
$profit=$price_sum-$cost_sum;
$prof_percent=(100*$profit)/$price_sum;
?>
<?php
$cost_sump=$price_sum-$profit;
$cost_parcent=(100-$prof_percent);
?>
<?php
$sql5="SELECT SUM(quantity) As total2 FROM product";
$qery5=mysqli_query($con,$sql5);
$result5=mysqli_fetch_assoc($qery5);
$quant_sum=$result5['total2'];
?>
<?php
$link5="SELECT * FROM `admin`";
$sql5=mysqli_query($con,$link5);
if (mysqli_num_rows($sql5)) {
while ($result=mysqli_fetch_assoc($sql5)) {
  $pic=$result['image'];
}
}
?>
<?php 
   require("connection.php");

   if (!$con) {
       $mgs ="<h2 class='text-danger'>Seever Not Found!!</h2>";
   }
  
   
   ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Virtual Customer Service - Admin - Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />
<link rel="stylesheet" href="style.css">
<script src="jquery-2.2.4.js"></script>
<style>
body{
text-align: center;
background-color:whitesmoke;
}
#header{

}
h4{
   color: black;
}
#col1{
margin-top: 20px;
font-size: 90px;
width: 100%;
height: auto;
color: rgb(168, 168, 168);
background-color: white;
}
#col2{
font-size: 90px;
width: auto;
height:100%;
color: rgb(168, 168, 168);
}
.text-default{
font-size: 25px;
color: #999;
font-weight: 100;
}
.profit{
margin-top: 20px;
width: 100%;
height: 40px;
background-color:#ababab;
}
.profit-content{
width:<?php echo $prof_percent; ?>%;
height: 100%;
background-color:black;

}
.admin-profile{
text-align: center;
display: inline-block;
}
.admin-image{
border-radius: 100%;
width: 50px;
height: 50px;
margin: 1px;
}
.SignOut{
padding: 3px 15px;
}
.viewprofile{
padding: 15px
}
.list-group-item{
}
.admin-options{
display: inline-block;
margin-left: 30px;
}
.option{
display: inline-block;
margin:10px;
}
a{
font-size: 18px;
}
a:hover{
text-decoration: none;
}
.button-group{
display: inline-block;
top: 2px;
}
.icon{
display: inline-block;
color: #2f5f30;
}
#dash-body{
   background-color:whitesmoke;
}
</style>
</head>
<body>
<div class="list-group-item" style="border-radius: 0;text-align: initial;">
<div class="admin-profile">
<img src="adminpc/<?php echo $pic; ?>"  class="admin-image">
<div class="button-group">
<a href="admin-upload.php">
<button type="submit" class=" list-group-item"  style="background-color:rgb(230, 230, 230);"> 
<i class="fa fa-edit"></i> My Profile</button></a>
</div>
</div>
<div class="admin-options">
   <li class="option"><a href="product-upload.php">
   <i class="fa fa-edit"> Add Products</i></a></li>
   <li class="option"><a href="manage.php">
   <i class="fa fa-keyboard-o"> Manage Product</i></a></li>
   <li class="option"><a href="comments.php" style="font-size:30px;">
   <i class="fa fa-comments-o"><span class="badge"
       style="font-family: cursive;margin-top: -30px;background-color: rgb(0, 147, 232);font-size: 20px;">
       <?php 
       require('connection.php');
       $resulti = "SELECT * FROM `comments`";
       $sqli = mysqli_query($con,$resulti);
       $commentCount = mysqli_num_rows($sqli);
       echo $commentCount; ?></span> </i></a></li>
   <li class="option"><a href="logout.php">
   <button class="list-group-item" style="background-color:rgb(226, 226, 226);"><i class="fa fa-close"> SignOut</i></a></button></li>
</div>
</div>
<div class="col-md-12" id="dash-body">
<div class="col-md-3">
<div id="col1" class="card" ><i class="fa fa-gg"></i>
<p><h4 class="card-title"><?php echo $prod_num; ?></h4></p>
<button class="btn btn-success btn-lg">Total Products</button>
</div>
</div>
<div class="col-md-3">
<div id="col1" class="card" ><i class="fa fa-group "></i>
<p><h4 class="card-title"><?php echo number_format($price_sum);?> RWF</h4></p>
<button class="btn btn-success btn-lg">Total Price</button>
</div>
</div>
<div class="col-md-3">
<div id="col1" class="card" ><i class="fa fa-address-book"></i>
<p><h4 class="card-title"><?php echo number_format($cost_sum);?> RWF</h4></p>
<button class="btn btn-success btn-lg">Total Cost</button>
</div>
</div>
<div class="col-md-3">
<div id="col1" class="card" ><i class="fa fa-address-book"></i>
<p><h4 class="card-title"><?php echo number_format( $quant_sum);  ?></h4></p>
<button class="btn btn-success btn-lg">Total Quantity</button>
</div>
</div>

<div class="col-md-6">
   <p><h3><label for="text" class="text-center"> Profit Percent</label></h3></p>
<div class="profit">
<div class="profit-content">
   <label for="text" style="color:white;" class="text-default"><?php  echo round($prof_percent);?>%</label>
</div>
</div>
</div>
<div class="col-md-6">
<p><h3><label for="text" class="text-center"> Cost Percent</label></h3></p>
<div class="profit">
<div class="profit-content" style="width:<?php echo $cost_parcent; ?>%;"><label for="text" style="color:white;" class="text-default"><?php  echo round($cost_parcent);?>%</label></div>
</div>
</div>
</div>

<br><br>
</body>
</button>
