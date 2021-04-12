

<?php

error_reporting(0); // hide error messages

    session_start();
    if(isset($_GET['sendingto'])) {
        $receiverID = $_GET['sendingto'];
    }

    if(isset($_SESSION['userID']) && isset($_SESSION['role'])) {
        if($_SESSION['role'] == 2) {

            require_once "dbh.inc.php";
            $output = "";

            $output .= "<div class='main-wrapper' id='main-wrapper'>";
            // $output .= "<div class='header-chat-wrapper' id='header-chat-wrapper'>";

            //SELECTING USER TO CHAT
            $query = "SELECT * FROM user_ WHERE user_.userID = ?";

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $query)) {
                echo "something went wrong in query";
                exit();
            }
            // $userid = 5;
            mysqli_stmt_bind_param($stmt, "i", $receiverID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $firstName = $row['fname'];
                    $lastName = $row['last_name'];

                    $output .= "
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
                                    </div>";
                }
                // echo $output;
            } 
            else {
                $output .= "<div class='main-top'>
                                <h4>Select chat to message</h4>
                            </div>";
            }
            // echo $output;



            $userID = $_SESSION['userID'];
            // $receiverID = $_POST['receiver'];
            if(!empty($_POST['message'])) {
                $message = $_POST['message'];
            }
            
            $output .= "<div class='main-bottom' id='main-bottom'>";   

            
            // WHERE c.to_user_id = u.userID OR c.from_user_id = u.userID AND c.to_user_id = ? ORDER BY c.chatID
            $query2 = "SELECT * FROM chat LEFT JOIN user_ ON user_.userID = chat.to_user_id
                        WHERE (to_user_id = ? AND from_user_id = ?)
                        OR (to_user_id = ? AND from_user_id = ?) ORDER BY chatID";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $query2)) {
                echo "something went wrong";
                exit();
            }

            mysqli_stmt_bind_param($stmt, "iiii", $userID, $receiverID, $receiverID, $userID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) > 0) {
                    
                while($row = mysqli_fetch_assoc($result)) {
                    $message = $row["message"];
                    $time = $row['time_delivered'];
                    $timeStamp = date('h:i A', strtotime($time));
                    if($row['from_user_id'] === $userID) {
                        $output .= "<div class='outgoing-message-wrapper'>
                                <div class='outgoing-message'>
                                        <div class='mine-info'>
                                            <span class='name'>Me</span>
                                            <span class='time'>$timeStamp</span>
                                        </div>
                                        <div class='arrow'></div>
                                        <div class='mine-message'>
                                            <p>$message</p>
                                        </div>
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
                        $output .= "<div class='incoming-message'>
                                        <div class='messenger-info'>
                                            <span class='name'>$firstName $lastName</span>
                                            <span class='time'>$timeStamp</span>
                                        </div>
                                        <div class='arrow'></div>
                                        <div class='messenger-message'>
                                            <p>$message</p>
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
            } 
            // echo $output;
            $output .= "</div>"; //close main-bottom div
            // $output .= "</div>";//close header-chat-wrapper
            $output .= "<form class='myForm' id='myForm' autocomplete='off'>
                            <div class='main-deliver-message'>
                                <input type='hidden' class='sender' name='sender' value='$userID'>
                                <input type='hidden' class='receiver' name='receiver' value='$receiverID'>
                                <button type='submit' name='send' class='img'><i class='fas fa-paperclip'></i></button>
                                <button type='submit' name='send' class='mic'><i class='fas fa-microphone-alt'></i></button>
                                <input type='text' name='message' id='deliver-message' class='deliver-message' placeholder='Type here...'>
                                <button type='submit' name='send' class='send' id='send' onclick='myForm()'><i class='fas fa-paper-plane'></i></button>
                            </div>
                        </form>";
            $output .= "</div>";//close main-wrapper
            echo $output;
        }
    }

    ?>
    <!-- <button type='submit' name='send' class='send'><i class='fa fa-paper-plane' aria-hidden='true'></i></button> -->
    <!-- <input type='submit' class='send' name='send' value='&#xf1d8;' onclick='myForm()'> -->


    <script src="JS/jquery-3.5.1.js"></script>
    <!-- <script src="JS/helpagentchat.js"></script> -->
    <script>

        // const form = document.querySelector(".myForm");
        // const sendingTo = document.querySelector(".receiver").value,
        // inputField = document.querySelector(".deliver-message"),
        // sendBtn = document.querySelector(".send"),
        // chatBox = document.querySelector(".main-bottom");

        // form.onsubmit() = (e) => {
        //     e.preventDefault();
        // }
        

        function myForm() {
            document.getElementById("myForm").onsubmit = function(e) {
                e.preventDefault();
            }

                const form = document.querySelector('.myForm'),
                sendingTo = form.querySelector('.receiver').value,
                inputField = form.querySelector('.deliver-message');
                
                let xhr = new XMLHttpRequest(); //creating XML object
                xhr.open("POST", "includes/sendmessagehelpagent.inc.php?sendingto="+sendingTo, true);
                xhr.onload = ()=>{
                    if(xhr.readyState === XMLHttpRequest.DONE) {
                        if(xhr.status === 200) {
                            inputField.value = "";
                        }
                    }
                }
                // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                // We have to send the form data through ajax to php
                let data = new FormData(form); //creating new formData Object
                xhr.send(data); //sending the form data to php
        }  
        
        
        setInterval(() =>{
            const form = document.querySelector(".myForm"),
            sendingTo = form.querySelector('.receiver').value;
            // var chatBox = document.getElementById("main-bottom");
            var chatBox = document.getElementById("main-wrapper");
            // var getData = document.getElementById("main-bottom").innerHtml;

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "includes/getmessageclient.inc.php", true);
            xhr.onload = () => {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        // console.log(data);
                        chatBox.innerHTML = data;
                        scrollToBottom();
                    }
                }
            }
            // xhr.open("POST", "includes/getmessageclient.inc.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            let formData = new FormData(form);
            xhr.send(formData);
        }, 15000);

        function getMessages() {
            // Prior to getting your messages.
            shouldScroll = chatBox.scrollTop + chatBox.clientHeight === chatBox.scrollHeight;
            if (!shouldScroll) {
                scrollToBottom();
            }
        }

        function scrollToBottom(){
            // chatBox.scrollTop = chatBox.scrollHeight;
            var log = $('#main-bottom');
            log.animate({ scrollTop: log.prop('scrollHeight')}, 1500);
        }


        scrollToBottom();

        setInterval(getMessages, 15000);

        
    </script>
