
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fas fa-info-circle"></i> User Details</h2>

        <!-- OPTIONAL -->
        <!-- <a href=""><i class="fas fa-plus"></i> Add Product</a> -->
    </div>
    <div class="table">
        <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "userdetailsupdatedsuccessfully") {
                                    echo "<p class='alert-display'>User details updated successfully!</p>";
                                }
                            }
                        ?>
        </div>
        <table class="tableInfo">
            <tr>
                <th>User ID</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Postal Code</th>
                <th>Phone Number</th>
                <th>Edit</th>
            </tr>

            <?php
                $sql = "SELECT * FROM personal_info";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['userID'];
                    $age = $row['age'];
                    $gender = $row['gender'];
                    $address = $row['adress'];
                    $city = $row['city'];
                    $country = $row['country'];
                    $postalCode = $row['postal_code'];
                    $phoneNumber = $row['phone_nr'];

                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$age</td>
                            <td>$gender</td>
                            <td>$address</td>
                            <td>$city</td>
                            <td>$country</td>
                            <td>$postalCode</td>
                            <td>$phoneNumber</td>
                            <td><a href='editpersonalinfo.php?userid=$id'><i class='fas fa-edit'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>filan@gmail.com</td>
                <td>26</td>
                <td>Male</td>
                <td>Blabla</td>
                <td>Prizren</td>
                <td>Kosovo</td>
                <td>20000</td>
                <td>+3834342823</td>
                <td><a href=""><i class="fas fa-edit"></i></a></td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
