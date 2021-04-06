<?php

function searchProduct($conn, $search) {

    $sql = "SELECT p.product_name, p.price, pri.fname, p.productID 
            FROM product p, product_images pri 
            WHERE p.productID = pri.product_id AND product_name LIKE '%$search%' OR category_name LIKE '%$search%' OR company_name LIKE '%$search%';";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    }

}