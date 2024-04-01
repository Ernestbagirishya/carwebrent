<!DOCTYPE html>
<?php
session_start();
$user=$_SESSION['user'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>
<style type="text/css">
    .container{
        display: grid;
        justify-content: center;

    }
    form{
        border: solid 1px green;
        border-radius: 0.4rem;
        padding: 1rem;
    }
    h3{
        text-align: center;
        margin: 0;
        padding-bottom: 1rem;
    }
    form div{
        display: grid;
        
        margin-bottom: 0.5rem;
    }
    input{
        min-width: 20rem;
        padding: 0.3rem;
        height: 2rem;
    }

    input[type="submit"]{
        background-color: green;
        color: white;
        padding: 0.3rem;
    }
</style>



<body>
    <a href="admin_home.php"><button style="height: 40px; width: 10rem; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">home</button></a> 
<div class="container"> 

  <form method="post">
    <h3>admin change password</h1>
    <div>
        <label for="old">Old Password</label>
        <input type="password" name="old" id="old">
    </div>
    <div>
        <label for="new">New Password</label>
        <input type="password" name="new" id="new">
    </div>
 <div><input type="submit" value="Save" name='save'></div>
  </form> 
</div> 
</body>
</html>
<?php
if(isset($_POST['save'])){
    $old_pass=$_POST['old'];
    $new_pass=$_POST['new'];
require_once "connection.php";
$sql= $connect->query("SELECT * FROM admins where username='$user'");
$row= mysqli_fetch_array($sql);
if (password_verify($old_pass, $row['password'])) {
    $hashedPassword=password_hash($new_pass,PASSWORD_DEFAULT);
    $query="UPDATE `admins` SET `password`='$hashedPassword' where username='$user'";
    echo $query;
    $sql2 = mysqli_query($connect,$query);
   if($sql2==1){
   header("location:admin_home.php");
   }else{
    die("failed to update");
   }
}else{
    echo "<script>alert('wrong old password entered')</script>";
}
}
?>