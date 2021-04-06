<?php

$userid;

//REGISTER VALIDATION
function emptyInputSignup($email, $password, $passwordRepeat, $fname, $lastname, $age, $gender, $adress, $city, $country, $postalCode, $phoneNumber) 
{
    $result;
    if(empty($email) || empty($password) || empty($passwordRepeat) || empty($fname) || empty($lastname) || empty($age) || empty($gender) || empty($adress) || empty($city) || empty($country) || empty($postalCode) || empty($phoneNumber)) 
    {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $passwordRepeat)
{
    $result;
    if($password !== $passwordRepeat)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function pwdTooShort($password) 
{
    $result;
    $length = strlen($password);
    if($length < 10) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userEmailExists($conn, $email)
{
    $sql = "SELECT * FROM user_ WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } 
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $password, $fname, $lastname, $age, $gender, $adress, $city, $country, $postalCode, $phoneNumber)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $roleID = 3;
    // $sql = "CALL insertUserInfo('$email' ,'$hashedPassword', '$fname','$lastname',$roleID, $age,'$gender','$adress','$city','$country',$postalCode,'$phoneNumber')";
    $query = "INSERT INTO user_ (email, password_, fname, last_name, roleID) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Something went wrong with stmt";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $email, $hashedPassword, $fname, $lastname, $roleID);
    mysqli_stmt_execute($stmt);
    $lastID = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    $query2 = "INSERT INTO personal_info VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt2 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt2, $query2)) {
        echo "Something went wrong with stmt2";
        exit();
    }

    mysqli_stmt_bind_param($stmt2, "iissssss", $lastID, $age, $gender, $adress, $city, $country, $postalCode, $phoneNumber);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    session_start();
    $_SESSION["user"] = $userExists["email"];
    $_SESSION["role"] = $userExists["roleID"];
    header("location: ../index.php");

    // if(mysqli_multi_query($conn, $sql)) {
    //     header("location: ../index.php");
    //     exit();
    // } else {
    //     die(mysqli_error($conn));
    // }

}



