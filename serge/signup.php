<?php
//session starter
session_start();
require('connection.php');
?>
<?php
$error ="";
?>
<?php
if(isset($_POST['signup'])){
$password = $_POST['password'];
$email = $_POST['email'];
$sql="INSERT INTO `customer`( `email`, `password`) VALUES ('$email','$password')";
$link=mysqli_query($con,$sql);
if(empty($email) && empty($password)){
$error="Empty: Email  Or Password.";
}
else{
$_SESSION["email"]=$email;
$_SESSION["password"]=$password;
header('location:index.php');
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>All O'n - customer - signup</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />
<script src="jquery-2.2.4.js"></script>
<style>
body{
text-align: center;
background-color: teal;
}
#header{
width: 100%;
background-color: teal;
height: 80px;

}
#body{
margin-top: 5%;
width: 50%;
border-radius: o;
margin: auto;
}
.form-group{
width: 70%;
}
.form-control{
border-radius: 0;
}
form{
text-align: -webkit-center;
}
#all-body{
background-color: #f2f3f3;
width: 100%;
height: 500px;
}
.footer{
background-color:black;
height:400px;
}
</style>
</head>
<body>
<div class="list-group-item" style="border-radius: 0;border: 0;" id="header">
<h2 class="text text-default"> All O'n </h2>
</div>
<div class="container" id="all-body"><br><br>
<fieldset class="list-group-item" id="body">
<form action="signup.php" method="post">
<div class="form-group" >
<h2 class="text-primary">New Customer SignUp</h2>
</div>
<div class="form-group" style="text-align:start;" >
<legend></legend>
</div>
<div class="form-group">
<h5 class="text-danger">
<?php
echo $error;
?>
</h5>
</div>
<div class="form-group" style="text-align:start;" >
<label for="email" style="font-size: 17px;">Email</label>
<input type="email" class="form-control" name="email" id="email">
</div>
<div class="form-group" style="text-align:start">
<label for="pass" style="font-size: 17px;">Password</label>
<input type="password" class="form-control" name="password" id="password">
</div>
<div class="form-group">
<input type="submit" class="btn btn-success" value="SignUp" name="signup" id="signup">
</div>
<div class="form-group" >
<legend>Or</legend>
</div>
<div class="form-group" style="text-align:auto;" >
<a href="signin.php"class="text-danger">Arleady Have Account ?</a>
</div>
</form>
</fieldset>
</div>
<div class="footer">

</div>
</body>
</html>