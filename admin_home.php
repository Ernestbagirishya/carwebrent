<?php include 'session.php'; ?>


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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin_home_css.css">
	<title>home</title>
    <style type="text/css">
        .header_nav a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<div class="header_div" style="display: flex; align-items: center; justify-content: space-between;">
	<div class="header_logo"><b>car rent: <?php echo $_SESSION['user']; ?></b></div>
	<div class="header_nav" style="">
		<a href="admin_home.php"><div class="header_nav_admin_home"><b>Home</b></div></a>
		<a href="admin_add_car.php"><div class="header_nav_add_car"><b>add car</b></div></a>
		<a href="admin_car_list.php"><div class="header_nav_car_list"><b>car list</b></div></a>
		<a href="logout.php"><div class="header_nav_logout"><b>logout</b></div></a>
	</div>
</div>
<div class="header_banner">
	<img src="basic/banner1.jpg" style=" height: 100px; width: 100%;">
</div>
<center>
<div style="display: flex; gap:4rem; justify-content: right;">
<a href="admin_report.php"><button style="height: 40px; width: 10rem; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">repost</button></a>
<a href="admin_change_password.php"><button style="height: 40px; width: 10rem; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">change password</button></a>
<a href="admin_create_account.php"><button style="height: 40px; width: 10rem; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">create new admini</button></a>
</div>
</center>

<div class="body1">

    <div class="container">
        <?php
        //Check if page number is set, otherwise set it to 1
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5; // Number of items per page
        $offset = ($page - 1) * $limit; // Calculate offset

        // SQL query to retrieve data from the cars table with pagination
        $sql = "SELECT * FROM cars LIMIT $limit OFFSET $offset";
        $result = mysqli_query($connect, $sql);

        // Loop through each row of the result
        while ($row = $result->fetch_assoc()) {
            $car_id= $row['car_id'];
            echo '<div style="width:20%;float:left;padding:6px;">';
            echo "<div style='box-shadow: 0px 0px 4px 1px gray;padding: 7px;height:300px;border-radius:7.5px;'> ";
            echo '<img src="' . $row["car_image"] . '"  style="width: 200px;height: 200px" alt="" class="">';
            echo '<div  style="font-weight: bold">' . $row["car_name"] . '</div>';
            echo '<div class="">' . $row["car_price"] . ' RWF</div>';
            echo '<a href="rent_car.php? car_id='.$car_id.' "><button style="padding:0;"> rent car </button> </a>';
            echo "</div>";
            echo '</div>';
        }
        ?>
    </div>

    <!-- Pagination buttons -->
    <div style="text-align: center; margin-top: 20px;">
        <?php
        // Calculate total number of pages
        $sql = "SELECT COUNT(*) AS count FROM cars";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_pages = ceil($row['count'] / $limit);

        // Previous button
        if ($page > 1) {
            echo '<a href="?page=' . ($page - 1) . '">
            <button style="margin-right: 100px; height: 30px; width: 60%; background-color: red; font-weight:30px; font-family: Arial Black;  border-radius: 10px; border: none; cursor: pointer;">Previous</button>
            </a><br>';
        }

        

        // Next button
        if ($page < $total_pages) {
            echo '<a href="?page=' . ($page + 1) . '"><button style="margin-right: 100px; height: 30px; width: 60%; background-color: red; font-weight:30px; font-family: Arial Black;  border-radius: 10px; border: none; cursor: pointer;">
            Next</button></a><br>';
        }

        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<a href="?page=' . $i . '">' . '' . '</a>';
        }
        ?>
    </div>


	
</div>

<div style="height: 300px; background-color: #d9d9d9;">
    



</div>




</body>
</html>