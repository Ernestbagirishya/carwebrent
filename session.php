<?php
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION["user"])) {
    header("location: admin_login.php");
    
}
?>
