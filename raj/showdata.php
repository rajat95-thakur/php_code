<?php 
$conn=mysqli_connect("localhost","root","","crud");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
	
 <script type="text/javascript">
 	$(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
</head>
<body>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>number</td>
		<td>country</td>
		<td>city</td>
		<td>image</td>		
		<td>delete</td>
		<td>update</td>
            </tr>
        </thead>
        <tbody>
		<?php 
		$q =mysqli_query($conn,'SELECT * FROM registration');
		while($data = mysqli_fetch_array($q))
		 {
			?>
			<tr>
				<td><?php echo $data['id']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['nmber']; ?></td>
				<td><?php echo $data['country']; ?></td>
				<td><?php echo $data['city']; ?></td>
				<td><?php echo $data['image']; ?></td>
				<!-- <td><img src="<?php //echo 'upload/".$data["image"];."' ?>"  width="300px" height="200px" class="img-responsive" /></td> -->
				<td><button class="btn-danger btn"><a href="delete.php?id=<?php echo$data['id'];?>">delete</a></button></td>
				<td><button class="btn-primary btn"><a href="edit_update.php?id=<?php echo$data['id'];?>">update</a></button></td>
			</tr>
	<?php	}

		 ?>

        </tbody>
    </table>
	<table border="1">
		<tr>
		</tr>

	</table>

</body>
</html>