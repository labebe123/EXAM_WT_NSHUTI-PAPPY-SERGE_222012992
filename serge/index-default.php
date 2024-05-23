<?php

require("connection.php");

?>
<!--html-->
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home page </title>
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <script src="jquery-2.2.4.js"></script>
  <script src="script.js"></script>
</head>
<body>
  <div class="col-md-12 text-center" id="welcome-image-div">
  <div class="col-md-12" id="home-image">
      <div class="home-nav-btn">
      <ul>
      <li><div class="icon"> <i></i></div> <div class="btn">
      <a href="signin.php">
      <button class="btn btn-success btn-lg " id="shop-link">Signin</button>
      </a></div> </li>
      <li><div class="icon"> <i></i></div> <div class="btn">
      <a href="signup.php">
      <button class="btn btn-success btn-lg " id="shop-link">Signup</button>
      </a></div> </li>
      <li><div class="icon"> <i></i></div> <div class="btn">
      <a href="contact.php">
      <button class="btn btn-success btn-lg ">Contact Us</button></div> </li></a>
      </ul>
      </div>
      <div class="text-center" style="margin-top:300px;color:white;">
      <h1>You Must Signin to start Shopping....</h1>
      </div>
  </div>
  </div>
<br><br><br>
  <div class="container">
    <div class="row" style="margin-top:50px;">
        
<div class="col-md-12">
<?php
$sql="SELECT * FROM `product` ORDER BY id DESC LIMIT 4";
$query=mysqli_query($con,$sql);
if (mysqli_num_rows($query)) {
while ($row=mysqli_fetch_assoc($query)) {
  ?>
<div class="col-md-3 text-center">
<form method="post" 
action="index.php?action=add&id=<?php echo $row['id']; ?>">
<div  class="products">
<img src="images/<?php echo $row["image"]; ?>" 
class="img-rounded"/  style="height: 350px;width: 250px;margin-top: 30px;"><br>
<h4 class="text-info"><?php  echo $row["name"]; ?></h4>
<h4 class="text-danger"><?php  echo $row["price"]; ?>  <strong style="color:rgb(128, 125, 125);">RWF</strong></h4>
<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
<input type="hidden" name="image" value="<?php echo $row['image']; ?>">
<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
</div>
</form>
</div>
  <?php
}
}
?>
</div>
    </div>
  </div>
<!--footer-->
  <div class="footer" style="margin-right: 0px;
    margin-left: 0px;">
    <div class="row text-center " style="margin-right: 0px;
    margin-left: 0px;">

</div>
</div>
</body>
</html>
