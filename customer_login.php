<?php
session_start()
?>


<?php
require 'connection.php';
if (isset($_POST['login'])) {
	// code...
	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql=mysqli_query($connect,"SELECT * FROM customers WHERE username='$username'");
	//$s=mysqli_query($connect,"SELECT * FROM cars WHERE username='$username'");
    //$r=mysqli_fetch_array($s);
	while ($row=mysqli_fetch_array($sql)) {
		
		$password2=$row['password'];
		if (password_verify($password, $password2)) {
			
			$_SESSION['user1']=$row['username'];
			
			header("location:customer_home.php");
		}
		else{
			echo "password not match";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin_css.css">
	<title>login</title>
</head>
<body>
    <center>
    	<a href="home.php"><button style="height: 40px; width: 30%; background-color:#00cc66;cursor: pointer;
    	font-family: Arial Black; border: none; border-radius: 5px;">Home</button></a>
   <fieldset class="fieldset1">
   	<legend>admin login</legend>
   	<form method="POST" action="customer_login.php">
   		<h class="head_admin_login"><b> customer login </b></h>
   		<div class="field_1">
   			<label class="field_1_username">username</label>
   			<input type="text" name="username" class="field_1_username_field">
   		</div>
   		<div class="field_2">
   			<label class="field_2_username">password</label>
   			<input type="password" name="password" class="field_2_username_field">
   		</div>
   		<div class="field_3">
   			<input type="submit" name="login" class="field_3_login_button" style="cursor: pointer;">
   		</div>
   		<div class="field_4">
   			<b>create account as an customer</b>  <a href="customer_create_account.php">sign up</a>
   		</div>
   		<div>
   			
   		</div>
   	</form>
   </fieldset>
    </center>
</body>
</html>