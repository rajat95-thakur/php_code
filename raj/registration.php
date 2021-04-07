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
			<td>number</td>
			<td><input type="text" name="txtNumber"></td>
		</tr>
		<tr>
			<td>country</td>
			<td>
				<select name="selCountry">
				
				<?php

			include('config.php');
				$sql = mysqli_query($con, "SELECT * From country");
				$row = mysqli_num_rows($sql);
				while ($row = mysqli_fetch_array($sql)){
				echo "<option value='". $row['country'] ."'>" .$row['country'] ."</option>" ;
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>city</td>
			<td>
				<select name="selCity">
					<option value="indore">indore</option>
					<option value="ujjain">ujjain</option>
					<option value="bhopal">bhopal</option>
				</select>
			</td>
		</tr>
			<tr>
				<td>image</td>
				<td><input type="file" name="image"></td>
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
$number = $_POST['txtNumber'];
$country = $_POST['selCountry'];
$city = $_POST['selCity'];

$filename = $_FILES['image']['name'];
$filetmpname = $_FILES['image']['tmp_name'];
$folder='upload/';
move_uploaded_file($filetmpname, $folder.$filename);

$query = mysqli_query($con, "INSERT INTO registration(name,email,nmber,country,city,image) VALUES('$name','$email','$number','$country','$city','$filename') ");

}



 ?>