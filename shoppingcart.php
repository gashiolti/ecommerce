
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-shopping-cart"></i> ShoppingCart</h2>

        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Product</a> -->
    </div>
    <div class="table">
        <table class="tableInfo">
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Delete</th>
            </tr>

            <?php
                $sql = "SELECT * FROM shoppingcart";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['shcID'];
                    $userID = $row['userID'];
                    $prdID = $row['productID'];
                    $quantity = $row['quantity'];
                    
                    echo "<tr>
                            <td>$id</td>
                            <td>$userID</td>
                            <td>$prdID</td>
                            <td>$quantity</td>
                            <td><a href=''><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>1</td>
                <td>123</td>
                <td>12345</td>
                <td>2</td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