//LOGIN VALIDATION
function emptyInputLogin($email, $password) 
{
    $result;
    if(empty($email) || empty($password))
    {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password) 
{
    $userExists = userEmailExists($conn, $email);

    if($userExists === false)
    {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $userExists["password_"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false)
    {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPassword === true)
    {
        session_start();
        $_SESSION["user"] = $userExists["email"];
        $_SESSION["role"] = $userExists["roleID"];
        $_SESSION["userID"] = $userExists["userID"];
        $userID = $userExists["userID"];
        if($_SESSION['role'] == 1) {
            header("location: ../ahome.php");
        } else {
            header("location: ../index.php");
        }
        exit();
    }
}


// COUNT PRODUCTS IN USER'S SHOPPING CART
function numOfPrds($conn, $userid) {
    $sql = "SELECT COUNT(shoppingCart.shcID)
            FROM shoppingCart
            WHERE shoppingCart.userID = ? LIMIT 1";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $number);
    while(mysqli_stmt_fetch($stmt)) { 
        return $number;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

// FUNCTION TO GET THE TOTAL PRICE IN THE CART
function totalPrice($conn, $userid) {
    $sql = "SELECT SUM(product.price*shoppingCart.quantity) AS totalPrice 
            FROM user_, product, shoppingCart 
            WHERE user_.userID = shoppingCart.userID AND product.productID = shoppingCart.productID AND user_.userID = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $totalPrice);
    while(mysqli_stmt_fetch($stmt)) { 
        return $totalPrice;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}




// FUNCTIONS TO UPDATE USER==============================================================================================================
//VALIDATE
function emptyInputUpdate($email, $password, $fname, $lastname, $role, $age, $gender, $adress, $city, $country, $postalCode, $phoneNumber) 
{
    $result;
    if(empty($email) || empty($password) || empty($role) || empty($fname) || empty($lastname) || empty($age) || empty($gender) || empty($adress) || empty($city) || empty($country) || empty($postalCode) || empty($phoneNumber)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmailUpdate($email)
{
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function pwdTooShortUpdate($password) {
    $result;
    $length = strlen($password);
    if($length < 10) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userEmailExistsUpdate($conn, $email) {
    $sql = "SELECT * FROM user_ WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } 
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//FUNCTION TO UPDATE USER INFO
function updateInfo($conn, $name, $lname, $age, $gender, $address, $city, $country, $zip) {
    $userID = $_SESSION['userID'];
    $sql = "UPDATE user_ u, personal_info p
            SET u.fname = ?, u.last_name = ?, p.age = ?, p.gender = ?, p.adress = ?, p.city = ?, p.country = ?, p.postal_code = ?
            WHERE u.userID = ? AND u.userID = p.userID";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssisssssi", $name, $lname, $age, $gender, $address, $city, $country, $zip, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// FUNCTION TO UPDATE USER EMAIL
function updateEmail($conn, $email) {
    $userID = $_SESSION['userID'];
    $sql = "UPDATE user_ u SET u.email = ? WHERE u.userID = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// FUNCTION TO UPDATE USER'S PHONE NUMBER
function updatePhoneNumber($conn, $phoneNr) {
    $userID = $_SESSION['userID'];
    $sql = "UPDATE user_ u, personal_info p SET p.phone_nr = ? WHERE u.userID = ? AND u.userID = p.userID";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $phoneNr, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


// FUNCTION TO UPDATE USER FROM ADMIN PANEL
function updateUser($conn, $id, $email, $password, $fname, $lname, $roleID, $age, $gender, $address, $city, $country, $postalCode, $phoneNr) {
    $query = "UPDATE user_ u, personal_info p
                SET u.email=?, u.password_=?, u.fname=?, u.last_name=?, u.roleID=?, p.age=?, p.gender=?, p.adress=?, p.city=?, p.country=?, p.postal_code=?, p.phone_nr=?
                WHERE u.userID = ? AND u.userID = p.userID";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssiissssssi", $email, $hashedPassword, $fname, $lname, $roleID, $age, $gender, $address, $city, $country, $postalCode, $phoneNr, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../users.php?page=users&error=userupdatedsuccessfully");
}



// FUNCTIONS TO VALIDATE AND UPDATE CATEGORY======================================================================================

function emptyInputCategoryUpdate($category) {
    $result;
    if(empty($category)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function updateCategory($conn, $newCategoryID, $category) {
    
    $query = "UPDATE category SET category_name = ? WHERE category_name = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $newCategoryID, $category);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../category.php?page=category&error=categoryupdatedsuccessfully");
}


// FUNCTION TO VALIDATE AND UPDATE COMPANY========================================================================================
function emptyInputCompany($companyName) {
    $result;
    if(empty($companyName)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function addcompany($conn, $companyName, $file) {

    $query = "INSERT INTO company VALUES(?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed!";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $companyName, $file);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../company.php?page=category&error=companyaddedsuccessfully");
}


function emptyInputCompanyUpdate($name) {
    $result;
    if(empty($name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function updateCompany($conn, $newID, $fileName, $previewID) {
    
    $query = "UPDATE company SET name = ?, fname = ? WHERE name = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $newID, $fileName, $previewID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../company.php?page=category&error=companyupdatedsuccessfully");
}



// FUNCTIONS TO VALIDATE, INSERT AND UPDATE ROLE======================================================================================
function emptyInputRole($name) {
    $result;
    if(empty($name)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function insertRole($conn, $rolename) {

    $query = "INSERT INTO role_ (description_) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $rolename);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../role.php?page=role&error=uploadsuccess");

}

function updateRole($conn, $roleName, $roleID) {

    $query = "UPDATE role_ SET description_ = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $roleName, $roleID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($conn);
    header("location: ../role.php?page=role&error=roleupdatedsuccessfully");

}


// FUNCTIONS TO VALIDATE AND UPDATE PRODUCT==========================================================================================
function emptyInputUpdateProduct($prdName, $price, $quantity) {
    $result;
    if(empty($prdName) || empty($price) || empty($quantity)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function updateProduct($conn, $prdName, $price, $quantity, $category, $company, $productID) {

    $query = "UPDATE product SET product_name = ?, price = ?, quantity = ?, category_name = ?, company_name = ? WHERE productID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "siissi", $prdName, $price, $quantity, $category, $company, $productID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../producttable.php?page=product&error=productupdatedsuccessfully");
}


// FUNCTIONS TO VALIDATE AND UPDATE USER DETAILS========================================================================================

function emptyInputUserDetails($age, $gender, $address, $city, $country, $postalCode, $phoneNr) {
    $result;
    if(empty($age) || empty($gender) || empty($address) || empty($city) || empty($country) || empty($postalCode) || empty($phoneNr)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function updateUserDetails($conn, $age, $gender, $address, $city, $country, $postalCode, $phoneNr, $userID) {
    $query = "UPDATE personal_info SET age = ?, gender = ?, adress = ?, city = ?, country = ?, postal_code = ?, phone_nr = ? WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "issssssi", $age, $gender, $address, $city, $country, $postalCode, $phoneNr, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../personalinfo.php?page=personalinfo&error=userdetailsupdatedsuccessfully");
}




// FUNCTION TO VALIDATE AND INSERT CHAT================================================================================================================


function insertMessage($conn, $user, $message, $time) {
    $query = "INSERT INTO chat(from_user_id, to_user_id, message, time_delivered) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    $helpAgentID = 11;
    mysqli_stmt_bind_param($stmt, "iiss", $user, $helpAgentID, $message, $time);
    mysqli_stmt_execute($stmt);
    // $lastID = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);
}

function message($conn, $sender, $receiver, $message, $time) {
    $query = "INSERT INTO chat (from_user_id, to_user_id, message, time_delivered) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "Statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iiss", $sender, $receiver, $message, $time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


// FUNCTION TO VALIDATE CREDIT CARD 
function emptyCreditCard($cardName, $cardNumber, $cardExp, $cardCvv) {
    $result;
    if(empty($cardName) || empty($cardNumber) || empty($cardExp) || empty($cardCvv)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function creditCardLength($creditCardNum) {
    $numLength = strlen($creditCardNum);
    $result;
    if($numLength !== 16) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function creditCardExpLength($creditCardExp) {
    $cardLength = strlen($creditCardExp);
    $result;
    if($cardLength !== 4) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function creditCardCvvLength($cardCvv) {
    $cardCvv = strlen($cardCvv);
    $result;
    if($cardCvv !== 3) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function insertOrder($conn, $userID, $paid, $date, $cart, $status) {
    //INSERT INTO ORDER
    $insertOrder = "INSERT INTO order_ (userID, paid) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $insertOrder)) {
        echo "Failed";
        exit(); 
    }
    mysqli_stmt_bind_param($stmt, "ii", $userID, $paid);
    mysqli_stmt_execute($stmt);
    $lastInsertId = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);
    // $resultData2 = mysqli_stmt_get_result($stmt);

    $selectCart = "SELECT * FROM shoppingcart WHERE shoppingcart.userID = ?";
    $stmt2 = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt2, $selectCart)) {
        echo "The prepared statement failed!";
        exit();
    }
    mysqli_stmt_bind_param($stmt2, "i", $userID);
    mysqli_stmt_execute($stmt2);
    $resultData = mysqli_stmt_get_result($stmt2);
    while($row = mysqli_fetch_assoc($resultData)) {  
        $cartID = $row['shcID'];
        $userID = $row['userID'];
        $productID = $row['productID'];
        $quantity = $row['quantity'];

        $insertOrderDetails = "INSERT INTO order_details (orderID, productID, quantity, date_ordered) VALUES (?,?,?,?);";
        $stmt3 = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt3, $insertOrderDetails)) {
            echo "Statement 2 failed";
            exit();
        }

        mysqli_stmt_bind_param($stmt3, "iiis", $lastInsertId, $productID, $quantity, $date);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_close($stmt3);
        
    }



    //INSERT INTO PAYMENT
    $payment = "INSERT INTO payment (orderID, userID, cart_type, total_price, date_) VALUES (?,?,?,?,?);";
    $stmt4 = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt4, $payment)) {
        echo "Statement 4 failed";
        exit();
    }

    $price = totalPrice($conn, $userID);
    $priceInDecimal = str_replace(',', '.', $price);

    mysqli_stmt_bind_param($stmt4, "iisds", $lastInsertId, $userID, $cart, $priceInDecimal, $date);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_close($stmt4);



    //INSERT INTO TRACKING
    $tracking = "INSERT INTO tracking (time_stamp, orderID, userID, status) VALUES (?,?,?,?);";
    $stmt5 = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt5, $tracking)) {
        echo "Statement 5 failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt5, "siii",$date, $lastInsertId, $userID, $status);
    mysqli_stmt_execute($stmt5);
    mysqli_stmt_close($stmt5);



    // DELETE USER'S CART ITEMS
    $query = "DELETE FROM shoppingcart WHERE shoppingcart.userID = ?";
    $stmt6 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt6, $query)) {
        echo "Statement 6 failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt6, "i", $userID);
    mysqli_stmt_execute($stmt6);
    mysqli_stmt_close($stmt6);



    //Quantity substraction of product
    // $query2 = "UPDATE product SET product.quantity = (product.quantity - 3)
    //             WHERE product.productID = 64"
    $query3 = "SELECT * FROM order_details WHERE order_details.orderID = ?";
    $stmt7 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt7, $query3)) {
        echo "Something went wrong with stmt 7";
        exit();
    }
    mysqli_stmt_bind_param($stmt7, "i", $lastInsertId);
    mysqli_stmt_execute($stmt7);
    $result = mysqli_stmt_get_result($stmt7);
    while($row = mysqli_fetch_assoc($result)) {
        $prdID = $row['productID'];
        $quantity = $row['quantity'];

        $query4 = "UPDATE product SET product.quantity = (product.quantity - ?) WHERE product.productID = ?";
        $stmt8 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt8, $query4)) {
            echo "something went wrong with stmt 8";
            exit();
        }

        mysqli_stmt_bind_param($stmt8, "ii", $quantity, $prdID);
        mysqli_stmt_execute($stmt8);
        mysqli_stmt_close($stmt8);
    }
    mysqli_stmt_close($stmt7);
    mysqli_close($conn);
    header("location: ../ordersubmited.php?orderid=$lastInsertId");
}


// VALIDATION OF TRACKING UPDATE
function emptyInputUpdateTracking($status) {
    $result;
    if(empty($status)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function updateTrackingStatus($conn, $status, $orderID) {
    $query = "UPDATE tracking SET status = ? WHERE orderID = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)) {
        echo "something went wrong";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii", $status, $orderID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("location: ../trackingtable.php?error=orderstatusupdated");
}







