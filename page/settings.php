<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
</head>
<body>
    <?php
        include("sqlConnection.php");
        
        if(isset($_FILES['image'])){
            echo "true";
            $path = "../img/pp/";
            $image_name = $_FILES["image"]["name"];
            $file_tmp = $_FILES['image']['tmp_name'];

            move_uploaded_file($file_tmp,$path . $file_name);
        }
    ?>
    <h1>User Settings</h1>
    <h3>Name: <?php echo $_SESSION['username'];?></h3>
    <h3>User Id (aka: #account created): <?php echo $_SESSION['YOURid'];?></h3>
    <h3>Profile picture: </h3>
    <?php echo "<img src=". $_SESSION['image_profile']." class='pp'>"?>
    <h4>Change Profile pictures:</h4>

    <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
    </form>

</body>
</html>