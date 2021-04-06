<?php
    include 'includes/templates/nav.php';
?>

<div class="wrapper-center">
    
    <div class="reg-wrapper">
        <div class="title">
            Register
        </div>
        <div class="form">
            <form action="includes/signup.inc.php" method="POST" autocomplete="on">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" name="name" class="input">
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="input">
                </div>
                <div class="input_field">
                    <label>Email</label>
                    <input type="email" name="email" class="input">
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" name="pwd" class="input">
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" name="pwdrepeat" class="input">
                </div>
                <div class="input_field">
                    <label>Age</label>
                    <input type="number" name="age" class="input">
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_select">
                        <select name="gender" id="">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="input_field">
                    <label>Address</label>
                    <textarea name="adress" class="textarea"></textarea>
                </div>
                <div class="input_field">
                    <label>City</label>
                    <input type="text" name="city" class="input">
                </div>
                <div class="input_field">
                    <label>Country</label>
                    <input type="text" name="country" class="input">
                </div>
                <div class="input_field">
                    <label>Postal Code</label>
                    <input type="text" name="postalcode" class="input">
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" name="pnumber" class="input">
                </div>
                <div class="input_field terms">
                    <label for="" class="check">
                        <input type="checkbox" name="terms">
                    </label>
                    <p>Agree to terms and conditions</p>
                </div>
                <div class="error-message">
                    <?php
                        if(isset($_GET["error"])) 
                        {
                            if($_GET["error"] == "emptyinputs") {
                                echo "<p style='color: red; font-size: 14px'>Please fill all the fields!</p>";
                            }
                            else if($_GET["error"] == "invalidemail") {
                                echo "<p style='color: red; font-size: 14px'>The given email is not valid!</p>";
                            }
                            else if($_GET["error"] == "passwordsdontmatch") {
                                echo "<p style='color: red; font-size: 14px'>The given passwords don't match!</p>";
                            }
                            else if($_GET["error"] == "passwordtooshort") {
                                echo "<p style='color: red; font-size: 14px'>The given password is too short. Please choose a longer one!</p>";
                            }
                            else if($_GET["error"] == "emailtaken") {
                                echo "<p cstyle='color: red; font-size: 14px'>The given email email already exists. Please choose another one!</p>";
                            }
                            else if($_GET["error"] == "youdidntaccepttermsandservices") {
                                echo "<p style='color: red; font-size: 14px'>Please accept our terms and services!</p>";
                            }
                            else if($_GET["error"] == "errornone") {
                                echo "<p style='color: red; font-size: 14px'>You have successfully signed up!</p>";
                            }
                        }
                    ?>
                </div>
                <div class="input_field">
                    <input type="submit" name="submit" value="Sign Up" class="btn">
                </div>
            </form>
        </div>
    </div>

</div>

<?php
    include 'includes/templates/footer.php';
?>