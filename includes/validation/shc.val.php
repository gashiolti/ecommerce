<?php
    // session_start();
    // require_once '../templates/productdisplay.php';
    // require_once '../templates/nav.php';

    // if(!(isset($_SESSION['cart'])))
    // {
    //     //start the cart session
    //     $_SESSION['cart'];
    // }

    if(isset($_POST["shoppingCart"])) 
    {
        // require_once '../dbh.inc.php';
        // require_once '../functions/prddata.func.php';

        print_r($_POST["product_id"]);
        // $productID = $_POST["product_id"];

        //print_r(selectProduct($conn, $productID));
        // $result = selectProduct($conn, $productID);

        // while($row = mysqli_fetch_assoc($result)) {
        //     print_r($row["productID"]);
        // }
        
        
    }
    else
    {
        header("location: ../../index.php?error=failed");
        exit();
    }


        // if(isset($_GET[$prdID]))
        // {
        //         $pID = $_GET[$prdID];
        //         $quantity = 0;

        //         if(isset($_SESSION['cart'][$pID]))
        //         {
        //             //if the item is already in the cart add one more quantity
        //             $_SESSION['cart'][$pID] += $quantity;
        //             header("location: index.php?error=productadded");
        //         }
        //         else
        //         {
        //             //if the item is not in the cart, then add it
        //             $_SESSION['cart'][$pID] = $quantity;
        //             header("location: index.php?error=productadded");
        //         }
            
        // }
        // else
        // {
        //     header("location: ../../index.php?error=failed");
        //     exit();
        // }
    
    

    // if(isset($_POST['shoppingCart']))
    // {
        
    // }