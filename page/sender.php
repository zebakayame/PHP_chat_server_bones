<?php
    include("sqlConnection.php");
    if(isset($_POST['message'])){
        $messages = $_POST["message"];
        $user = intval($_POST["userId"]);
        $sql = "INSERT INTO message (message, user_id) VALUES ('$messages', $user)";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "message succesfully sended";
        }else{
            echo "Error: " . $sql . "<br>";
        }
        exit();
    }
?>