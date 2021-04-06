<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';


?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class="fas fa-plus-circle"></i> ADD COMPANY
                </div>

                
                <form action="includes/addcompany.inc.php" method="POST" enctype="multipart/form-data">
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
                        <label>Company name:</label>
                        <input type="text" name="name" class="input">
                    </div>
                    
                    <div class="sec_input_field">
                        <label>Logo (OPTIONAL): </label>
                        <input type="file" name="file" class="input" />
                    </div>
                    <div class="error-message">
                    <?php
                        if(isset($_GET["error"])) 
                        {
                            if($_GET["error"] == "emptyinputs") {
                                echo "<p class='error-display'>Please fill field!</p>";
                            }
                        }
                    ?>
                    </div>
                    <div class="sec_input_field addimage">
                        <input type="submit" name="submit" value="ADD" class="btn">
                    </div>
                </form>
            </div>    
        </section>



</body>
</html>