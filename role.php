
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';


?>


<main>
    <div class="title">
        <h2><i class="fas fa-user-shield"></i> Roles</h2>

        <!-- OPTIONAL -->
        <a href="addrole.php"><i class="fas fa-plus"></i> Add Role</a>
    </div>
    <div class="table">

        <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "uploadsuccess") {
                            echo "<p class='alert-display'>Role inserted successfully!</p>";
                        } 
                        else if($_GET['error'] == "roledeletedsuccessfully") {
                            echo "<p class='alert-display'>Role deleted successfully!</p>";
                        } 
                        else if($_GET['error'] == "roleupdatedsuccessfully") {
                            echo "<p class='alert-display'>Role updated successfully!</p>";
                        } 
                    }
                ?>
        </div>
        <table class="tableInfo">
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM role_";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $desc = $row['description_'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$desc</td>
                            <td><a href='editrole.php?roleid=$id'><i class='fas fa-edit'></i></a></td>
                            <td><a href='includes/roledelete.inc.php?roleid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td><?php  $id?></td>
                <td><?php  $desc?></td>
                <td><a href=''><i class='fas fa-edit'></i></a></td>
                <td><a href=''><i class='fas fa-trash'></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
