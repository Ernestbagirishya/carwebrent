<?php
require 'connection.php';

// Create connection
//$conn = mysqli_connect("localhost", "root", "", "Furniture_Store");

// Check connection
/*if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}*/

// Function to handle file upload
function uploadFile($file) {
    $target_dir = "image/"; // Directory where the file will be stored
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



function insertData($connect, $car_name, $car_price, $car_image) {
    $sql = "INSERT INTO cars (car_name,car_price,car_image) VALUES ('$car_name', '$car_price', '$car_image')";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Data Inserted successfully');</script>";
        header("location:admin_car_list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

// Function to update data in the table
function updateData($connect, $car_id, $car_name, $car_price, $car_image) {
    $sql = "UPDATE cars SET car_name='$car_name', car_price='$car_price', car_image='$car_image' WHERE car_id=$car_id";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Data Updated successfully');</script>";
        header("location:admin_car_list.php");
    } else {
        echo "Error updating record: " . $connect->error;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['add_car'])){ // Check if it's add operation or update
        $car_name = $_POST['car_name'];
        $car_price = $_POST['car_price'];
        $car_image = uploadFile($_FILES['car_image']);
        
        insertData($connect, $car_name, $car_price, $car_image);
    } elseif(isset($_POST['update_car'])){ // Check if it's update operation
        $car_id = $_POST['car_id'];
        $car_name = $_POST['car_name'];
        $car_price = $_POST['car_price'];
        $car_image = uploadFile($_FILES['car_image']);
        
        // Call function to update data in the table
        updateData($connect, $car_id, $car_name, $car_price, $car_image);
    }
}

//$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="admin_add_car_css.css">
    <title>Add / Update Car</title>
</head>
<body>
    <center>
        <a href="admin_home.php"><button style="height: 40px; width: 30%; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">Home</button></a>

         <a href="admin_car_list.php"><button style="height: 40px; width: 10%; background-color:#00cc66;cursor: pointer;
        font-family: Arial Black; border: none; border-radius: 5px;">CAR LIST</button></a>

    <fieldset class="fieldset1">
    <legend>Admin Add / Update Car</legend>
    
    <form method="POST" action="admin_add_car.php" enctype="multipart/form-data">
        <h class="head_admin_add_car"><b>Add / Update Car</b></h>
            <div class="field_0">
            <input type="hidden" name="car_id" value="<?php echo isset($_GET['car_id']) ? $_GET['car_id'] : ''; ?>">
            </div>
            <div class="field_1">
            <label class="field_1_car_name">Car Name</label>
            <input type="text" name="car_name" class="field_1_add_car_field" required>
            </div>
            <div class="field_2">
            <label class="field_2_car_price">Car Price</label>
            <input type="text" name="car_price" class="field_2_add_car_field" required>
            </div>
            <div class="field_3">
            <label class="field_3_car_image">Car Image</label>
            <input type="file" name="car_image" class="field_4_add_car_field" required>
            </div>
            <div class="field_4">
            <?php if(isset($_GET['car_id'])) { ?>
                <input type="submit" name="update_car" class="field_4_add_car_button" value="Update Car">
            <?php } else { ?>
                <input type="submit" name="add_car" class="field_4_add_car_button" value="Add New Car">
            <?php } ?>
            </div>
    </form>

    </fieldset>
    </center>

</body>
</html>
