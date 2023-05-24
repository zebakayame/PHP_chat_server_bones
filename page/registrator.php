<?php
    include("sqlConnection.php");

    // default easy accessible variable
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $sql = "INSERT INTO `users` (`name`, `pass`, `image_profile`) VALUES ('$username', '$password', '../img/pp/def.png')";

    //executor
    if(mysqli_query($con, $sql)){
        echo "Account creation successful";
        header("Location: ../index.html");
    }else{
        echo "error";
    }

?>