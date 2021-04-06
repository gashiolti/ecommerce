
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-receipt"></i> Order Details</h2>

        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Product</a> -->
    </div>
    <div class="table">
        <table class="tableInfo">
            <tr>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Date ordered</th>
            </tr>
            <?php
                $sql = "SELECT * FROM order_details";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['orderID'];
                    $productID = $row['productID'];
                    $quantity = $row['quantity'];
                    $dateOrdered = $row['date_ordered'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$productID</td>
                            <td>$quantity</td>
                            <td>$dateOrdered</td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>filan@gmail.com</td>
                <td>filan123</td>
                <td>Filan</td>
                <td>Fisteku</td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
