<?php

include_once 'includes/templates/nav.php';

// if(isset($_SESSION["user"])) {
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
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
        </div>
    </div>


    <!-- PRODUCTS -->
    <div class="products-wrapper" id="prd-wrapper">
                <?php
                    $result = getPrdData($conn);
                    while($row = mysqli_fetch_assoc($result)) {
                        component($row['fname'], $row['product_name'], $row['price'], $row['productID']);
                    }
                ?>
    </div> 


    <!-- Company logos -->
    <div class="company-background" style="background-color: var(--grey);">
        <div class="company-wrapper">
            <?php
                $result = logoProducts($conn);
                while($row = mysqli_fetch_assoc($result)) {
                    companyLogo($row['name'], $row['fname']);
                }
            ?>
          </div>
    </div>



<?php

    mysqli_close($conn);
    include 'includes/templates/footer.php';

// } else {
//     header("location: index.php");
// }