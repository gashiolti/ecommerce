<?php

include 'includes/templates/nav.php';


?>
    
    <!-- IMAGE SLIDER -->
    <div class="imageSlider-wrapper">
        <div class="slideshow-container">

            <div class="mySlides fade">
              <img src="images/images/slideShow/pexels-karolina-grabowska-5624988.jpg">
            </div>
            
            <div class="mySlides fade">
              <img src="images/images/slideShow/pexels-pixabay-4158.jpg">
            </div>
            
            <div class="mySlides fade">
              <img src="images/images/slideShow/pexels-tranmautritam-326503.jpg">
            </div>
            
            <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-chevron-left"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fas fa-chevron-right"></i></a>
            
        </div>
    </div>


    <!-- PRODUCTS -->
    <!-- <form action="" method="POST"> -->
        <div class="products-wrapper" id="prd-wrapper">

            <!-- <div class="productWrapper-margin"> -->
            <!-- <a href="pageProduct.php" class="product-a" style="text-decoration: none; display: block;"> -->
                <?php
                    $result = getPrdData($conn);
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        if($row['quantity'] > 0) {
                            component($row['fname'], $row['product_name'], $row['price'], $row['productID']);
                        } else {
                            componentSold($row['fname'], $row['product_name'], $row['price'], $row['productID']);
                        }
                    }
                    //component("uploads/5fd930457925c3.25928189.jpg", "Iphone", 999);
                ?>
                <!-- <div class="product-info">
                    <div class="product-image">
                        <img src="images/images/products/apple/1iphone-12-pro.jpg" alt="Iphone12Pro" id="productImage">
                    </div>
                    <div class="product-description">
                        <span class="pd-span">Iphone 12 Pro 256GB</span>
                    </div>
                    <div class="product-manipulation">
                        <h2>999.99&euro;</h2>
                        <div class="iconsWrapper" width="90px">
                            <button class="product-addFvl"></button>
                            <button class="product-addShpc"></button>
                        </div>
                    </div>
                </div> -->
            <!-- </a> -->
            <!-- </div> -->
        </div> 

                
    <!-- </form> -->

    <!-- Company logos -->
    <div class="company-background" style="background-color: #FFFFFF; border-top: 1px solid #EBEBEB;">

        <div class="company-wrapper">

            <?php
                $result = logoProducts($conn);
                while($row = mysqli_fetch_assoc($result)) {
                    companyLogo($row['name'], $row['fname']);
                }
            ?>
            <!-- <div class="col-companies">
                <a href="#"><img src="images/icons/companyIcons/Apple_logo_black.svg" alt="Apple" class="image-company" width="50%"></a>
            </div> -->
        </div>
    </div>

<?php

mysqli_close($conn);
include 'includes/templates/footer.php';

?>

</body>
</html>