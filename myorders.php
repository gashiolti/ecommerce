<?php

error_reporting(0);
session_start();

if(isset($_SESSION['userID'])) {

    include 'includes/templates/nav.php';

    $userID = $_SESSION["userID"];

?>

    <div class="wrapper-order">
        <div class="order">
            <h2>My Orders</h2>
            <div class="orders-info">
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Date Ordered</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    <?php 
                        $query = "SELECT o.*, t.time_stamp, t.status, p.total_price
                                FROM order_ o, tracking t, payment p
                                WHERE t.orderID = o.orderID AND p.orderID = o.orderID AND o.userID = ?";

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $query)) {
                            echo "Something went wrong with the statement";
                            exit();
                        }

                        mysqli_stmt_bind_param($stmt, "i", $userID);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)) {
                            $orderID = $row['orderID'];
                            $time = $row['time_stamp'];
                            $status = $row['status'];
                            $totalPrice = $row['total_price'];
                            $statusInString;

                            if($status == 1) {
                                $statusInString = "Pending";
                            } else if ($status == 2) {
                                $statusInString = "In Transit";
                            } else {
                                $statusInString = "Completed";
                            }
                    ?>
                    <tr>
                        <td><?php echo $orderID; ?></td>
                        <td><?php echo $time; ?></td>
                        <td><?php echo $statusInString; ?></td>
                        <td>&euro;<?php echo $totalPrice; ?></td>
                        <td><a href="myorderdetails.php?orderid=<?php echo $orderID; ?>">View <i class='fas fa-eye'></i></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="my-info">
                <h2>My Address</h2>
                <?php 
                    $query2 = "SELECT p.adress, p.city, p.country
                                FROM personal_info p
                                WHERE p.userID = ?";
                    $stmt2 = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt2, $query2)) {
                        echo "Something went wrong with statement 2";
                        exit();
                    }

                    mysqli_stmt_bind_param($stmt2, "i", $userID);
                    mysqli_stmt_execute($stmt2);
                    $result = mysqli_stmt_get_result($stmt2);
                    while($row = mysqli_fetch_assoc($result)) {
                        $address = $row['adress'];
                        $city = $row['city'];
                        $country = $row['country'];
                    }
                ?>
                <div class="info-address">
                    <p><?php echo $address . ", " . $city . ", " . $country ?></p>
                    <a href="account.php"><i class="fas fa-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
    
<?php

    include 'includes/templates/footer.php';
    mysqli_close($conn);

} else {
    header("location: login.php");
}
?>