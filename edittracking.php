<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

    if(isset($_GET['orderid'])) {
        $orderID = $_GET['orderid'];
    }

    $sql = "SELECT tracking.status FROM tracking WHERE tracking.orderID = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
            header("location: ../signup.php?error=stmtfailed");
            exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $orderID);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        $status = $row['status'];
        $statusInString;
        if($status == 1) {
            $statusInString = "Pending";
        } 
        else if ($status == 2) {
            $statusInString = "In Transit";
        } 
        else {
            $statusInString = "Completed";
        }
    } 

    mysqli_stmt_close($stmt);

?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class='fas fa-edit'></i> UPDATE TRACKING
                </div>

                
                <form action="includes/trackingupdate.inc.php?orderid=<?php echo $orderID; ?>" method="POST">
        
                    <div class="sec_input_field">
                        <label>Status</label>
                        <div class="custom_select">
                            <select name="status" id="">
                                <option value="1"><?php echo $statusInString; ?></option>
                                <option value="2">In Transit</option>
                                <option value="3">Completed</option>
                            </select>
                        </div>
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
                        <input type="submit" name="submit" value="UPDATE" class="btn">
                    </div>
                </form>
            </div>    
        </section>



</body>
</html>
