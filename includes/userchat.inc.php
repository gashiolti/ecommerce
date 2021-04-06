<?php

    // session_start();


    if(isset($_GET['userid'])) {
        $userid = $_GET['userid'];
    }

    // if(isset($_SESSION['userID'])) {

        require_once 'dbh.inc.php';

        $output = "";
        $query = "SELECT *
                    FROM user_
                    WHERE user_.userID = ?";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            echo "something went wrong in query";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $firstName = $row['fname'];
                $lastName = $row['last_name'];

                $output .= "<div class='main-wrapper'>
                                <div class='main-top'>
                                    <div class='main-top-img'>
                                        <i class='fas fa-user fa-2x'></i>
                                    </div>
                                    <div class='main-top-info'>
                                        <div class='main-top-name'>
                                            <h2>$firstName $lastName</h2>
                                        </div>
                                        <div class='main-top-time'>
                                            <span>Last Seen: 2/22/2021 12:26</span>
                                        </div>
                                    </div>
                                    <div class='main-top-call'>
                                        <i class='fas fa-ellipsis-v'></i>
                                        <i class='fas fa-video'></i>
                                        <i class='fas fa-phone'></i>
                                    </div>
                                </div>
                                
                            ";
            }
            echo $output;
        } else {
            $output = "<div class='main-top'>
                            <h4>Select chat to message</h4>
                        </div>";
            echo $output;
        }

        // header("location: ../helpagentchat.php?userid=$userid");

        // $output = "<div class='main-top'>
        //                 <div class='main-top-img'>
        //                     <i class='fas fa-user fa-2x'></i>
        //                 </div>
        //                 <div class='main-top-info'>
        //                     <div class='main-top-name'>
        //                         <h2>$firstName $lastName</h2>
        //                     </div>
        //                     <div class='main-top-time'>
        //                         <span>Last Seen: 2/22/2021 12:26</span>
        //                     </div>
        //                 </div>
        //                 <div class='main-top-call'>
        //                     <i class='fas fa-ellipsis-v'></i>
        //                     <i class='fas fa-video'></i>
        //                     <i class='fas fa-phone'></i>
        //                 </div>
        //             </div>";

                    // echo $output;
                    // return $userid;
    // }
                

    