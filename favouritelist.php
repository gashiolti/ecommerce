
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-heart"></i> FavouriteList</h2>

        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Company</a> -->
    </div>
    <div class="table">
            <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "favouritelistdeletedsuccessfully") {
                            echo "<p class='alert-display'>FavouriteList deleted successfully!</p>";
                        } 
                    }
                ?>
            </div>
        <table class="tableInfo">
            <tr>
                <th>FavouriteList ID</th>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM favouritelist";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['flID'];
                    $userID = $row['userID'];
                    $productID = $row['productID'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$userID</td>
                            <td>$productID</td>
                            <td><a href='includes/favouritelistdelete.inc.php?favouritelistid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>filan@gmail.com</td>
                <td>filan123</td>
                <td>filan123</td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
