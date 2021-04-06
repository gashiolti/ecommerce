<?php

    include 'includes/templates/nav.php';

    if(isset($_GET['orderid'])) {
        $orderID = $_GET['orderid'];
    }

    $query = "SELECT od.date_ordered FROM order_details od WHERE od.orderID = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "something went wrong with the statement";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $orderID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)) {
        $date = $row['date_ordered'];
    }

?>

    <div class="orderdetails-wrapper">
        <div class="orderdetails-main">
            <h2>Order Details</h2>

            <div class="orderdetails-info">
                <div class="orderdetails-date">
                    <span>Date</span>
                    <p><?php echo $date; ?></p>
                </div>
                <div class="orderdetails-orderid">
                    <span>Order ID</span>
                    <p><?php echo $orderID; ?></p>
                </div>
            </div>

            <div class="orderdetails-product">
                <?php 
                    $query2 = "SELECT od.*, p.price, p.product_name
                                FROM order_details od, product p
                                WHERE od.productID = p.productID AND od.orderID = ?";
                    $stmt2 = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt2, $query2)) {
                        echo "something went wrong with the statement 2";
                        exit();
                    }
                
                    mysqli_stmt_bind_param($stmt2, "i", $orderID);
                    mysqli_stmt_execute($stmt2);
                    $result = mysqli_stmt_get_result($stmt2);
                    while($row = mysqli_fetch_assoc($result)) {
                        $name = $row['product_name'];
                        $price = $row['price'];
                        
                ?>
                <div class="orderdetails-product-info">
                    <div class="orderdetails-product-info-name">
                        <p><?php echo $name; ?></p>
                        <p>Shipping</p>
                    </div>
                    <div class="orderdetails-product-info-price">
                        <p>&euro;<?php echo $price; ?></p>
                        <p>&euro;0.00</p>
                    </div>
                </div>
                <?php  
                    }

                    $query3 = "SELECT p.total_price, t.status
                                FROM payment p, order_ o, tracking t
                                WHERE p.orderID = o.orderID AND t.orderID = o.orderID AND o.orderID = ?";
                    $stmt3 = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt3, $query3)) {
                        echo "Something went wrong with stmt 3";
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt3, "i", $orderID);
                    mysqli_stmt_execute($stmt3);
                    $result = mysqli_stmt_get_result($stmt3);
                    while($row = mysqli_fetch_assoc($result)) {
                        $price = $row['total_price'];
                        $status = $row['status'];
                    }
                ?>
                <div class="orderdetails-product-totalprice">
                    <span>&euro;<?php echo $price; ?></span>
                </div>
            </div>

            <div class="orderdetails-tracking">
                <h2>Tracking Order</h2>
                <input type="hidden" name='status' class="status" value="<?php echo $status; ?>">
                <div class="tracking-bar">
                    <ul class="progressbar">
                        <li class='active'>Order Placed</li>
                        <li id='li2'>In Transit</li>
                        <li id='li3'>Completed</li>
                    </ul>
                </div>
            </div>

            <div class="orderdetails-buttons">
                <a href="myorders.php"><i class="fas fa-arrow-left"></i> Go Back</a>
                <a href="index.php">HomePage</a>
            </div>
        </div>
        
    </div>

    <script>
        var status = document.querySelector(".status").value,
        li2 = document.querySelector(".li2"),
        li3 = document.querySelector(".li3");
        console.log(status);

        if(status == 2) {
            document.getElementById("li2").className = "active";
        }

        if(status == 3) {
            document.getElementById("li2").className = "active";
            document.getElementById("li3").className = "active";
        }
    </script>
    
<?php

    include 'includes/templates/footer.php';

?>