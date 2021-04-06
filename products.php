<?php

include 'includes/templates/nav.php';
include_once 'includes/templates/productdisplay.php';

?>

<div class="products-wrapper" id="prd-wrapper">

<?php

// include 'includes/dbh.inc.php';


    //NAV BUTTONS
    if(isset($_GET['categoryid'])) { 

        $categoryID = $_GET['categoryid'];

        // if(filter_var($pID, FILTER_VALIDATE_INT) === false) {
        //     die("Not a valid ID");
        // }

        $sql = "SELECT p.product_name, p.price, pri.fname, p.productID
                FROM product p, product_images pri
                WHERE p.productID = pri.product_id AND p.category_name = '$categoryID';";

        $result = mysqli_query($conn, $sql);


        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
                component($row['fname'], $row['product_name'], $row['price'], $row['productID']);
            }//WHILE
        } else {
            echo "No rows on database!";
        }  //IF 
    } 
    
    else if(isset($_GET['logoid'])) { //LOGO BUTTONS

        $logoID = $_GET['logoid'];

        $sql = "SELECT p.product_name, p.price, pri.fname, p.productID
                FROM product p, product_images pri
                WHERE p.productID = pri.product_id AND p.company_name = '$logoID';";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                component($row['fname'], $row['product_name'], $row['price'], $row['productID']);
            }//WHILE
        } else {
            echo "No rows on database";
        }
    }

    ?>


</div>


<?php

mysqli_close($conn);
include 'includes/templates/footer.php';

?>