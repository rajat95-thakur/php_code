<?php 
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<table align="center" border="1px">
			<tr>
			<td>name</td>
			<td><input type="text" name="txtName"></td>
		</tr>
			<tr>
			<td>email</td>
			<td><input type="text" name="txtEmail"></td>
		</tr>
			<tr>
			<td>password</td>
			<td><input type="text" name="txtPass"></td>
		</tr>
			<tr>
				<td><input type="submit" name="btnSubmit"></td>
			</tr>
			
		</table>
	</form>

</body>
</html>
<?php 
$con = mysqli_connect("localhost","root","","crud");
if (isset($_POST['btnSubmit'])) 
{
$name = $_POST['txtName'];
$email = $_POST['txtEmail'];
$pass = $_POST['txtPass'];

$query = mysqli_query($con, "INSERT INTO register(name,email,pass) VALUES('$name','$email','$pass') ");

$query1 = mysqli_query($con,"SELECT * FROM register WHERE  email='$email' AND pass='$pass'");
$data=mysqli_num_rows($query1);
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