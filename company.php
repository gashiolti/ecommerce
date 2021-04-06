
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-building"></i></i> Company</h2>

        <!-- OPTIONAL -->
        <a href="addcompany.php"><i class="fas fa-plus"></i> Add Company</a>
    </div>
    <div class="table">
        <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "companyaddedsuccessfully") {
                            echo "<p class='alert-display'>Company added successfully!</p>";
                        } 
                        else if($_GET["error"] == "companyupdatedsuccessfully") {
                            echo "<p class='alert-display'>Company updated successfully!</p>";
                        }
                        else if($_GET["error"] == "companydeletedsuccessfully") {
                            echo "<p class='alert-display'>Company deleted successfully!</p>";
                        }
                    }
                ?>
        </div>
        <table class="tableInfo">
            <tr>
                <th>Name</th>
                <th>Image's path</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM company";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $fileName = $row['fname'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$name</td>
                            <td>$fileName</td>
                            <td><a href='editcompany.php?companyid=$name'><i class='fas fa-edit'></i></a></td>
                            <td><a href='includes/companydelete.inc.php?companyid=$name'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>filan@gmail.com</td>
                <td>filan123</td>
                <td><a href=""><i class="fas fa-edit"></i></a></td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
