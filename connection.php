<?php
$connect=mysqli_connect('localhost','root','','rent');

if (!$connect) {
	// code...
	die("failed to connect".mysqli_connect_error());
}

?>