<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/discussion.css">
    <link rel="icon" href="../img/catLogo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/sendingMessage.js"></script>
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

    ?>
    <div id="topHead">
        <div id="spacement">
            <img src="../img/catLogo.png" alt="logo" class="logo" title="Meow">
            <?php
                echo "<p id='user'>". $_SESSION['YOURid'] ."</p>";
            ?>
        </div>
        <form method="post" action="">
            <input type="submit" name="logout" value="logout" id="logout">
        </form>
    </div>
    <div class="chat">
        <?php
            include("sqlConnection.php"); 

            // taking EVERYTHING from the base
            $sql = "SELECT * FROM message";

            // EL result
            $result = mysqli_query($con, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // El loop
                while ($eachMess = mysqli_fetch_assoc($result)) {
                    $sqlUserNameGetor = "SELECT USERS.name FROM USERS WHERE USERS.id = " . $eachMess['user_id'];
                    $userNameResult = mysqli_query($con, $sqlUserNameGetor);
                    $row = mysqli_fetch_assoc($userNameResult);
                    $userName = $row["name"];
                    echo 
                        '<div class="message">
                            <p>'. $userName .'</p>
                            <p>'. $eachMess['message'] .'</p>
                        </div><br>'
                    ;
                }

            } else {
                echo "No messages found.";
            }
        ?>
    </div>
    <div id="senderDiv">
        <div class="fixer">
        <form id="messager" method="post" action="">
            <input type="text" placeholder="Write some text" name="message" id="chatInput" autocomplete="off">
            <button type="submit" id="sender">Send</button>
        </form>
        </div>
    </div>
</body>
</html>