<?php

    include 'includes/templates/nav.php';
    
    if(isset($_GET['orderid'])) {
        $orderID = $_GET['orderid'];
    }

?>

    <div class="main-container">
        <div class="container">
            <i class="fas fa-check-circle"></i>

            <h1>Thank You!</h1>

            <p>Your order has been submitted.</p>

            <h4>Your order ID: <?php echo $orderID; ?></h4>

            <a href="index.php">Home Page</a>
        </div>
    </div>
    
<?php

include 'includes/templates/footer.php';

?>