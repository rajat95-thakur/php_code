<?php 
$conn=mysqli_connect("localhost","root","","crud");
$id = $_GET['id'];
$q = mysqli_query($conn,"DELETE FROM signup WHERE id ='$id'");
header('location:view.php');
 ?>

