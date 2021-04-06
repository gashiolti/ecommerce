
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-truck"></i> Orders Tracking</h2>

        <!-- OPTIONAL -->
        <!-- <a href="addproduct.php"><i class="fas fa-plus-circle"></i> Add Product</a> -->
    </div>
        <div class="table">
            <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "orderstatusupdated") {
                            echo "<p class='alert-display'>Order status updated successfully!</p>";
                        } 
                    }
            ?>
        <table class="tableInfo">
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php
                $sql = "SELECT t.*, u.fname, u.last_name FROM tracking t, user_ u WHERE t.userID = u.userID";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $userName = $row['fname'];
                    $userLastName = $row['last_name'];
                    $orderID = $row['orderID'];
                    $date = $row['time_stamp'];
                    $status = $row['status'];
                    $statusInString;

                    if($status == 1) {
                        $statusInString = "Pending";
                    } 
                    else if ($status == 2) {
                        $statusInString = "In Transit";
                    }
                    else {
                        $statusInString = "Completed";
                    }
                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$orderID</td>
                            <td>$userName $userLastName</td>
                            <td>$date</td>
                            <td>$statusInString</td>
                            <td><a href='edittracking.php?orderid=$orderID'><i class='fas fa-edit'></i></a></td>
                            <td><a href='includes/productdelete.inc.php?orderid=$orderID'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>12345</td>
                <td>Iphone 12 PRO</td>
                <td>1299.99</td>
                <td>6</td>
                <td>Smart Phone</td>
                <td>Apple</td>
                <td><a href=""><i class="fas fa-edit"></i></a></td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
