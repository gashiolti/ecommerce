<?php

//GET PRODUCT DATA FOR index.php
function getPrdData($conn) 
{
    $sql = "SELECT p.product_name, p.price, pri.fname, p.quantity, p.productID
            FROM product p, product_images pri
            WHERE p.productID = pri.product_id;";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        return $result;
    }
}


//GET NAV BUTTON DATA
function selectProduct($conn) 
{
    $sql = "SELECT * FROM category;";
    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    }
}


//GET LOGO BUTTON DATA
function logoProducts($conn) 
{
    $sql = "SELECT c.* FROM company c WHERE c.name = 'Apple' OR c.name = 'Samsung' OR c.name = 'Google' OR c.name = 'Xbox' OR c.name = 'Huawei' OR c.name = 'Xiaomi' OR c.name = 'OnePlus';";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    }
}

//GET PRD DATA FOR SHOPPING CART 
// function getProductData($conn) {
//     $sql = "SELECT p.product_name, p.price, pri.fname, p.productID, p.quantity
//                         FROM product p, product_images pri, shoppingcart shp
//                         WHERE p.productID = pri.product_id AND p.productID = shp.productID AND p.productID = '$pID' LIMIT 1";

//     $result = mysqli_query($conn, $sql);
//     if(mysqli_num_rows($result) > 0) {
//         return $result;
//     } else {
//         return "No rows on database";
//     }
// }

//CART ITEM DATA FOR CHECKOUT PAGE
function cartItemData($conn, $iduser) {
    $sql = "SELECT p.product_name, p.price, shp.quantity
            FROM user_ u, product p, shoppingCart shp
            WHERE u.userID = shp.userID AND p.productID = shp.productID AND shp.userID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $iduser);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $prdname, $price, $quantity);
    while(mysqli_stmt_fetch($stmt)) { 
        echo $prdname;
        echo $price;
        echo $quantity;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}


// EXTRACT DATA FOR USER SETTINGS
function userSettings($conn) {
    $userID = $_SESSION['userID'];
    $sql = "SELECT u.email, u.fname, u.last_name, p.* FROM user_ u, personal_info p WHERE u.userID = p.userID AND u.userID = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $email, $fname, $lastname, $userid, $age, $gender, $address, $city, $country, $postalCode, $phonenr);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}