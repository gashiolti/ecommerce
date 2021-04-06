<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';


?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class="fas fa-plus-circle"></i> Add Product
                </div>

                
                <form action="addproduct.inc.val.php" method="POST" enctype="multipart/form-data">
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "uploadsuccess") {
                                    echo "<p class='alert-display'>Product inserted successfully!</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class="sec_input_field">
                        <label>Product name:</label>
                        <input type="text" name="prdname" class="input">
                    </div>
                    <div class="sec_input_field">
                        <label>Price:</label>
                        <input type="number" name="prdprice" step=".01" class="input">
                    </div>
                    <div class="sec_input_field">
                        <label>Quantity:</label>
                        <input type="number" name="prdquantity" class="input">
                    </div>
                    <div class="sec_input_field">
                        <label>Category: </label>
                        <div class="custom_select">
                            <!-- <select name="category" id=""> -->
                            <select name="category" id="">
                                <option value="">Select</option>
                                <option value="Computer">Computer</option>
                                <option value="Laptop">Laptop</option>
                                <option value="SmartPhone">SmartPhone</option>
                                <option value="Monitor">Monitor</option>
                                <option value="Console">Console</option>
                                <option value="TV">TV</option>
                                <option value="SmartWatch">SmartWatch</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                        </div>
                    </div>
                    <div class="sec_input_field">
                        <label>Company: </label>
                        <div class="custom_select">
                            <select name="company" id="">
                                <option value="">Select</option>
                                <option value="Apple">Apple</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Google">Google</option>
                                <option value="Huawei">Huawei</option>
                                <option value="Xiaomi">Xiaomi</option>
                                <option value="OnePlus">OnePlus</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Xbox">Xbox</option>
                                <option value="PlayStation">PlayStation</option>
                                <option value="HP">HP</option>
                                <option value="Dell">Dell</option>
                                <option value="Asus">Asus</option>
                                <option value="Acer">Acer</option>
                                <option value="LogiTech">LogiTech</option>
                            </select>
                        </div>
                    </div>
                    <div class="sec_input_field">
                        <label>Image: </label>
                        <input type="file" name="file" class="input" />
                    </div>
                    <div class="error-message">
                    <?php
                        if(isset($_GET["error"])) 
                        {
                            if($_GET["error"] == "emptyinputs") {
                                echo "<p class='error-display'>Please fill all the fields!</p>";
                            }
                            else if($_GET["error"] == "priceisnotindecimal") {
                                echo "<p class='error-display'>Please use decimal point when adding price!</p>";
                            }
                            else if($_GET["error"] == "productquantitynegativenumber") {
                                echo "<p class='error-display'>Please add only non negative number!</p>";
                            }
                        }
                    ?>
                    </div>
                    <div class="sec_input_field addimage">
                        <input type="submit" name="submit" value="Add Product" class="btn">
                    </div>
                </form>
            </div>    
        </section>



</body>
</html>