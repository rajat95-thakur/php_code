<?php
$conn = mysqli_connect("localhost","root","","country_state_city");
$id =$_GET['cid'];
$query = mysqli_query($conn,"SELECT * FROM state WHERE countryid = '$id'");
  while ($data = mysqli_fetch_array($query))
   {
 ?>
 <option value="<?php echo $data["stateid"];?>"><?php echo $data["statename"]; ?></option>
 <?php }
  ?>
