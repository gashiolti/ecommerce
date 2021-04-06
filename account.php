<?php

    include 'includes/templates/nav.php';

    if(isset($_SESSION['userID'])) {

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $country = $_POST['country'];
            $zip = $_POST['zip'];

            // require_once 'dbh.inc.php';
            // require_once 'functions.inc.php';

            updateInfo($conn, $name, $lname, $age, $gender, $address, $city, $country, $zip);
            echo "<script>window.location.href='account.php';</script>";
            // header("location: account.php");
        } 

        if(isset($_POST['submit2'])) {
            $email = $_POST['email'];

            updateEmail($conn, $email);
            echo "<script>window.location.href='account.php';</script>";
        }
        
        if(isset($_POST['submit3'])) {
            $phoneNr = $_POST['phonenumber'];

            updatePhoneNumber($conn, $phoneNr);
            echo "<script>window.location.href='account.php';</script>";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/account.css">
    <link rel="stylesheet" href="fontawesome/css/all.css"> 
    <script src="JS/popup.js"></script>
    <title>Account</title>
</head>
<body>
    

    <div class="col-100">

        <?php

            $userID = $_SESSION['userID'];
            // $sql = "SELECT u.email, u.fname, u.last_name, p.*
            //         FROM user_ u, personal_info p
            //         WHERE u.userID = p.userID AND u.userID = ?";
            $sql = "SELECT u.email, u.fname, u.last_name, p.age, p.gender, p.adress, p.city, p.country, p.postal_code, p.phone_nr 
                    FROM user_ u, personal_info p 
                    WHERE u.userID = p.userID AND u.userID = ?";

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "idk what's wrong in here...";
                exit();
            }

            mysqli_stmt_bind_param($stmt, "i", $userID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $email, $fname, $lastname, $age, $gender, $address, $city, $country, $postalCode, $phonenr);
            while(mysqli_stmt_fetch($stmt)) {
                displayInfo($conn, $email, $fname, $lastname, $age, $gender, $address, $city, $country, $postalCode, $phonenr);
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);


        ?>
    </div>

    <div class="edit1">
        <div class="form-wrapper" id="form-wrapper">
            <form action="account.php" method="POST">
                <div class="edit-input-button">
                    <button id="exitForm"><i class="fas fa-times-circle"></i></button>
                </div>
                <div class="edit-input">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div class="edit-input">
                    <label for="lname">Last Name: </label>
                    <input type="text" name="lname" id="lname" placeholder="Last Name">
                </div>
                <div class="edit-input">
                    <label for="age">Age: </label>
                    <input type="number" name="age" id="age" placeholder="18">
                </div>
                <div class="edit-input">
                    <label for="gender">Gender: </label>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="edit-input">
                    <label for="address">Address: </label>
                    <input type="text" name="address" id="address" placeholder="Address">
                </div>
                <div class="edit-input">
                    <label for="city">City: </label>
                    <input type="text" name="city" id="city" placeholder="City">
                </div>
                <div class="edit-input">
                    <label for="country">Country: </label>
                    <input type="text" name="country" id="country" placeholder="Country">
                </div>
                <div class="edit-input">
                    <label for="zip">Zip: </label>
                    <input type="text" name="zip" id="zip" placeholder="123">
                </div>
                <div class="edit-input">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
        </div>
    </div>

    <div class="edit2">
        <div class="form-wrapper" id="form-wrapper2">
            <form action="account.php" method="POST">
                <div class="edit-input-button">
                    <button id="exitForm"><i class="fas fa-times-circle"></i></button>
                </div>

                <div class="edit-input">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" placeholder="Email">
                </div>
                
                <div class="edit-input">
                    <input type="submit" name="submit2" value="Update">
                </div>
            </form>
        </div>
    </div>

    <div class="edit3">
        <div class="form-wrapper" id="form-wrapper3">
            <form action="account.php" method="POST">
                <div class="edit-input-button">
                    <button id="exitForm"><i class="fas fa-times-circle"></i></button>
                </div>
                
                <div class="edit-input">
                    <label for="phonenumber">Phone nr: </label>
                    <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number">
                </div>
                
                <div class="edit-input">
                    <input type="submit" name="submit3" value="Update">
                </div>
            </form>
        </div>
    </div>

</body>
</html>
    
<?php

include 'includes/templates/footer.php';


} else {
    echo "<script>window.location = 'index.php'</script>";
}
?>