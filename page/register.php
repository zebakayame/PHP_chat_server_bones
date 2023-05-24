<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../img/catLogo.png" type="image/x-icon">
    <title>Register UwU</title>
</head>
<body>
    <h1>Welcome</h1>
    <h2>To the registration page</h2>
    <div class="login"> 
        <form name="f1" action="page/login.php" onsubmit = "return validation()" method="post">
            <input type="text" placeholder="Enter your new user name" name="user" id="user"><br>
            <input type="password" placeholder="Enter your new Password" name="pass" id="pass"><br>
            <p>Choose your image profile</p>
            <input type="file" accept=".png, .jpg, .jpegq" name="fileToUpload" id="fileToUpload"><br>
            <button id="registerButton" type="submit">Register</button>
        </form>
    </div>
</body>
</html>