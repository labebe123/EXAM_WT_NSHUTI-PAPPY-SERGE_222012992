<?php
require('connection.php');
?>
<?php
$sql6="SELECT SUM(total) As total22 FROM cart";
$qery6=mysqli_query($con,$sql6);
$result6=mysqli_fetch_assoc($qery6);
$quant_summ=$result6['total22'];
echo $quant_summ;
?>
