
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-file-invoice"></i> Orders</h2>

        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Product</a> -->
    </div>
    <div class="table">
        <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "orderdeletedsuccessfully") {
                            echo "<p class='alert-display'>Order deleted successfully!</p>";
                        } 
                    }
                ?>
        </div>
        <table class="tableInfo">
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Paid</th>
                <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM order_";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['orderID'];
                    $userID = $row['userID'];
                    $paid = $row['paid'];
                    $paidString;
                    // display($conn, $id, $desc);
                    if($paid == 1) {
                        $paidString = "Yes";
                    }
                    echo "<tr>
                            <td>$id</td>
                            <td>$userID</td>
                            <td>$paidString</td>
                            <td><a href='includes/orderdelete.inc.php?orderid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>filan@gmail.com</td>
                <td>filan123</td>
                <td>Filan</td>
                <td>Fisteku</td>
                <td>1</td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
