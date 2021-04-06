<?php

function emptyInputProduct($prdname, $prdprice, $prdquantity, $category, $company)
{
    //boolean value
    $result;
    if(empty($prdname) || empty($prdprice) || empty($prdquantity) || empty($category) || empty($company)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function priceToDecimal($price) 
{
    return $price / 100;
}

function priceError($prdprice)
{
    $result;
    if(!priceToDecimal($prdprice)) {
        $result = true;
    } 
    else {
        $result = false;
    }
    return $result;
}

function productQuantity($prdquantity)
{
    $result;
    if($prdquantity <= 0) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

$productSaved = FALSE;

function insertProduct($conn, $prdname, $prdprice, $prdquantity, $category, $company, $fileDestination) 
{
 
    // require_once '../validation/addproduct.inc.val.php';

    $sql = "INSERT INTO product(product_name, price, quantity, category_name, company_name) VALUES(?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../../addProduct.php?error=stmtfailed");
        //die("prepare() failed: " . htmlspecialchars(mysqli_error($stmt)));
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sdiss", $prdname, $prdprice, $prdquantity, $category, $company);
    mysqli_stmt_execute($stmt);
    // Read the id of the inserted product.
    $last_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    //Save a record for each uploaded file.
        $sql = "INSERT INTO product_images(product_id, fname) VALUES(?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: test.php?error=stmtfailed");
            //die("prepare() failed: " . htmlspecialchars(mysqli_error($stmt)));
            exit();
        }
        mysqli_stmt_bind_param($stmt, "is", $last_id, $fileDestination);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    

    mysqli_close($conn);
    $productSaved = TRUE;
    //header("location: ../../addProduct.php?productinsertedsuccessfully");
    // Reset the posted values, so that the default ones are now showed in the form.
    // See the "value" attribute of each html input.
    $prdname = $prdprice = $prdquantity = $category = $company = NULL;
}

//INSERT INTO SHOPPINGCART TABLE
function insertInCart($conn, $iduser, $idproduct, $quantity) {

    $sql = "INSERT INTO shoppingCart(userID, productID, quantity) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iii", $iduser, $idproduct, $quantity);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

//INSERT INTO favouritelist
function insertInFavouriteList($conn, $iduser, $idproduct) {
    $sql = "INSERT INTO favouriteList(userID, productID) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $iduser, $idproduct);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}