<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" href="../img/catLogo.png" type="image/x-icon">
    <title>Danger ZONE</title>
</head>
<body>
    <?php
        include("sqlConnection.php");

        $sql = "Select * FROM USERS";
        $result = mysqli_query($con, $sql);

        echo $result;

    ?>
</body>
</html>