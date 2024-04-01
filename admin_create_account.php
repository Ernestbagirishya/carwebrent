<?php
require 'connection.php';

if (isset($_POST['signup'])) {
	// code...
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$hashedpassword=password_hash($password, PASSWORD_DEFAULT);

	$sql="INSERT INTO admins (firstname,lastname,username,email,password)
	VALUES ('$firstname','$lastname','$username','$email','$hashedpassword')";
	$result=mysqli_query($connect,$sql);

	if ($result) {
		// code...
		header("location:admin_login.php");
	}
	else{
		echo "data not inserted";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin_create_account_css.css">
	<title></title>
</head>
<body>
	<center>
		<a href="home.php"><button style="height: 40px; width: 30%; background-color:#00cc66;cursor: pointer;
    	font-family: Arial Black; border: none; border-radius: 5px;">Home</button></a>
	<fieldset class="fieldset1">
		<legend>admin create account</legend> 
		<form method="POST" action="admin_create_account.php">
			<h class="head_admin_create_account"><b> create account </b></h>
			<div class="field_1">
   			<label class="field_1_firstname">first name</label>
   			<input type="text" name="firstname" class="field_1_firstname_field" required>
   		    </div>
   		    <div class="field_2">
   			<label class="field_2_lastname">lastname</label>
   			<input type="text" name="lastname" class="field_2_lastname_field" required>
   		    </div>
   		    <div class="field_3">
   			<label class="field_3_username">username</label>
   			<input type="text" name="username" class="field_3_username_field" required>
   		    </div>
   		    <div class="field_4">
   			<label class="field_4_email">email</label>
   			<input type="email" name="email" class="field_4_email_field" required>
   		    </div>
   		    <div class="field_5">
   			<label class="field_5_password">password</label>
   			<input type="password" name="password" class="field_5_password_field" required>
   		    </div>
   		    <div class="field_6">
   			<input type="submit" name="signup" class="field_6_signup_button" value="create account">
   		    </div>
   		    <div class="field_7">
   			<b>you have account as an admmin</b>  <a href="admin_login.php">login up</a>
   		</div>
		</form>
	</fieldset>
	</center>

</body>
</html>