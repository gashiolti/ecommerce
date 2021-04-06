<?php

if(isset($_POST['submit']))
{
    $prdname = $_POST["prdname"];
    $prdprice = $_POST["prdprice"];
    $prdquantity = $_POST["prdquantity"];
    $category = $_POST["category"];
    $company = $_POST["company"];
    $file = $_FILES['file'];
    
    require_once 'includes/dbh.inc.php';
    //require_once '../functions/img.inc.func.php';
    require_once 'includes/functions/prdinsert.func.php';
    

    //ERROR HANDLERS
    if(emptyInputProduct($prdname, $prdprice, $prdquantity, $category, $company) !== false)
    {
        header("location: addProduct.php?error=emptyinputs");
        exit();
    }

    if(priceError($prdprice) !== false)
    {
        header("location: addProduct.php?error=priceisnotindecimal");
        exit();
    }

    if(productQuantity($prdquantity) !== false)
    {
        header("location: addProduct.php?error=productquantitynegativenumber");
        exit();
    }

    // //getting file's info
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    //file's extension
    $fileExt = explode('.', $fileName);
    //converting file'extension to lowercase, in case it has UPPERCASE
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'svg');

    //checking if the file has the proper extension, if so countinue
    if(in_array($fileActualExt, $allowed)) {

        //checking if there could be an error while uploading file
        if($fileError === 0) {

            //checking file size, max 10MB
            if($fileSize <= 10485760) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("location: addProduct.php?error=uploadsuccess");
            }
            else {
                echo "Your file is too big!";
            }
        }
        else {
            echo "There was an error uploading your file.";
        }
    }
    else {
        echo "You cannot upload files of this type";
    }

    insertProduct($conn, $prdname, $prdprice, $prdquantity, $category, $company, $fileDestination);
}

else
{
    header("location: ../../addProduct.php?error=somethingwentwrong");
}