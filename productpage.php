<?php

include 'includes/templates/nav.php';
include 'includes/dbh.inc.php';
include 'includes/templates/productdisplay.php';

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
                    pageProductDisplay($row['fname'], $row['product_name'], $row['price'], $result['productID'], $row['quantity']) 
            ?>
                        <!-- <form action='includes/validation/shc.val.php' method='POST' id='myForm'>
                            <div class='grid-container'>
                
                                <div class='image'>
                                    <img src="<?php echo $row['fname'];?>" alt="<?php echo $row['product_name'];?>">
                                </div>

                                <div class='info-prd'>
                                    <div class='title-prd'>
                                        <h1><?php echo $row['product_name'];?></h1>
                                        <h3>Price: <?php echo $row['price'];?>&euro;</h3>
                                        <h4>Available: <?php echo $row['quantity'];?></h4>
                                        <h4 style='text-transform: capitalize;'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit autem nam eum maiores modi magnam est esse fuga aliquam ex. Ex inventore saepe veniam facere, architecto odit unde tenetur deleniti.</h4>
                                        <label for='quantity'>Quantity</label>
                                        <input type='number' min='1' max='9' step='1' value='1' name='quantity' class='quantity'>
                                        <input type='hidden' name='product_id' value='<?php echo $result['productID'];?>'>
                                    </div>

                                    <div class='buttons'>
                                        <button class="btn-button"><i class='fas fa-heart'></i><b>Add to Wishlist</b></button>
                                        <button type="submit" form="myForm" class="btn-button add-to-cart"><i class="fas fa-shopping-cart"></i><b>Add to Cart</b></button>
                                    </div>
                                </div>

                            </div>
                        </form> -->

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