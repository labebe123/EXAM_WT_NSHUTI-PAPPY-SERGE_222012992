
<?php
session_start();
require('connection.php');
if ($_SESSION['email'] && $_SESSION['password']) {
$user= $_SESSION['email'];
}
else {
header('location:index-default.php');
}


?>
<?php

//add to cart

if (isset($_POST['Add-to-cart'])) {
$price=$_POST['price'];
$quantity=$_POST['hidden-quantity'];
$total=($price*$quantity);
$name=$_POST['name'];
$image=$_POST['image'];
$add="INSERT INTO `cart`(`name`, `image`, `quantity`, `price`, `total`, `email`) VALUES ('$name','$image','$quantity','$price','$total','$user')";
$to_cart=mysqli_query($con,$add);
if ($to_cart) {
?>
<?php
}
else {
echo "fail to add Item in cart";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>customer service</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />
<link rel="stylesheet" type="text/css" media="screen" href="index.css" />
<link rel="stylesheet" href="style.css">

<script src="jquery-2.2.4.js"></script>
<style>

#d-index-header{
    height: 100px;
    text-align:center;
    background-color: whitesmoke;
}
.icon{
  display: inline-block;
  font-size: 30px;
}
.icon-shop{
  display: inline-block;
  font-size: 30px;
  cursor: pointer;
}
.badge{
  font-size: 19px;
  margin-top: -20px;
}
</style>
</head>
<body>

<div class="col-md-12" id="d-index-header">
  <br>
  <div class="col-md-4">
    <h4><div class="icon"><i class="fa fa-user-o"></i></div>&nbsp;&nbsp;&nbsp;<?php  echo $user; ?></h4>
   </div>
  
<div class="col-md-4" style="float:right;">
<div class="icon-shop" style="padding: 20px;font-size: 20px;">
<i class="fa fa-shopping-bag"><span class="badge"><?php
$resulti = "SELECT * FROM `cart` WHERE `email`='$user'";
$sqli = mysqli_query($con,$resulti);
$num_rows = mysqli_num_rows($sqli);
 echo $num_rows; ?></span></i>
</div>
<a href="signout.php"><button class="btn btn-danger">SignOut</button></a>

</div>
<br>
</div>

<div class="col-md-12">
<?php
$sql="SELECT * FROM `product` ORDER BY id DESC";
$query=mysqli_query($con,$sql);
if (mysqli_num_rows($query)) {
while ($row=mysqli_fetch_assoc($query)) {
  ?>
<div class="col-md-3 text-center">
<form method="post" 
action="index.php?action=add&id=<?php echo $row['id']; ?>">
<div  class="products">
<img src="images/<?php echo $row["image"]; ?>" class="img-rounded"/  style="height: 350px;width: 250px;"><br>
<h4 class="text-info"><?php  echo $row["name"]; ?></h4>
<input type="text"  name="hidden-quantity" class="form-control" style="text-align: center;width: fit-content;margin: auto;" value="1">
<h4 class="text-danger"><?php  echo $row["price"]; ?>  <strong style="color:rgb(128, 125, 125);">RWF</strong></h4>
<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
<input type="hidden" name="image" value="<?php echo $row['image']; ?>">
<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
<button type="submit" name="Add-to-cart" class="btn btn-success">Add-to-cart</button>
</div>
</form>
</div>
  <?php
}
}
?>
</div>

</div>
<br><div class="modal" style="overflow: scroll">
<div class="modal-content" style="padding:20px;">
<div class="table-responsive">

<div class="form-group">
  <button class="btn btn-danger btn-close">Close Shopping Cart</button>
</div>


<br><br>
<?php
if (isset($_POST['remove'])) {
$item_id=$_GET['id'];
$del="DELETE FROM `cart` WHERE `id`='$item_id'";
$delete=mysqli_query($con,$del);
if ($delete) {

}
}
?>
<?php
if (isset($_POST['removeall'])) {
$dell="DELETE FROM `cart` WHERE `email`='$user'";
$deletee=mysqli_query($con,$dell);
if ($deletee) {

}
}
?>
<?php
$sql5="SELECT SUM(price) As total2 FROM cart WHERE `email`='$user' ";
$qery5=mysqli_query($con,$sql5);
$result5=mysqli_fetch_assoc($qery5);
$quant_sum=$result5['total2'];
?>
<?php
$sql6="SELECT SUM(total) As total22 FROM cart WHERE `email`='$user' ";
$qery6=mysqli_query($con,$sql6);
$result6=mysqli_fetch_assoc($qery6);
$quant_summ=$result6['total22'];
?>
</table>
</div>
<br>
<br>

</div>
</div>
</div>

</body>
</html>
<script>

$(document).ready(function () {
  $('.btn-close').click(function () {
    $('.modal').hide(2000);
  })
  $('.fa-shopping-bag').click(function () {
    $('.modal').show(2000);
  })
})
</script>