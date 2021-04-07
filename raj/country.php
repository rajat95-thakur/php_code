<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#selCountry").change(function()
			{
			var val = $(this).val();
			$.ajax({
				url:"state.php?cid="+val,
				method:"POST",
				success:function(res)
				{
					$("#selState").html(res);
				}
			});
		});


			$("#selState").change(function()
			{
			var val = $(this).val();
			$.ajax({
				url:"city.php?cityid="+val,
				method:"POST",
				success:function(res)
				{
					$("#selCity").html(res);
				}
			});
		});

		});

	</script>


</head>
<body>
	<select name="selCountry" id="selCountry">
		<option>select country</option>
		<option value="1">India</option>
		<option value="2">USA</option>
	</select>

	<select id="selState">
		
	</select>
	<select id="selCity">
		
	</select>
</body>
</html>