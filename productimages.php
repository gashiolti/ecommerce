
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-images"></i> Images Path</h2>

        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Product</a> -->
    </div>
    <div class="table">
        <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "productimageupdatedsuccessfully") {
                            echo "<p class='alert-display'>Product Image updated successfully!</p>";
                        } 
                    }
                ?>
        </div>
        <table class="tableInfo">
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Path</th>
                <th>Edit</th>
            </tr>

            <?php
                $sql = "SELECT * FROM product_images";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $prdID = $row['product_id'];
                    $filePath = $row['fname'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$prdID</td>
                            <td>$filePath</td>
                            <td><a href=''><i class='fas fa-edit'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>filan@gmail.com</td>
                <td>filan123</td>
                <td>Filan</td>
                <td><a href=""><i class="fas fa-edit"></i></a></td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
