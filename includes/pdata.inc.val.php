<?php

// require_once 'dbh.inc.php';
require_once dirname(__DIR__).'dbh.inc.php';

function getPrdData() 
{
    $sql = "SELECT p.product_name, p.price, pri.fname
            FROM product p, product_images pri
            WHERE p.productID = pri.product_id;";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        return $result;
    }

}
