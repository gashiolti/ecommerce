<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';


?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class="fas fa-plus-circle"></i> ADD ROLE
                </div>

                
                <form action="includes/role.inc.php" method="POST">
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "uploadsuccess") {
                                    echo "<p class='alert-display'>Role inserted successfully!</p>";
                                }
                            }
                        ?>
                    </div>


                    <div class="sec_input_field">
                        <label>Role name:</label>
                        <input type="text" name="rolename" class="input">
                    </div>
                    

                    <?php
                        if(isset($_GET["error"])) 
                        {
                            if($_GET["error"] == "emptyinputs") {
                                echo "<p class='error-display'>Please fill the field!</p>";
                            }
                        }
                    ?>
                    
                    <div class="sec_input_field addimage">
                        <input type="submit" name="submit" value="ADD" class="btn">
                    </div>
                </form>
            </div>    
        </section>



</body>
</html>