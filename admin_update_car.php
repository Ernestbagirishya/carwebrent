<?php
require 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin_add_car_css.css">
	<title>update car</title>
</head>
<body>
<?php
$car_id=$_GET['car_id'];
     $sql="SELECT * FROM cars WHERE car_id='$car_id'";
     $result=mysqli_query($connect,$sql);
     while ($row=mysqli_fetch_array($result)) {
?>

<center>
	<fieldset class="fieldset1">
	<legend>update car</legend>
    
    <form method="POST" action="admin_update_car.php" enctype="multipart/form-data">
    	<h class="head_admin_add_car"><b> update car </b></h>
    	<input type="hidden" name="car_id"  value="<?php echo $row['car_id'] ?>">
			<div class="field_1">
   			<label class="field_1_car_name">car name</label>
   			<input type="text" name="car_name" class="field_1_add_car_field"
   			value="<?php echo $row['car_name']; ?>" required>
   		    </div>
   		    <div class="field_2">
   			<label class="field_2_car_price">car prince</label>
   			<input type="text" name="car_price" class="field_2_add_car_field" 
   			value="<?php echo $row['car_price']; ?>" required>
   		    </div>
   		    <div class="field_3">
   			<label class="field_3_car_image">car image</label>
   			<input type="text" name="car_image" class="field_4_add_car_field" 
   			value="<?php echo $row['car_image']; ?>" >
   		    </div>
   		    <div class="field_4">
   			<input type="submit" name="update_car" class="field_4_add_car_button" value="update car">
   		    </div>
    </form>


	</fieldset>
    </center>

    <?php

}

?>
</body>
</html>