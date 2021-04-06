<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';


?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class="fas fa-plus-circle"></i> Add Category
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
                        <label>Category name:</label>
                        <input type="text" name="prdname" class="input">
                    </div>
                    

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
                    
                    <div class="sec_input_field addimage">
                        <input type="submit" name="submit" value="Add Product" class="btn">
                    </div>
                </form>
            </div>    
        </section>



</body>
</html>