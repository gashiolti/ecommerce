<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

    if(isset($_GET['userid'])) {
        $id = $_GET['userid'];
    }

    $sql = "SELECT u.*, pi.* 
            FROM user_ u, personal_info pi
            WHERE u.userID = pi.userID AND u.userID = ?";
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
        $email = $row['email'];
    } 

    mysqli_stmt_close($stmt);

?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                    <i class="fas fa-user"></i> EDIT USER
                </div>

                
                <form action="includes/userupdate.inc.php?userid=<?php echo $id ?>" method="POST">
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "uploadsuccess") {
                                    echo "<p class='alert-display'>User updated successfully!</p>";
                                }
                            }
                        ?>
                    </div>

                    <div class="sec_input_field">
                        <label>First Name</label>
                        <input type="text" name="fname" class="input" value="<?php echo $row['fname']; ?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="input" value="<?php echo $row['last_name']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Email</label>
                        <input type="email" name="email" class="input" value="<?php echo $row['email']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Password</label>
                        <input type="password" name="pwd" class="input" value="<?php echo $row['password_']?>" >
                    </div>
                    <div class="sec_input_field">
                        <label>Age</label>
                        <input type="number" name="age" class="input" value="<?php echo $row['age']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Gender</label>
                        <div class="custom_select">
                            <select name="gender" id="">
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
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
                    <div class="sec_input_field">
                        <label>Role</label>
                        <div class="custom_select">
                            <select name="role" id="">
                                <option value="">Select</option>
                                <option value="1">1) Administrator</option>
                                <option value="2">2) Help Agent</option>
                                <option value="3">3) Consumator</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "emptyinputs") {
                                    echo "<p class='error-display'>Please fill all the fields!</p>";
                                }
                                else if($_GET["error"] == "productquantitynegativenumber") {
                                    echo "<p class='error-display'>Please add only non negative number!</p>";
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
