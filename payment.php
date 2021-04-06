
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-euro-sign"></i> Payments</h2>

        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Product</a> -->
    </div>
    <div class="table">
        <div class="error-message">
                <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "paymentdeletedsuccessfully") {
                            echo "<p class='alert-display'>Payment deleted successfully!</p>";
                        } 
                    }
                ?>
        </div>
        <table class="tableInfo">
            <tr>
                <th>Payment ID</th>
                <th>User ID</th>
                <th>Order ID</th>
                <th>Cart Type</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM payment";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['payment_ID'];
                    $userID = $row['userID'];
                    $orderID = $row['orderID'];
                    $cartType = $row['cart_type'];
                    $date = $row['date_'];
                    $price = $row['total_price'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$userID</td>
                            <td>$orderID</td>
                            <td>$cartType</td>
                            <td>&euro;$price</td>
                            <td>$date</td>
                            <td><a href='includes/paymentdelete.inc.php?paymentid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>filan@gmail.com</td>
                <td>filan123</td>
                <td>Filan</td>
                <td>Fisteku</td>
                <td>1</td>
                <td>Done</td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
