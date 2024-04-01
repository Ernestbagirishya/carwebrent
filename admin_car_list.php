<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin_car_list_css.css">
	<title> car list</title>
</head>
<body>
	<center>
		<h  style="font-family: Arial Black; ">list  of all cars</h>
        <a href="admin_home.php"><button style="margin-left: 600px;">HOME</button><a>
        <a href="admin_add_car.php"><button style="margin-left: 50px;">add car</button><a>
		<br><br><br>
		<table>
			<tr style="font-family: Arial Black;">
				<td style="background-color: #00cc66;"><b>car id</b></td>
				<td style="background-color: #00cc66;"><b>car name</b></td>
				<td style="background-color: #00cc66;"><b>car price</b></td>
				<td style="background-color: #00cc66;"><b>car image</b></td>
				<td colspan="2" style="background-color: #00cc66;">
					
				</td>				
			</tr>
<?php
require 'connection.php';

$sql1="SELECT * FROM cars";
$result1=mysqli_query($connect,$sql1);

while ($row=mysqli_fetch_array($result1)) {
	// code...
	?>
	<tr>
		<td><?php echo $row['car_id']; ?></td>
		<td><?php echo $row['car_name']; ?></td>
		<td><?php echo $row['car_price']; ?></td>
		<td><?php echo $row['car_image']; ?></td>
    <td>
<button onclick="return confirm('Are you sure you wanat to update? <?php echo $row['car_name']?>')" >   <a href="admin_delete.php? car_id=<?php echo $row['car_id'] ?>">delete</a></button>


<button onclick="return confirm('Are you sure you wanat to update? <?php echo $row['car_name']?>')" >   <a href="admin_add_car.php? car_id=<?php echo $row['car_id'] ?>">update</a></button>
		</td>

	</tr>
<?php	
}


?>







		</table>
	</center>

</body>
</html>