<?php

    session_start();

    if(isset($_SESSION['userID'])) {

        require_once "dbh.inc.php";
        $userID = $_SESSION['userID'];
        $output = "";

        $query = "SELECT * FROM chat LEFT JOIN user_ ON user_.userID = chat.to_user_id
                    WHERE (to_user_id = ? AND from_user_id = ?)
                    OR (to_user_id = ? AND from_user_id = ?) ORDER BY chatID";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            echo "something went wrong";
            exit();
        }

        $helpagentid = 11;

        mysqli_stmt_bind_param($stmt, "iiii", $userID, $helpagentid, $helpagentid, $userID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $helpAgentName = $row['fname'];
                $helpAgentLName = $row['last_name'];
                $message = $row["message"];
                $time = $row['time_delivered'];
                $timeStamp = date('h:i A', strtotime($time));

                if($row['from_user_id'] === $userID) {
                    echo "<div class='outgoing-chats'>
                            <!-- <div class='outgoing-chats-img'>
                                <img src='images/icons/chat/msg-acc1.png' alt='account image'>
                            </div> -->
                            <div class='outgoing-chats-msg'>
                                    <p>$message</p>
                                    <span class='time'>$timeStamp</span>
                            </div>
                        </div>";
                        // $output .= "<div class='received-chats'>
                        //                     <div class='received-chats-img'>
                        //                         <i class='fas fa-user'></i>
                        //                     </div>
                        //                     <div class='received-msg'>
                        //                         <div class='received-msg-inbox'>
                        //                             <p>$message</p>
                        //                             <span class='time'>$timeStamp</span>
                        //                         </div>
                        //                     </div>
                        //             </div>";
                } else {
                    echo "<div class='received-chats'>
                                    <div class='received-chats-img'>
                                        <i class='fas fa-user'></i>
                                    </div>
                                    <div class='received-msg'>
                                        <div class='received-msg-inbox'>
                                            <p>$message</p>
                                            <span class='time'>$timeStamp</span>
                                        </div>
                                    </div>
                            </div>";
                    // $output .= "<div class='outgoing-chats'>
                    //                 <!-- <div class='outgoing-chats-img'>
                    //                     <img src='images/icons/chat/msg-acc1.png' alt='account image'>
                    //                 </div> -->
                    //                 <div class='outgoing-chats-msg'>
                    //                         <p>$message</p>
                    //                         <span class='time'>$timeStamp</span>
                    //                 </div>
                    //             </div>";
                    
                }
            }
        } else {
            $output .= "<div class='welcome'><p>How may we help you?</p></div>";
        }

        echo $output;

    }