<?php

require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>all in shop</title>
<meta id="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />
<link rel="stylesheet" href="style.css">
<script src="jquery-2.2.4.js"></script>
</head>
<body style="background-color: whitesmoke;">
<div class="container">
  <div class="row">
      <div class="col-lg-12 text-center" style="padding:20px;margin-top:20px;background-color: rgb(49, 133, 126);">
       <div class="col-md-2"><a href="index.php"><img src="download.png" width="50px" style="width:50px"><h4 style="color:white;margin-left:5px;display:inline-block;">Shop Name</h4></a> </div>
       <div class="col-md-8"><h3>My Shop Name Here</h3></div>
      </div>
  </div>
  <br>
  <div class="alert alert-success" style="display:none;">

  </div>
  <div class="alert alert-danger" style="display:none;">

  </div>
  <form method="POST" action="contact.php">
      <div class="form-group">
          <input type="text" name="firstName" class="form-control" placeholder="First Name">
      </div>
      <div class="form-group">
          <input type="text" name="lastName" class="form-control" placeholder="Last Name">
      </div>
      <div class="form-group">
          <input type="text" name="country"  class="form-control" placeholder="Enter Country">
      </div>
      <div class="form-group">
            <input type="number" name="phone"  class="form-control" placeholder="Phone Number">
        </div>
      <div class="form-group">
          <input type="text" name="email"  class="form-control" placeholder="Enter Your Email">
      </div>
  <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea name="comment" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
  </form>
</div>
<div class="row">
<div class="col-md-12" id="commentData">
<?php
require("showComment.php");
?>
</div>
</div>


<br><br>
</body>
</html>
<?php

// insert into database

if (isset($_POST['submit'])) {
    if (!empty($_POST['firstName']) && !empty($_POST['lastName'])&& !empty($_POST['country']) && !empty($_POST['phone']) &&!empty($_POST['email']) && !empty($_POST['comment'])) {
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $insertData = "INSERT INTO `comments`(`firstname`, `lastname`, `country`, `phone`, `email`, `comment`) VALUES ('$fname','$lname','$country','$phone','$email','$comment')";
        $queryData  = $con->prepare($insertData);
        $queryData->execute();
        if ($queryData) {
            ?>
            <script>
            $(document).ready(function () {
                $('#commentData').load("showComment.php");
                $('.alert-success').show(1000);
                $('.alert-danger').hide();
                $('.alert-success').html("Thx for your ideas message Sent");
            })
            </script>
            <?php
        }
        else {
            ?>
            <script>
            $(document).ready(function () {
                $('.alert-danger').show(1000);
                $('.alert-success').hide();
                $('.alert-danger').html("Fail to insert Data!!");
            })
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            $(document).ready(function () {
                $('.alert-danger').show(1000);
                $('.alert-success').hide();
                $('.alert-danger').html("Fill all fields");
            })
            </script>
        <?php
    }
}

?>
