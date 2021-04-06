<?php

include 'includes/templates/nav.php';

?>
    
    <div class="prdContainer">

    <?php 
        if(isset($_SESSION['userID'])) {
            $iduser = $_SESSION['userID'];
            $sql = "SELECT fl.productID, p.product_name, p.price, pri.fname, p.productID, p.quantity
                    FROM user_ u, product p, product_images pri, favouriteList fl
                    WHERE u.userID = fl.userID AND p.productID = fl.productID AND p.productID = pri.product_id AND fl.userID = $iduser;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                        // $result = getPrdData($conn);
                while($row = mysqli_fetch_assoc($result)) {
                    wishlistComponent($row['fname'], $row['product_name'], $row['price'], $row['quantity'], $row['productID']);
                }
            } else {
                echo "You have no product saved in the favourite list";
            }
        }

    ?>
    <!-- <form action="" method="POST">
        <div class="prdwrapper">
            <div class="prdimagewrapper">
                <img src="images/images/products/apple/1iphone-12-pro.jpg" alt="Apple">
            </div>
            <div class="infowrapper">
                <h1>Apple Iphone 11 Pro Max 256 GB Black</h1>
                <h4>Price: 1099.99</h4>
                <h5>In Stock: 5</h5>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum beatae, sapiente minima adipisci tempora earum, explicabo doloremque voluptates culpa blanditiis laborum alias aperiam vero saepe ut fugiat reiciendis deleniti accusantium?
                    Deserunt numquam fugit sit non impedit facilis consequuntur ducimus, ratione distinctio.</h5>
            </div>
            <div class="removeItem">
                <input type='submit' name='add' class='product-addFvl' value="&#xf07a;" />
                <input type='submit' name='add' class='product-addShpc' value='&#xf1f8;' />
            </div>
        </div>
    </form>
        <div class="prdwrapper">
            <div class="prdimagewrapper">
                <img src="images/images/products/apple/1iphone-12-pro.jpg" alt="Apple">
            </div>
            <div class="infowrapper">
                <h1>Apple Iphone 11 Pro Max 256 GB Black</h1>
                <h4>Price: 1099.99</h4>
                <h5>In Stock: 5</h5>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum beatae, sapiente minima adipisci tempora earum, explicabo doloremque voluptates culpa blanditiis laborum alias aperiam vero saepe ut fugiat reiciendis deleniti accusantium?
                    Deserunt numquam fugit sit non impedit facilis consequuntur ducimus, ratione distinctio.</h5>
            </div>
            <div class="removeItem">
                <input type='submit' name='add' class='product-addFvl' value="&#xf07a;" />
                <input type='submit' name='add' class='product-addShpc' value='&#xf1f8;' />
            </div>
        </div> -->
        
    </div>

<?php

include 'includes/templates/footer.php';

?>

