<?php

include 'includes/templates/nav.php';
// require_once 'includes/dbh.inc.php';
include_once 'includes/templates/productdisplay.php';

?>

    <div class="container-prd">

            <?php

            // include 'includes/dbh.inc.php';

            $pID = $_GET['product_id'];

            if(filter_var($pID, FILTER_VALIDATE_INT) === false) {
                die("Not a valid ID");
            }

                $sql = "SELECT p.product_name, p.price, pri.fname, p.productID, p.quantity
                        FROM product p, product_images pri
                        WHERE p.productID = pri.product_id AND p.productID = '$pID' LIMIT 1";

                $result = mysqli_query($conn, $sql);


                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        if($row['quantity'] > 0) {
                            pagePrdDisplay($row['fname'], $row['product_name'], $row['price'], $row['productID'], $row['quantity']);
                        } else {
                            pagePrdDisplaySoldOut($row['fname'], $row['product_name'], $row['price'], $row['productID'], $row['quantity']);
                        }
                ?>
                        

                <?php
                    }//WHILE
                } else {
                    echo "No rows on database!";
                }  //IF 
            ?>


    </div>

<?php

mysqli_close($conn);
include 'includes/templates/footer.php';

?>