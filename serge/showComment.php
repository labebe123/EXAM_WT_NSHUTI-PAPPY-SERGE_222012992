<?php 
   require("connection.php");

   function security($data)
   {
       $file = trim($data);
       $file = htmlspecialchars($data);
       $file = htmlentities($data);
       return $file;
   }
   $selectComment = " SELECT * FROM  `comments`";
   $stmt = $con->prepare($selectComment);
   $stmt->execute();
   $res = $stmt->fetchAll(FETCH_ASSOC);
   foreach ($res as  $comments) {
           ?>
               <div class="container">
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
               </div>
           <?php
       
   }
   ?>
   