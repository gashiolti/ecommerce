<?php
    session_start();
    require_once 'includes/dbh.inc.php';
    if(isset($_SESSION['userID']) && isset($_SESSION['role'])) {
        if($_SESSION['role'] == 2) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>" type="text/css">
    <script src="JS/dropdown.js"></script>
</head>
<body>

    <!-- TOP -->
    <div class="container">
        
        <div class="wrapper">

            <!-- <div class="header"> -->
                <div class="firstPart-logo">
                    <img src="images/logo/LogoWb.png" alt="Logo" width="100px" onclick="location.href='index.php';" style="cursor: pointer;">
                </div>
                
                    <form action="pageSearch.php" method="POST">
                        <div class="secondPart-searchBar">
                            <div class="searchbar-wrapper">
                                <input type="search" id="search" class="search" name="search" placeholder="What are you looking for?">
                                <!-- <input type="submit" name="submit" class="btn" value="submit"/> -->
                                <button type="submit" name="searchData" class="btn" id="searchData">
                                    <i class="fas fa-search"></i> 
                                </button>
                            </div>
                        </div>
                    </form>

                <div class="thirdPart-logIn">
                    <ul class="thirdPart-list">
                        <li><a href=""><i class="fas fa-bell"></i></a><span class="notification">0</span></a></li>
                        <li><a href="includes/logout.inc.php" id="logout">Log Out <i class="fas fa-sign-out-alt"></i></a></li>
                    </ul>
                </div>
        </div>
    </div>
    
    <div class="chat-wrapper">

        <div class="aside">
            <div class="aside-search">
                <input type="text" name="search" class="asd-search" placeholder="Search by keyword">
                <button type="submit" class="asd-btn"><i class="fas fa-search"></i></button>
            </div>

            <?php

                if(isset($_SESSION['userID'])) {
                    $userID = $_SESSION['userID'];
                }

                // $query = "SELECT DISTINCT
                //                 CASE WHEN to_user_id = ?
                //                     THEN from_user_id
                //                     ELSE to_user_id
                //                 END userID
                //         FROM chat
                //         WHERE ? IN (to_user_id, from_user_id)"; 
                $query ="select T1.user2_id, user_.fname, user_.last_name, max(cmessage) mess, max(cdate) maxDate from
                            (select chat.to_user_id user2_id, max(time_delivered) cdate, max(message) cmessage
                            from chat 
                            where chat.from_user_id = ?
                            group by chat.to_user_id 
                            union distinct
                            (select  chat.from_user_id user2_id, max(time_delivered) cdate, max(message) cmessage
                            from chat  where chat.to_user_id = ?
                            group by chat.from_user_id )) T1
                            inner join user_ on (user_.userID = T1.user2_id)
                            group by T1.user2_id
                            order by maxDate DESC";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $query)) {
                    echo "something went wrong";
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ii", $userID, $userID);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                $output;

                // $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $userID = $row['user2_id'];
                        $userName = $row['fname'];
                        $userLastName = $row['last_name'];
                        $message = $row['mess'];

            ?>

            <a class='userlink' data-custom-value=<?php echo $userID; ?>>
                <div class="aside-people">
                    <div class="asd-img">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <form class='userid'>
                        <input type='hidden' class='incoming_id' name='incoming_id' value='<?php echo $userID; ?>'>
                    </form>
                    <div class="asd-info">
                        <div class="asd-name">
                            <h4><?php echo $userName . " " . $userLastName; ?></h4>
                        </div>
                        <div class="asd-message">
                            <p><?php echo $message; ?></p>
                        </div>
                    </div>
                    <div class="asd-delete">
                        <a href="#"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </a>

            <?php   
                    }
                } ?>

        <div class="main">
            <!-- <div class="main-wrapper"> -->
            <?php include 'includes/getmessageclient.inc.php'; ?>


        

            <!-- <div class="main-top">
                <div class="main-top-img">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <div class="main-top-info">
                    <div class="main-top-name">
                        <h2>Filan Fisteku</h2>
                    </div>
                    <div class="main-top-time">
                        <span>Last Seen: 2/22/2021 12:26</span>
                    </div>
                </div>
                <div class="main-top-call">
                    <i class="fas fa-ellipsis-v"></i>
                    <i class="fas fa-video"></i>
                    <i class="fas fa-phone"></i>
                </div> 
            </div> -->

           
            <!-- <div class="main-bottom"> -->
                <!-- <div class="incoming-message">
                    <div class="messenger-info">
                        <span class="name">Filan Fisteku</span>
                        <span class="time">12:44 Today</span>
                    </div>
                    <div class="arrow"></div>
                    <div class="messenger-message">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, inventore! Commodi inventore dolorum quas. Tempora quam voluptatum accusamus laudantium quas, quidem omnis adipisci commodi id, ullam expedita corrupti dolores quisquam!
                        Quibusdam, veniam eligendi delectus corrupti magni perspiciatis ut quis, nisi eaque odio aspernatur tenetur reiciendis dicta natus laboriosam iste in!
                        </p>
                    </div>
                </div>

                <div class="outgoing-message">
                    <div class="mine-info">
                        <span class="name">Filan Fisteku</span>
                        <span class="time">12:44 Today</span>
                    </div>
                    <div class="arrow"></div>
                    <div class="mine-message">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, inventore! Commodi inventore dolorum quas. Tempora quam voluptatum accusamus laudantium quas, quidem omnis adipisci commodi id, ullam expedita corrupti dolores quisquam!
                            Quibusdam, veniam eligendi delectus corrupti magni perspiciatis ut quis, nisi eaque odio aspernatur tenetur reiciendis dicta natus laboriosam iste in!
                        </p>
                    </div>
                </div>

                <div class="incoming-message">
                    <div class="messenger-info">
                        <span class="name">Filan Fisteku</span>
                        <span class="time">12:44 Today</span>
                    </div>
                    <div class="arrow"></div>
                    <div class="messenger-message">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, inventore! Commodi inventore dolorum quas. Tempora quam voluptatum accusamus laudantium quas, quidem omnis adipisci commodi id, ullam expedita corrupti dolores quisquam!
                        Quibusdam, veniam eligendi delectus corrupti magni perspiciatis ut quis, nisi eaque odio aspernatur tenetur reiciendis dicta natus laboriosam iste in!
                        </p>
                    </div>
                </div>

                <div class="outgoing-message">
                    <div class="mine-info">
                        <span class="name">Filan Fisteku</span>
                        <span class="time">12:44 Today</span>
                    </div>
                    <div class="arrow"></div>
                    <div class="mine-message">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                    </div>
                </div> -->
            <!-- </div> -->

            <!-- <form class='myForm' autocomplete='off'>
                <div class="main-deliver-message">
                    <input type='text' class='sender' name='sender' value='<?php echo $_SESSION['userID']; ?>'>
                    <input type='text' class='receiver' name='receiver' value='<?php echo $userID; ?>'>
                    <button type="submit" name="send" class="img"><i class="fas fa-paperclip"></i></button>
                    <button type="submit" name="send" class="mic"><i class="fas fa-microphone-alt"></i></button>
                    <input type="text" name="message" class="deliver-message" placeholder="Type here...">
                    <button type="submit" name="send" class="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </form>  -->
            <!-- </div>-->
        </div>


    <!-- </div> -->

     <!-- <script src="JS/jquery-3.5.1.js"></script> -->
    <script src="JS/helpagentchat.js"></script> 

</body>
</html>

<?php 
       } 
    //    else {
    //        header("location: login.php");
    //    }
    } 
    else {
        header("location: login.php");
    }

    ?>