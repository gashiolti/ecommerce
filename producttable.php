
<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

?>


<main>
    <div class="title">
        <h2><i class="fab fa-product-hunt"></i> Products</h2>

        <!-- OPTIONAL -->
        <a href="addproduct.php"><i class="fas fa-plus-circle"></i> Add Product</a>
    </div>
        <div class="table">
            <?php
                    if(isset($_GET["error"])) 
                    {
                        if($_GET["error"] == "productdeletedsuccessfully") {
                            echo "<p class='alert-display'>Product deleted successfully!</p>";
                        } 
                        else if($_GET["error"] == "productupdatedsuccessfully") {
                            echo "<p class='alert-display'>Product updated successfully!</p>";
                        }
                    }
            ?>
        <table class="tableInfo">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Company</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['productID'];
                    $prdName = $row['product_name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $categoryName = $row['category_name'];
                    $companyName = $row['company_name'];
                    // display($conn, $id, $desc);
                    echo "<tr>
                            <td>$id</td>
                            <td>$prdName</td>
                            <td>$price</td>
                            <td>$quantity</td>
                            <td>$categoryName</td>
                            <td>$companyName</td>
                            <td><a href='editproduct.php?productid=$id'><i class='fas fa-edit'></i></a></td>
                            <td><a href='includes/productdelete.inc.php?productid=$id'><i class='fas fa-trash'></i></a></td>
                        </tr>";
                }
            ?>
            <!-- <tr>
                <td>12345</td>
                <td>Iphone 12 PRO</td>
                <td>1299.99</td>
                <td>6</td>
                <td>Smart Phone</td>
                <td>Apple</td>
                <td><a href=""><i class="fas fa-edit"></i></a></td>
                <td><a href=""><i class="fas fa-trash"></i></a></td>
            </tr> -->
        </table>
    </div>
</main>
