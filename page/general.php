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
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: ../index.html");
            exit; 
        }

        if (isset($_POST['logout'])) {
            session_destroy(); 
            header("Location: ../index.html");
            exit();
        }

        if(isset($_POST['message'])){
            $message = $_POST["message"];
            $username = $_SESSION["username"];
            $sql = "INSERT INTO message VALUES ('$message' , '$username');";
            mysqli_query($con, $sql);
        }

    ?>
    <div id="topHead">
        <div id="spacement">
            <img src="../img/catLogo.png" alt="logo" class="logo" width="120px" title="Meow">
        </div>
        <form method="post" action="">
            <input type="submit" name="logout" value="logout" id="logout">
        </form>
    </div>
    <h2>In construction</h2>

    <div id="chat">
        <div>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem nesciunt eaque ea molestiae ab. Asperiores inventore cumque neque quod qui unde blanditiis nostrum nulla cupiditate facere exercitationem, soluta harum odio!
        </div>
        
    </div>
    <div id="senderDiv">
        <form method="post" action="">
            <input type="text" placeholder="Write some text" name="message" id="chatInput">
            <button type="submit" id="sender">Send</button>
        </form>
    </div>
</body>
</html>