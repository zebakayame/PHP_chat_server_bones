<?php
include("sqlConnection.php"); 

            // taking EVERYTHING from the base
            $sql = "SELECT * FROM message";

            // EL result
            $result = mysqli_query($con, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // El loop
                while ($eachMess = mysqli_fetch_assoc($result)) {
                    $sqlGetor = "SELECT * FROM USERS WHERE USERS.id = " . $eachMess['user_id'];
                    $userResult = mysqli_query($con, $sqlGetor);
                    $row = mysqli_fetch_assoc($userResult);
                    $userName = $row["name"];
                    $userImage = $row["image_profile"];
                    $userRole = $row["role"];

                    if($userRole == "KING"){
                        $color = "RED";
                        $role = " [KING]";
                    }else if($userRole == "Queen"){
                        $color = "purple";
                        $role = " [QUEEN]";
                    }else if($userRole == "MODO"){
                        $color = "cyan";
                        $role = " [MODERATOR]";
                    }else{
                        $color = "white";
                        $role = "";
                    }
                    echo 
                        '<div class="message">
                        <img src="'. $userImage .'" class="userImage"><p class="messageUserName" title="'. $userRole .'" style="color: '. $color .';">'
                        . $userName .'#' .$eachMess['user_id']. ' '. $role .'</p>
                        <p class="messages">'. $eachMess['message'] .'</p>
                        </div>
                        <hr>'
                    ;
                }

            } else {
                echo "No messages found.";
}
?>