<?php

require 'connection.php';



// SQL query to retrieve data from the furniture_store table
$sql = "SELECT * FROM cars";
$result = mysqli_query($connect, $sql);

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>car view</title>
</head>
<body>
	<center>
	<a href="customer_home.php"><button style="height: 40px; width: 30%; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">Home</button></a>
    </center>

	<a href="#" 
    style="text-decoration: none; color: black;">
<div class="container" style="
	 width: 100%;">
        <?php
        // Loop through each row of the result
        while ($row = $result->fetch_assoc()) {
          $car_id= $row['car_id'];
          echo '<div style="width:20%;float:left;padding:6px;" 
            ">';

             echo"<div style='box-shadow: 0px 0px 4px 1px gray;padding: 7px;height:300px;border-radius:7.5px;'> ";

            echo '<img src=" ' . $row["car_image"] . '"  style="width: 200px;height: 200px" alt="" class="">';

            echo '<div  style="font-weight: bold">' . $row["car_name"] . '</div>';

            //echo '<div class="furniture-description">' . $row["Description"] . '</div>';
            echo '<div class="">' . $row["car_price"] . '</div>';

            echo '<a href="rent_car.php? car_id='.$car_id.' "><button style="padding:0;"> rent car </button> </a> ';
        echo"</div>";


            echo '</div>';
        }
        
       
        ?>
</div>
</a>


</body>
</html>