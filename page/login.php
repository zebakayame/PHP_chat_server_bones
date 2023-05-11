<?php
    include("sqlConnection.php");
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $sql = "select * from USERS where name = '$username' and pass = '$password'";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);

    if($count){
        echo "<h1><center> Login successful </center></h1>";
        session_start();
        $_SESSION['username'] = $username;
        header("Location: general.php");
    }else{
        header("Location: ../index.html");
    }  

?>