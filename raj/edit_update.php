<?php 
	
$conn = mysqli_connect("localhost","root","","crud");
$id = $_GET['id'];
$q =mysqli_query($conn,"SELECT * FROM registration WHERE id='$id'");
while($data = mysqli_fetch_array($q))
{ ?>
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
			<td><input type="text" name="txtName" value="<?php echo $data['name']; ?>"></td>
		</tr>
			<tr>
			<td>email</td>
			<td><input type="text" name="txtEmail" value="<?php echo $data['email']; ?>"></td>
		</tr>
			<tr>
			<td>number</td>
			<td><input type="text" name="txtNumber" value="<?php echo $data['nmber']; ?>"></td>
		</tr>
		<tr>
			<td>country</td>
			<td>
				<select name="selCountry">
				
				<?php

		  		include('config.php');
		  		$id =	$_GET['id'];
				$sql = mysqli_query($con, "SELECT * From registration where id='$id'");
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
				<?php

		  		include('config.php');
				$sql = mysqli_query($con, "SELECT * From registration");
				$row = mysqli_num_rows($sql);
				while ($row = mysqli_fetch_array($sql)){
				echo "<option value='". $row['city'] ."'>" .$row['city'] ."</option>" ;
				}
				?>
				</select>
			</td>
		</tr>
			<tr>
				<td>image</td>
				<td><input type="file" name="image" ></td>
				<td><input type="hidden" name="old_image" value="<?php echo $data['image']; ?>"></td>
			</tr>
			<tr><td><img src="<?php echo"upload/".$data['image']?>" width="100px"></td></tr>			
			<tr>
				<td><input type="submit" name="btnSubmit"></td>
			</tr>
			
		</table>

<?php } ?>
	</form>

</body>
</html>
<?php 
$con = mysqli_connect("localhost","root","","crud");
if (isset($_POST['btnSubmit'])) 
{
$id =	$_GET['id'];
$name = $_POST['txtName'];
$email = $_POST['txtEmail'];
$number = $_POST['txtNumber'];
$country = $_POST['selCountry'];
$city = $_POST['selCity'];

$newimage = $_FILES['image']['name'];
$oldimage = $_POST['old_image'];

if ($newimage!='') 
{
	$update_filename = $_FILES['image']['name'];
}
else
{
	$update_filename =$oldimage;
}

	
	if (file_exists("upload/" . $_FILES['image']['name']))
 {
	
	$filename = $_FILES['image']['name'];
	//echo "image alreay exists";
	header("location:showdata.php");



}
else
{
	$query = mysqli_query($conn,"UPDATE registration SET name='$name',email='$email',nmber='$number',country='$country',city='$city',image='$update_filename' WHERE id='$id'");

	if ($query)
	 {

	 	if ($_FILES['image']['name']!='') 
	 	{
	 		move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$_FILES['image']['name']);
	 		unlink("upload/".$oldimage);
	 	}
		//echo "image updated";
		header("location:showdata.php");
	}

	else{
		//echo "image not updated";
		header("location:showdata.php");
	}
}



}



 ?>