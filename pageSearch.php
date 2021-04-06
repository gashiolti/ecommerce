<?php

include 'includes/templates/nav.php';
require_once 'includes/functions/searchprd.func.php';
require_once 'includes/dbh.inc.php';

?>




<!-- PRODUCTS -->
    <!-- <form action="" method="POST"> -->
        <div class="products-wrapper">

            <?php 
                if(isset($_POST['searchData'])) {
                    $search = mysqli_real_escape_string($conn, $_POST['search']);
                    // $sql = "SELECT p.product_name, p.price, pri.fname, p.productID 
                    //         FROM product p, product_images pri 
                    //         WHERE p.productID = pri.product_id AND product_name LIKE '%".$search."%' OR category_name LIKE '%".$search."%' OR company_name LIKE '%".$search."%';";

                    $sql = "SELECT p.product_name, p.price, pri.fname, p.productID
                            FROM product p, product_images pri 
                            WHERE p.productID = pri.product_id AND p.product_name LIKE '%".$search."%';";

                    $result = mysqli_query($conn, $sql);
                    $queryResult = mysqli_num_rows($result);

                    if($queryResult > 0) {
                        // return $result;
                        while($row = mysqli_fetch_assoc($result)) {
                            component($row['fname'], $row['product_name'], $row['price'], $row['productID']);
                        }
                    
                   
                    // echo $result;
                ?>
        </div> 

        <div style="width: 100%; height:100px;">

                <?php
                    } else {
                            echo "<h4 style='margin-left:30px;'>Couldnt find what you were looking for...</h4>";
                    }
                }

                ?>

        </div>




<?php

include 'includes/templates/footer.php';

?>


