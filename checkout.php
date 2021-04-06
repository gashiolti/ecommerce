<?php

error_reporting(0);
session_start();

if(isset($_SESSION['userID'])) {


    include 'includes/templates/nav.php';


    $userID = $_SESSION['userID'];
?>


    <div class="col-100" style="background-color: white;">

        <div class="col-83">

            <div class="col-75">
                <form action="includes/order.inc.php?userid=<?php echo $userID?>" method="POST">
                    <div class="container">

                        <div class="container-info1">

                            <h3>Payment <i class="fas fa-money-check-alt"></i></h3>
                             <div class="creditCard">
                                <div class="cardimgs">
                                    <img src="images/icons/paymentIcons/iconfinder_payment_method_card_visa_206684.svg" alt="Visa" width="90px" height="50px">
                                    <img src="images/icons/paymentIcons/iconfinder_payment_method_master_card_206680.svg" alt="Visa" width="90px" height="50px">
                                    <img src="images/icons/paymentIcons/iconfinder_payment_method_western_union_206677.svg" alt="Visa" width="90px" height="50px">
                                    <img src="images/icons/paymentIcons/iconfinder_payment_method_paypal_206675.svg" alt="Visa" width="90px" height="50px">
                                </div>
                                <div class="cardsName">
                                    <div class="inputcard">
                                        <input type="radio" value="Visa" name="radio" id="visa" />Visa
                                    </div>
                                    <div class="inputcard">
                                        <input type="radio" value="Mastercard" name="radio" id="mastercard" />MsCard
                                    </div>
                                    <div class="inputcard">
                                        <input type="radio" value="Westernunion" name="radio" id="westernunion" />WsUnion
                                    </div>
                                    <div class="inputcard">
                                        <input type="radio" value="Paypal" name="radio" id="paypal" />Paypal
                                    </div>
                                </div>
                             </div>
                              
                             <label for="cname"><i class="fas fa-credit-card"></i>Cardholder's name</label>
                             <input type="text" id="cname" name="cardname" placeholder="John Done">

                             <label for="ccnum"><i class="fas fa-credit-card"></i>Credit Card</label>
                             <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">

                             <!-- <label for="expmonth">Exp Month</label>
                             <input type="text" id="expmonth" name="expmonth" placeholder="June"> -->

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear"><i class="fas fa-credit-card"></i>Card Exp.</label>
                                    <input type="text" id="expyear" name="cardexp" placeholder="08/22">
                                </div>
                                <div class="col-50">
                                    <label for="cvv"><i class="fas fa-credit-card"></i>CVV</label>
                                    <input type="text" id="cvv" name="cardcvv" placeholder="123">
                                </div>
                            </div>
                            <!-- <div class="check" style="margin-bottom: 15px;">
                                <input type="checkbox" name="agree" id="agree"><b> Use your personal information about shipping infos</b> 
                            </div> -->
                        </div>
                        <!-- <div class="container-error">
                            <span>Please tick the box, othervise you can't purchase the order!</span>
                        </div> -->
                        <div class="error-message">
                                <?php
                                    if(isset($_GET["error"])) 
                                    {
                                        if($_GET["error"] == "emptyinputs") {
                                            echo "<p style='color: red; font-size: 14px'>Please fill all the fields!</p>";
                                        }
                                        else if($_GET["error"] == "nocardselected") {
                                            echo "<p style='color: red; font-size: 14px'>No card selected!</p>";
                                        }
                                        else if($_GET["error"] == "cardlength") {
                                            echo "<p style='color: red; font-size: 14px'>Card should contain only 16 numbers!</p>";
                                        }
                                        else if($_GET["error"] == "cardexplength") {
                                            echo "<p style='color: red; font-size: 14px'>Card Exp. should contain only 4 numbers!</p>";
                                        }
                                        else if($_GET["error"] == "cardcvvlength") {
                                            echo "<p style='color: red; font-size: 14px'>CVV should contain only 3 numbers!</p>";
                                        }
                                    }
                                ?>
                        </div>
                        <input type="submit" name="submit" class="submit" value="Place Order">
                    </div>

                </form>

            </div>

            <div class="col-25">
                <div class='container'>
                    <?php
                        $numOfPrds = numOfPrds($conn, $_SESSION["userID"]);
                        $totalPrice = totalPrice($conn, $_SESSION["userID"]);

                        echo "<h4>Card Items<span style='color: black;'><i class='fas fa-shopping-cart'></i><b>$numOfPrds</b></span></h4>";
                        // $userID = $_SESSION['userID'];
                        $sql = "SELECT p.product_name, p.price, shp.quantity
                                FROM user_ u, product p, shoppingCart shp
                                WHERE u.userID = shp.userID AND p.productID = shp.productID AND shp.userID = ?;";
            
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "idk what's wrong in here...";
                            exit();
                        }
                        mysqli_stmt_bind_param($stmt, "i", $userID);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $prdname, $price, $quantity);
                        while(mysqli_stmt_fetch($stmt)) {
                            cartItems($prdname, $price, $quantity);
                        }
                        mysqli_stmt_close($stmt);

                        echo "<h4 id='price'>Total price: <span id='price'>$totalPrice &#128;</span></h4>";
                    ?>
                </div>

                <div class="container">
                    <?php
                        $query = "SELECT u.fname, u.last_name, p.*
                                    FROM user_ u, personal_info p
                                    WHERE p.userID = u.userID AND p.userID = ?";
                        $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $query)) {
                            echo "Something went wrong";
                            exit();
                        }

                        mysqli_stmt_bind_param($stmt, "i", $userID);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result)) {
                            $firstName = $row['fname'];
                            $lastName = $row['last_name'];
                            $address = $row['adress'];
                            $city = $row['city'];
                            $country = $row['country'];
                            $phoneNumber = $row['phone_nr'];
                        }
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                    ?>
                    <p id='deliverto'>Deliver to</p>
                    <p class='info'><?php echo $firstName . " " . $lastName; ?></p>
                    <p class='info'><?php echo $address; ?></p>
                    <p class='info'><?php echo $city; ?></p>
                    <p class='info'><?php echo $country; ?></p>
                    <p class='info'><?php echo $phoneNumber; ?></p>
                    <a href="account.php">Change Adress</a>
                </div>
                <!-- <div class="container">
                    <h4>Card <span style="color: black;"><i class="fas fa-shopping-cart"></i><b>4</b></span></h4>
                    <p style="color: black;">IPHONE <span>1400&euro;</span></p>
                    <p>SAMSUNG <span>1000&euro;</span></p>
                    <p>ONE 8 PLUS <span>900&euro;</span></p>
                    <p>GOOGLE PIXEL 5 <span>700&euro;</span></p>
                    <hr>
                    <p>Total: <span style="color: black;"><b>4000&euro;</b></span></p>
                </div> -->
            </div>
        </div>
    </div>

</body>
</html>

<?php

include 'includes/templates/footer.php';

} else {
    header("location: login.php");
}

?>
