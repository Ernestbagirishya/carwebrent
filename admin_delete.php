<?php


	

require 'connection.php';

$car_id=$_GET['car_id'];

$sql="DELETE FROM cars WHERE car_id=$car_id";
$result=mysqli_query($connect,$sql);

if ($result) {
	header("location:admin_car_list.php");

}
else{
	echo "data not deleter";
}







?>