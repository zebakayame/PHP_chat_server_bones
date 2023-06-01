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
        $sqlIdGetor = "SELECT * FROM USERS WHERE USERS.name = '$username'";
        $IdResult = mysqli_query($con, $sqlIdGetor);
        $row = mysqli_fetch_assoc($IdResult);
        $user_id = $row["id"];
        $_SESSION['YOURid'] = $user_id;
        $image = $row["image_profile"];
        $_SESSION['image_profile'] = $image;
        $role = $row['role'];
        $_SESSION['role'] = $role;
        header("Location: general.php");
    }else{
        header("Location: ../index.html");
    }  

?>