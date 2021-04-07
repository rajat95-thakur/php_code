
<?php 
 
session_start();
if ($_SESSION['email']==true)
 { ?> 

 




<?php 	
$conn = mysqli_connect("localhost","root","","crud");
$q =mysqli_query($conn,'SELECT * FROM signup');
while($data = mysqli_fetch_array($q))
{ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<table>
			<tr>
				<td>name</td>
				<td><input type="text" name="txtName" value="<?php echo $data['name'];?>"></td>
			</tr>
						<tr>
				<td>email</td>
				<td><input type="text" name="txtEmail" value="<?php echo $data['email'];?>"></td>
			</tr>			<tr>
				<td>number</td>
				<td><input type="text" name="txtNumber" value="<?php echo $data['numbr'];?>"></td>
			</tr>			<tr>
				
				<td><input type="submit" name="btnSubmit" value="SUBMIT"></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php } ?>
<?php  
$conn = mysqli_connect("localhost","root","","crud");
if (isset($_POST['btnSubmit'])) 
{
$id = $_GET['id'];
$name = $_POST['txtName'];
$email = $_POST['txtEmail'];
$number = $_POST['txtNumber'];
$query = mysqli_query($conn,"UPDATE signup SET name='$name',email='$email',numbr='$number' WHERE id='$id'");
header('location:view.php');
}

?>

<?php 
/*echo "welcome".$_SESSION['email'];*/
}
 
else
{
	header('location:login.php');
}
 ?>


