<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

    if(isset($_GET['companyid'])) {
        $id = $_GET['companyid'];
    }

    $sql = "SELECT company.* FROM company WHERE name = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
            header("location: ../signup.php?error=stmtfailed");
            exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        $categoryName = $row['name'];
        $filePath = $row['fname'];
    } 

    mysqli_stmt_close($stmt);

?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                <i class='fas fa-edit'></i> EDIT COMPANY
                </div>

                
                <form action="includes/companyupdate.inc.php?companyid=<?php echo $id ?>" method="POST">
                    <!-- <div class="error-message">
                        <?php
                            // if(isset($_GET["error"])) 
                            // {
                            //     if($_GET["error"] == "uploadsuccess") {
                            //         echo "<p class='alert-display'>Category updated successfully!</p>";
                            //     }
                            // }
                        ?>
                    </div> -->

                    <div class="sec_input_field">
                        <label>Company name:</label>
                        <input type="text" name="category" class="input" placeholder="<?php echo $categoryName; ?>"  />
                    </div>
                    <div class="sec_input_field">
                    <label>Image: </label>
                        <input type="file" name="file" class="input" value="<?php echo $filePath; ?>" />
                    </div>
                    
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "emptyinputs") {
                                    echo "<p class='error-display'>Please fill the field!</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class="sec_input_field addimage">
                        <input type="submit" name="submit" value="EDIT" class="btn">
                    </div>
                </form>
            </div>    
        </section>



</body>
</html>
