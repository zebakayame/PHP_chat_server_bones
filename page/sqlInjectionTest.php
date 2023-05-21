<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/boxPlacement.css">
    <link rel="icon" href="../img/catLogo.png" type="image/x-icon">
    <title>UwU</title>
</head>
<body>
    <?php
        include("sqlConnection.php");
        
        if(isset($_POST['send'])){
            $messages = "HELLOO";
            $user = 1;
            $sql = "INSERT INTO message (message, user_id) VALUES ('$messages', $user)";
            if(mysqli_query($con, $sql)){
                echo "message succesfully sended";
            }else{
                echo "Error: " . $sql . "<br>";
            }
            exit();
        }

    ?>
    
    <form method="post" action="">
        <input type="submit" name="send" value="send" id="sender">
    </form>
</body>
</html>