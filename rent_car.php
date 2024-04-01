<?php include 'session1.php'; ?>
<?php
require 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="rent_car_css.css">
	<title>rent car</title>
</head>
<body>
<?php
$car_id=$_GET['car_id'];
$sql=mysqli_query($connect,"SELECT * FROM cars WHERE car_id='$car_id'");
while($row=mysqli_fetch_array($sql))
{	
?>

	<center>
     <a href="customer_home.php"><button style="height: 40px; width: 30%; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">Home</button></a>

         <a href="customer_car_view.php"><button style="height: 40px; width: 10%; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">CAR LIST</button></a>



	<fieldset class="fieldset1">
		<legend>rent car</legend>
		<form method="POST" action="rent_car.php">
			<h class="head_rent_car"><b> rent car </b></h>
			
			<div class="div1">
				<label class="div1_car_name">car name</label>
				<input type="text" name="car_name" class="div1_car_name_field" 
				value="<?php echo $row['car_name']; ?>" required>
				<label class="div1_car_price">day price</label>
				<input type="text" name="car_price" class="div1_car_price_field" 
				value="<?php echo $row['car_price']; ?>" required>
			</div>
			<div class="div2">
				<label class="div2_start_rent">start rent</label>
				<input type="date" name="start_rent" class="div2_start_rent_field" required>
				<label class="div2_end_rent">end rent</label>
				<input type="date" name="end_rent" class="div2_end_rent_field" required>
			</div>
			<div class="div3">
				<input type="submit" name="rent_car" value="rent car" class="rent_car">
			</div>
			
		</form>
	</fieldset>
	</center>
<?php
}
?>

<?php
if (isset($_POST['rent_car'])) {
	// code...
	$car_name=$_POST['car_name'];
	$car_price=$_POST['car_price'];
	$start_rent=$_POST['start_rent'];
	$end_rent=$_POST['end_rent'];

	$sql10=mysqli_query($connect,"INSERT INTO olders (car_name,car_price,start_rent,end_rent)
		VALUES ('$car_name','$car_price','$start_rent','$end_rent')");

	if ($sql10) {
		// code...
      header("location:thanks.php");

	}
	else{
		echo "not inserted";
	}
}
?>



</body>
</html>