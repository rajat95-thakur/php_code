<?php
$conn = mysqli_connect("localhost","root","","country_state_city");
$id =$_GET['cityid'];
$query = mysqli_query($conn,"SELECT * FROM city WHERE stateid = '$id'");
  while ($data = mysqli_fetch_array($query))
   {
 ?>
 <option value="<?php echo $data["cityid"];?>"><?php echo $data["cityname"]; ?></option>
 <?php }
  ?>

