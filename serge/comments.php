<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap.css" />
<link rel="stylesheet" type="text/css" media="screen" href="index.css" />
<link rel="stylesheet" href="style.css">
<script src="jquery-2.2.4.js"></script>
    <title>Admin_comments-view</title>
</head>
<body>
<?php 
   
   require("connection.php");

   $selectComment = " SELECT * FROM  `comments`";
   $stmt = $con->prepare($selectComment);
   $stmt->execute();
   $res = $stmt->fetchAll();
   foreach ($res as  $comments) {
           ?>
               <div class="container">
               <form action="comments.php" method="get">
               <div class="form-group">
               <div>
                <label for="email" style="font-size:15px;color:rgb(197, 12, 105);">Email:</label>
                 <label ><?php echo $comments['email']; ?></label> </div>
               <div class="text-center">
                   <samp class="texxt-area">
                       <li class="list-group-item">
                        
                       <label><?php echo $comments['comment']; ?></h5></label>
                   </samp>
               </div>
               </div>
               </form>
               </div>
           <?php
       
   }
   ?>
   <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
   <?php
   }
   catch(PDOException $e)
   {
   die($e->getMessage());
   }
   
   ?>
</body>
</html>