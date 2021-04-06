<?php

    include_once 'includes/templates/adminheader.php';
    include_once 'includes/templates/adminnav.php';

?>

<main>
    <div class="title">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> Category</h2>


        <!-- OPTIONAL -->
        <a href="addcategory.php"><i class="fas fa-plus"></i> Add Category</a>
    </div>
    <div class="table">
        <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "categoryupdatedsuccessfully") {
                            echo "<p class='alert-display'>Category updated successfully!</p>";
                        } 
                        else if($_GET["error"] == "userdeletedsuccessfully") {
                            echo "<p class='alert-display'>User deleted successfully!</p>";
                        }
                    }
                ?>
        </div>
        <table class="tableInfo">
            <tr>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['category_name'];
                    
                    echo "<tr>
                            <td>$id</td>
                            <td><a href='editcategory.php?categoryid=$id'><i class='fas fa-edit'></i></a></td>
                            <td><a href='inlcudes/categorydelete.inc.php?categoryid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                    }
            ?>
            <!-- <tr>
                <td>Computer</td>
                <td><a href=''><i class='fas fa-edit'></i></a></td>
                <td><a href=''><i class='fas fa-trash'></i></a></td>
            </tr> -->
        </table>
    </div>
</main>