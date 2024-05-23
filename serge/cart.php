
<div class="table-responsive">

<?php
require("connection.php");

$sql="SELECT * FROM `cart` ORDER BY id DESC";
$query=mysqli_query($con,$sql);
if (mysqli_num_rows($query)) {
while ($row=mysqli_fetch_assoc($query)) {
  ?>
<br><br>
<?php echo $cart['price']; ?>
</div>
<?php
}
?>
