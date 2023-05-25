<?php
    include("sqlConnection.php");

    // default easy accessible variable
    $username = $_POST["user"];
    $password = $_POST["pass"];

    echo $username;
    echo $password;

    
    $sql = "INSERT INTO USERS (name, pass, image_profile) VALUES ('$username', '$password', '../img/pp/def.png')";
    
    $ping = mysqli_ping($con);
    echo $ping;
    
    
    //executor
    if(mysqli_query($con, $sql)){
        echo "Account creation successful";
        header("Location: ../index.html");
    }else{
        echo "error";
    }
    echo "test";

?>