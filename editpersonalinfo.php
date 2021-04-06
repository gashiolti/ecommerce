<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

    if(isset($_GET['userid'])) {
        $id = $_GET['userid'];
    }

    $sql = "SELECT * FROM personal_info WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
            header("location: ../signup.php?error=stmtfailed");
            exit();
    }


    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        $age = $row['age'];
        $gender = $row['gender'];
        $address = $row['adress'];
        $city = $row['city'];
        $country = $row['country'];
        $postal_code = $row['postal_code'];
        $phone_nr = $row['phone_nr'];
    } 

    mysqli_stmt_close($stmt);

?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class="fas fa-user"></i> EDIT USER DETAILS
                </div>

                
                <form action="includes/personalinfoupdate.inc.php?userid=<?php echo $id ?>" method="POST">

                    <div class="sec_input_field">
                        <label>Age</label>
                        <input type="number" name="age" class="input" value="<?php echo $row['age']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Gender</label>
                        <div class="custom_select">
                            <select name="gender" id="">
                                <option value=""><?php echo $row['gender']?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="sec_input_field">
                        <label>Address</label>
                        <textarea name="adress" class="textarea" rows="3" cols="34"><?php echo $row['adress']?></textarea>
                    </div>
                    <div class="sec_input_field">
                        <label>City</label>
                        <input type="text" name="city" class="input" value="<?php echo $row['city']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Country</label>
                        <input type="text" name="country" class="input" value="<?php echo $row['country']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Postal Code</label>
                        <input type="text" name="postalcode" class="input" value="<?php echo $row['postal_code']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Phone Number</label>
                        <input type="text" name="pnumber" class="input" value="<?php echo $row['phone_nr']?>">
                    </div>
                    
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "emptyinputs") {
                                    echo "<p class='error-display'>Please fill all the fields!</p>";
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
