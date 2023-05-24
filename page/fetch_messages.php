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
                    $sqlImageUserGetor = "SELECT USERS.image_profile FROM USERS WHERE USERS.id = " . $eachMess['user_id'];
                    $userNameResult = mysqli_query($con, $sqlUserNameGetor);
                    $userImageResult = mysqli_query($con, $sqlImageUserGetor);
                    $rowN = mysqli_fetch_assoc($userNameResult);
                    $rowI = mysqli_fetch_assoc($userImageResult);
                    $userName = $rowN["name"];
                    $userImage = $rowI["image_profile"];
                    echo 
                        '<div class="message">
                        <img src="'. $userImage .'" class="userImage"><p class="messageUserName">'. $userName .'</p>
                        <p class="messages">'. $eachMess['message'] .'</p>
                        </div>
                        <hr>'
                    ;
                }

            } else {
                echo "No messages found.";
}
?>