<?php

    include_once 'includes/templates/adminheader.php';
    include_once 'includes/templates/adminnav.php';

?>

<main>
    <div class="title">
        <h2><i class="fas fa-comment"></i> Category</h2>


        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Category</a> -->
    </div>
    <div class="table">
        <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "chatdeletedsuccessfully") {
                            echo "<p class='alert-display'>Chat deleted successfully!</p>";
                        } 
                    }
                ?>
        </div>
        <table class="tableInfo">
            <tr>
                    <th>Chat ID</th>
                    <th>Help Agent</th>
                    <th>User ID</th>
                    <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM chat";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['chatID'];
                    $helpagent = $row['help_agent'];
                    $userID = $row['userID'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$helpagent</td>
                            <td>$userID</td>
                            <td><a href='includes/chatdelete.inc.php?chatid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                    <td>123</td>
                    <td>Agent</td>
                    <td>12345</td>
                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                    <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>