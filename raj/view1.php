<?php 
$conn=mysqli_connect("localhost","root","","crud");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
	<div>
		<input type="text" name="search" id="search" placeholder="Search" onkeyup="search_data()">
	</div>
	<div id="search_table"> 
	<table border="1">
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>number</td>
		<td>delete</td>
		<td>update</td>
		<?php 
		$q =mysqli_query($conn,'SELECT * FROM signup');
		while($data = mysqli_fetch_array($q))
		 {
			?>
			<tr>
				<td><?php echo $data['id']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['numbr']; ?></td>
				<td><button class="btn-danger btn"><a href="delete.php?id=<?php echo$data['id'];?>">delete</a></button></td>
				<td><button class="btn-primary btn"><a href="update.php?id=<?php echo$data['id'];?>">update</a></button></td>
			</tr>
	<?php	}

		 ?>

	</table>
</div>

<script type="text/javascript">
	function search_data()
	{
		var search = Jquery('#search').val();
		alert(search);
	}
</script>
</body>
</html>