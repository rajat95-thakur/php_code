<!-- <?php 
session_start();
if ($_SESSION['email']==true)
 { ?> 

 <a href="logout.php">logout</a>


 
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
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        
            <tr class="header">
		<td>id</td>
		<th>name</th>
		<td>email</td>
		<td>number</td>
		<td>delete</td>
		<td>update</td>
            </tr>
        
        <tbody>
		<?php
		$conn=mysqli_connect("localhost","root","","crud");
 
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

        </tbody>
    </table>
    
	
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("example");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
  

</body>
</html>
<?php 
echo "welcome".$_SESSION['email'];
}
 
else
{
	header('location:login.php');
}
 ?>


 -->




 <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h2>My Customers</h2>
<form method="POST" action="">
	From<input type="date" name="from" value="">
	To<input type="date" name="to" value="">
	<input type="submit" name="btnSubmit" value="Submit">
</form>

<input type="text" id="myInput" onkeyup="myFunction()"  placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">id</th>
    <th style="width:40%;">Name</th>
    <th style="width:60%;">ksnd</th>
    <th style="width:40%;">ndkctry</th>
    <th style="width:60%;">sss</th>
    

  </tr>
  <?php
		$conn=mysqli_connect("localhost","root","","crud");
		if (isset($_POST['btnSubmit'])) {
$from = $_POST['from'];
$to = $_POST['to'];	
if (strlen($from) > 0){	
				$q =mysqli_query($conn,"SELECT * FROM signup WHERE endeddate BETWEEN '" . $from . "' AND  '" . $to . "'
					ORDER by id DESC");

} }
else{

		$q =mysqli_query($conn,'SELECT * FROM signup'); }
		while($data = mysqli_fetch_array($q))
		 {
			?>
			<tr>
				<td><?php echo $data['id']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['numbr']; ?></td>
				<td><?php echo $data['endeddate']; ?></td>
				<td><button class="btn-danger btn"><a href="delete.php?id=<?php echo$data['id'];?>">delete</a></button></td>
				<td><button class="btn-primary btn"><a href="update.php?id=<?php echo$data['id'];?>">update</a></button></td>
			</tr>
	<?php	}
 		
		 ?>
 
</table>

<script>
function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        var thirdCol = rows[i].cells[2].textContent.toUpperCase();
        var fourthCol = rows[i].cells[3].textContent.toUpperCase();

        if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 ||  thirdCol.indexOf(filter) > -1 || fourthCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>



</body>
</html>