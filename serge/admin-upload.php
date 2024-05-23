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

//include db connection
require("connection.php");

if(isset($_POST['log'])){
$email=$_POST['email'];
$password=$_POST['password'];
$file = $_FILES['image'];
$filename = $_FILES['image']['name'];
$tmpnm = $_FILES['image']['tmp_name'];
$type = $_FILES['image']['type'];
$size = $_FILES['image']['size'];
$error = $_FILES['image']['error'];
$fileExit = explode('.',$filename);
$fileActualExit = strtolower(end($fileExit));

//insert into database
$sql="UPDATE `admin` SET `email`='$email',`image`='$filename',`password`='$password'";
$query=mysqli_query($con,$sql);
$dir = "adminpc/".$filename;
$arrayName = array('jpg','png','jpeg');
$move = move_uploaded_file($tmpnm, $dir);
if (in_array($fileActualExit,$arrayName,$query)){ 
if ($error === 0) {
if ($size<8388608) {
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
<?php

//retrieve from database
$link5="SELECT * FROM `admin`";
$sql5=mysqli_query($con,$link5);
if (mysqli_num_rows($sql5)) {
while ($result=mysqli_fetch_assoc($sql5)) {
  $em=$result['email'];
  $pic=$result['image'];
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
.lit-grop-itm{
height:100px;
width: 100%;
background-color: #dddddd;
}
.admin-image{
border-radius: 100%;
width: 100px;
height: 100px;
margin: 2px;
}
form{
margin: auto;
width: 400px;
text-align: start;
}
.footer{
background-color:black;
height:400px;
}
</style>
</head>
<body>
<div class="lit-grop-itm">
</div><br><br>
<div style="border-top-left-radius: 0;text-align: center;">
<div class="admin-profile">
<img src="adminpc/<?php echo $pic; ?>"  class="admin-image">
</div>
<form action="admin-upload.php" class="form" method="post" enctype="multipart/form-data">
<div class="list-group-item">
<div class="form-group">
<label for="email">Email:</label>
<input type="text" class="form-control" value="<?php echo $em; ?>" name="email" id="email">
</div>
<div class="form-group">
<label for="email">Select Profile picture:</label>
<input type="file" class="form-control" name="image" id="fileToUpload">
</div>
<div class="form-group">
<label for="password">Enter password:</label>
<input type="password" class="form-control" name="password" id="password">
</div>
<div class="form-group" style="text-align:center;">
<input type="submit" class="btn btn-success" value="upload" name="log">
</div>
</div><br>
<div class="list-group-item">
<div class="form-group"  style="text-align:center;" >
<a href="admin.php"><button type="button" class="btn btn-danger">
<i class="fa fa-angle-double-left">   Back</i>
</button>
</a>
</div>
</div>
</form>
</div>
<br><br>
<div class="footer">

</div>
</body>
</html>