<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin_car_list_css.css">
	<title> report</title>
</head>
<body>
	<center>
		<h  style="font-family: Arial Black; ">report  of all services</h>
        <a href="admin_home.php"><button style="margin-left: 600px;">HOME</button><a>
        
		<br><br><br>
		<table>
			<tr style="font-family: Arial Black;">
				<td style="background-color: #00cc66;"><b>older id</b></td>
				<td style="background-color: #00cc66;"><b>car name</b></td>
				<td style="background-color: #00cc66;"><b>car price</b></td>
				<td style="background-color: #00cc66;"><b>start rent</b></td>
				<td style="background-color: #00cc66;"><b>end rent</b></td>
				
					
				</td>				
			</tr>
<?php
require 'connection.php';

$sql1="SELECT * FROM olders";
$result1=mysqli_query($connect,$sql1);

while ($row=mysqli_fetch_array($result1)) {
	// code...
	?>
	<tr>
		<td><?php echo $row['older_id']; ?></td>
		<td><?php echo $row['car_name']; ?></td>
		<td><?php echo $row['car_price']; ?></td>
		<td><?php echo $row['start_rent']; ?></td>
		<td><?php echo $row['end_rent']; ?></td>
    

	</tr>
<?php	
}


?>







		</table>
	</center>

</body>
</html>