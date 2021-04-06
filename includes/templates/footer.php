<footer>
        <!-- <div class="footer-main"> -->
            <div class="footer-wrapper">
                
                
                <div class="empty"></div>


                <div class="footer-row footer-row-extend">
                    <div class="footer-col">
                        <h4>Contact</h4>
                        <p class="footer-col-p"> 
                            <a href="#">+383 39 835 211</a>
                            <br>
                            <a href="mailto:contact@techguys.com">contact@techguys.com</a>
                            <br>
                            <a href="#">About returning products: 033228188</a>
                        
                        </p>
                    </div>
                    <div class="footer-col">
                        <h4>Customer service</h4>
                        <p>
                            <a href="#">Customer service</a> <br>
                            <a href="#">Transaction Services Agreement</a> <br>
                            <a href="#">Take our feedback survey</a>
                        </p>
                    </div>
                    <?php
                        if(!isset($_SESSION['userID'])):
                    ?>
                    <div class="footer-col">
                        <h4>Account</h4>
                        <p>
                            <a href="login.php">Log in</a> <br>
                            <a href="signup.php">Register</a>
                        </p>
                    </div>
                    <?php endif; ?>
                    <div class="footer-col footerlogo">
                        <div class="footer-logo" onclick="location.href='index.html';" style="cursor: pointer;">
                            <img src="images/logo/LogoWb.png" alt="Logo" width="100px">
                        </div>
                    </div>
                </div>


                <div class="empty"></div>


                <div class="footer-row row-2">
                    <div class="payment-div">
                        <span style="color: aliceblue; padding-right: 25px; font-size: 15px; margin: auto;">Payment method</span>
                        <img src="images/icons/paymentIcons/iconfinder_payment_method_card_visa_206684.svg" alt="VISA">
                        <img src="images/icons/paymentIcons/iconfinder_payment_method_master_card_206680.svg" alt="MasterCard">
                        <!-- <img src="images/icons/paymentIcons/iconfinder_maestro_card_payment_358103.svg" alt="MaestroCard"> -->
                        <img src="images/icons/paymentIcons/iconfinder_payment_method_paypal_206675.svg" alt="Paypal">
                        <img src="images/icons/paymentIcons/iconfinder_payment_method_western_union_206677.svg" alt="WesterUnion">
                        <!-- <img src="images/icons/paymentIcons/cashonhand.png" alt="CashOnHand" style="border: 1px solid white; border-radius: 5px"> -->
                    </div>

                    <div class="socialMedia-div">
                        <span style="color: aliceblue; font-size: 15px;">Stay connected</span>
                        <img src="images/icons/socialMediaIcons/facebook.svg" alt="Facebook" class="footer-col3-images"  onclick="location.href='#';" style="cursor: pointer;">
                        <img src="images/icons/socialMediaIcons/instagram.svg" alt="Instagram"  class="footer-col3-images"  onclick="location.href='#';" style="cursor: pointer;">
                        <img src="images/icons/socialMediaIcons/twitter.svg" alt="Twitter" class="footer-col3-images"  onclick="location.href='#';" style="cursor: pointer;">
                        <img src="images/icons/socialMediaIcons/youtube.svg" alt="Youtube" class="footer-col3-images"  onclick="location.href='#';" style="cursor: pointer;">
                    </div>
                </div>

                
                <div class="empty" style="margin-bottom: 10;"></div>
            
            
            </div>


        <!-- </div> -->
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2020 TechGuys
            <!-- <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p> -->
    </div>
    <!-- End copyright  -->

    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src="JS/slideShow.js"></script>
    <script src="JS/dropdown.js"></script>
    <script src="JS/chat.js"></script>
    <!-- <script src="JS/submitForm.js"></script> -->
