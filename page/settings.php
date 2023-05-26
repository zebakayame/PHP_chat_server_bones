<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="icon" href="../img/catLogo.png" type="image/x-icon">
    <title>Account Settings</title>
</head>
<body>
    <?php
        include("sqlConnection.php");
        
        if(isset($_FILES['image'])){
            $imageName = $_FILES['image']['name'];
            $imageTmpFile = $_FILES['image']['tmp_name'];
            $imageType = $_FILES['image']['type'];

            $newLocation = "../img/pp/" . $imageName;
            move_uploaded_file($imageTmpFile, $newLocation);

            $sql = "UPDATE USERS SET image_profile = '$newLocation' WHERE USERS.id = " . $_SESSION['YOURid'];
            mysqli_query($con, $sql);
            echo "pp updated succesfully";
            session_destroy();
            header("LOCATION: ../index.html");
        }
    ?>
    <h1>User Settings</h1>
    <h2>Name: <?php echo $_SESSION['username'];?></h2>
    <h3>User Id: <?php echo $_SESSION['YOURid'];?></h3>
    <h3>Profile picture: </h3>
    <?php echo "<img src=". $_SESSION['image_profile']." class='pp'>"?>
    <h4>Want to change the profile picture?</h4>
    <form action="" method="POST" enctype="multipart/form-data">
         <p>Select new Profile Image: </p><input type="file" name="image"/>
         <input type="submit" value="Send new Profile"/>
    </form>

</body>
</html>