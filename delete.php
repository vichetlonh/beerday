<?php 
$conn = mysqli_connect('localhost', 'root', '', 'productmgt');
$ID = $_GET['id'];
$delete = mysqli_query($conn,"DELETE FROM product WHERE id= $ID");
header('location:add.php');
?>