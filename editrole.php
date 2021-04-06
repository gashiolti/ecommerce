<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

    if(isset($_GET['roleid'])) {
        $roleID = $_GET['roleid'];
    }

    $sql = "SELECT description_ FROM role_ WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
            header("location: ../signup.php?error=stmtfailed");
            exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $roleID);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        $roleName = $row['description_'];
    } 

    mysqli_stmt_close($stmt);

?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class='fas fa-edit'></i> EDIT ROLE
                </div>

                
                <form action="includes/roleupdate.inc.php?roleid=<?php echo $roleID ?>" method="POST">
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
                        <label>Role name:</label>
                        <input type="text" name="role" class="input" placeholder="<?php echo $roleName; ?>"  />
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
