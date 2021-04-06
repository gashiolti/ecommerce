<?php

// FUNCTION TO REMOVE PRODUCT FROM SHOPPING CART
function removeProduct($conn, $productID) {
    $sql = "DELETE FROM shoppingCart WHERE shoppingCart.productID = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $productID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

//FUNCTION TO CLEAR CART
function clearCart($conn, $userID) {
    $userID = $_SESSION['userID'];
    $sql = "DELETE FROM shoppingCart WHERE shoppingCart.userID = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

//FUNCTION TO REMOVE SELECTED PRODUCT FROM FAVOURITE LIST
function removePrdFl($conn, $prdid) {
    $sql = "DELETE FROM favouriteList WHERE shoppingCart.productID = ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "idk what's wrong in here...";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $productID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}