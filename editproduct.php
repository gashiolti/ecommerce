<?php

include_once 'includes/templates/adminheader.php';
include_once 'includes/templates/adminnav.php';

    if(isset($_GET['productid'])) {
        $id = $_GET['productid'];
    }

    $sql = "SELECT * 
            FROM product
            WHERE productID = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
            header("location: ../signup.php?error=stmtfailed");
            exit();
    }


    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)) {
        $prdName = $row['product_name'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $catName = $row['category_name'];
        $comName = $row['company_name'];
    } 

    mysqli_stmt_close($stmt);

?>

        <section>
            <div class="sec-wrapper">
                <div class="title">
                <i class="fas fa-edit"></i> EDIT PRODUCT
                </div>

                
                <form action="includes/productupdate.inc.php?productid=<?php echo $id ?>" method="POST">
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "uploadsuccess") {
                                    echo "<p class='alert-display'>User updated successfully!</p>";
                                }
                            }
                        ?>
                    </div>

                    <div class="sec_input_field">
                        <label>Product Name </label>
                        <input type="text" name="productname" class="input" value="<?php echo $prdName; ?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Price</label>
                        <input type="number" name="price" class="input" value="<?php echo $row['price']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="input" value="<?php echo $row['quantity']?>">
                    </div>
                    <div class="sec_input_field">
                        <label>Category</label>
                        <div class="custom_select">
                            <select name="category" id="" value="<?php echo $catName ?>">
                                <option value="<?php echo $catName ?>"><?php echo $catName ?></option>
                            <?php 
                                $query = "SELECT * FROM category";
                                $result = mysqli_query($conn, $query);
                                // $result = mysqli_result($execute);
                                while($row = mysqli_fetch_assoc($result)) {
                                    $categoryID = $row['category_name'];
                                    echo "<option value='$categoryID'>$categoryID</option>";
                                }
                            ?>
                                <!-- <option value="">Select</option>
                                <option value="Computer">Computer</option>
                                <option value="Laptop">Laptop</option>
                                <option value="SmartPhone">SmartPhone</option>
                                <option value="Monitor">Monitor</option>
                                <option value="Console">Console</option>
                                <option value="TV">TV</option>
                                <option value="SmartWatch">SmartWatch</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Accessories">Accessories</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="sec_input_field">
                        <label>Company</label>
                        <div class="custom_select">
                            <select name="company" id="">
                                <option value="<?php echo $comName ?>"><?php echo $comName ?></option>
                            <?php 
                                $query = "SELECT * FROM company";
                                $result = mysqli_query($conn, $query);
                                // $result = mysqli_result($execute);
                                while($row = mysqli_fetch_assoc($result)) {
                                    $companyID = $row['name'];
                                    echo "<option value='$companyID'>$companyID</option>";
                                }
                            ?>
                                <!-- <option value="">Select</option>
                                <option value="Apple">Apple</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Google">Google</option>
                                <option value="Huawei">Huawei</option>
                                <option value="Xiaomi">Xiaomi</option>
                                <option value="OnePlus">OnePlus</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Xbox">Xbox</option>
                                <option value="PlayStation">PlayStation</option>
                                <option value="HP">HP</option>
                                <option value="Dell">Dell</option>
                                <option value="Asus">Asus</option>
                                <option value="Acer">Acer</option>
                                <option value="LogiTech">LogiTech</option> -->
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "emptyinputs") {
                                    echo "<p class='error-display'>Please fill all the fields!</p>";
                                }
                                else if($_GET["error"] == "productquantitynegativenumber") {
                                    echo "<p class='error-display'>Please add only non negative number!</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class="sec_input_field addimage">
                        <input type="submit" name="submit" value="EDIT" class="btn">
                    </div>
                </form>
            </div>    
        </section>



</body>
</html>
