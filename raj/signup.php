

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
				<td><input type="text" name="txtName"></td>
			</tr>
						<tr>
				<td>email</td>
				<td><input type="text" name="txtEmail"></td>
			</tr>			<tr
			>
				<td>number</td>
				<td><input type="text" name="txtNumber"></td>
			</tr>
					<tr>
				<td>ended</td>
				<td><input type="date" name="txtDo"></td>
			</tr>
						<tr>
				
				<td><input type="submit" name="btnSubmit" value="SUBMIT"></td>
			</tr>
		</table>
	</form>

</body>
</html>

<?php  
$conn = mysqli_connect("localhost","root","","crud");
if (isset($_POST['btnSubmit'])) 
{
$name = $_POST['txtName'];
$email = $_POST['txtEmail'];
$number = $_POST['txtNumber'];
$ended = $_POST['txtDo'];
$query = mysqli_query($conn,"INSERT INTO signup(name,email,numbr,endeddate) VALUES('$name','$email','$number','$ended') ");

}

?>