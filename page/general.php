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
<body onload="setup()">
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
    <script>
        function refresh() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("chat").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "fetch_messages.php", true);
            xhttp.send();
        }
        function scroolChat(){
            var chat = document.querySelector('.chat');
            // if condition pour anti scroll a l'infinie
            //if(chat.scrollTop==0 || chat.scrollTop > chat.scrollHeight - 800){
                chat.scrollTop = chat.scrollHeight;
            //}
        }
        var loooper = setInterval(function(){
            refresh();
            scroolChat();
        }, 500);
    </script>
    <div id="topHead">
        <div id="spacement">
            <?php
                echo "<img src=". $_SESSION['image_profile']." alt='logo' class='logo' title='Meow'>";
                echo "<p>ID:".$_SESSION["username"]." #</p><p id='user'>". $_SESSION['YOURid'] ."</p>";
            ?>
            <a href="settings.php">Settings</a>
        </div>
        <form method="post" action="">
            <input type="submit" name="logout" value="logout" id="logout">
        </form>
    </div>
    <div class="chat">
    <div id="chat">

    </div>
    </div>
    <div id="senderDiv">
        <div class="fixer">
        <form id="messager" method="post" action="">
            <input type="text" placeholder="Write some text" name="message" id="chatInput" autocomplete="off">
            <button type="submit" id="sender" onclick="refresh()">Send</button>
        </form>
        </div>
    </div>
</body>
</html>