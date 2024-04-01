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
    <link rel="stylesheet" type="text/css" href="home_D_copy.css">
    <title>home</title>
    <style type="text/css">
        /* Your existing CSS styles */
    </style>
</head>
<body>

<div class="header_div" style="border: none;">
    <div class="header_logo"><b>car rent</b></div>
    <div class="header_nav">
        <div class="header_nav_home"><b>Home</b></div>
        <div class="header_nav_customer"><b>Customer</b></div>
        <a href="admin_login.php"><div class="header_nav_admin"><b>Admin</b></div></a>
    </div>
</div>
<div class="header_banner">
    <img src="basic/banner1.jpg" style=" height: 200px; width: 100%;">
</div>

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
            echo '<div style="width:20%;float:left;padding:6px;">';
            echo "<div style='box-shadow: 0px 0px 4px 1px gray;padding: 7px;height:300px;border-radius:7.5px;'> ";
            echo '<img src="' . $row["car_image"] . '"  style="width: 200px;height: 200px" alt="" class="">';
            echo '<div  style="font-weight: bold">' . $row["car_name"] . '</div>';
            echo '<div class="">' . $row["car_price"] . ' RWF</div>';
            echo '<button style="margin-left: 120px;margin-top: 10px; height: 30px; width:50%;"> rent car </button>';
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

<div style="height: 300px; background-color: yellow;">
    



</div>

</body>
</html>
