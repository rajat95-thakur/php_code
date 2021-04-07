<?php 
 
session_start();
if ($_SESSION==true)
 {
header("location:view.php");
}
else{

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<form method="post">
	<table>
		<tr>
			<td>Email</td>
			<td><input type="text" name="txtEmail"></td>
		</tr>
		<tr>
			<td>pass</td>
			<td><input type="text" name="txtPass"></td>
		</tr>
		<tr>
			
			<td><input type="submit" name="btnLogin" value="SUBMIT"></td>
		</tr>				
	</table>
</form>
</body>
</html>


<?php
$conn=mysqli_connect("localhost","root","","crud");

if (isset($_POST['btnLogin'])) 
{

$email =	$_POST['txtEmail'];
$pass =	$_POST['txtPass'];
$query = mysqli_query($conn,"SELECT * FROM register WHERE email='$email' AND pass='$pass'");
$data=mysqli_num_rows($query);
if ($data>0)
 {
$_SESSION['email']=$email;
header("location:view.php");
}
else{
	echo "invalid";
}

}

  ?>

<?php } ?>