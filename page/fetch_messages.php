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