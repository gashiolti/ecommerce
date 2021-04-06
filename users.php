
<?php

    include_once 'includes/templates/adminheader.php';
    include_once 'includes/templates/adminnav.php';

?>


    <main>
        <div class="title">
            <h2><i class="fa fa-users"></i> Users</h2>

            <!-- OPTIONAL -->
            <!-- <a href=""><i class="fas fa-plus"></i> Add Product</a> -->
        </div>
        <div class="table">
            <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "userupdatedsuccessfully") {
                            echo "<p class='alert-display'>User updated successfully!</p>";
                        } 
                        else if($_GET["error"] == "userdeletedsuccessfully") {
                            echo "<p class='alert-display'>User deleted successfully!</p>";
                        }
                    }
                ?>
            </div>
            <table class="tableInfo">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                $sql = "SELECT * FROM user_";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['userID'];
                    $email = $row['email'];
                    $password = $row['password_'];
                    $fname = $row['fname'];
                    $lname = $row['last_name'];
                    $roleID = $row['roleID'];
                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$email</td>
                            <td>$password</td>
                            <td>$fname</td>
                            <td>$lname</td>
                            <td>$roleID</td>
                            <td><a href='edituser.php?userid=$id'><i class='fas fa-edit'></i></a></td>
                            <td><a href='includes/userdelete.inc.php?userid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
                ?>
                <!-- <tr>
                    <td>filan@gmail.com</td>
                    <td>filan123</td>
                    <td>Filan</td>
                    <td>Fisteku</td>
                    <td>1</td>
                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                    <td><a href=""><i class="fas fa-trash"></i></a></td>
                </tr> -->
            </table>
        </div>
    </main>
