<?php

include 'includes/templates/nav.php';

?>


    <div class="container" style="width=100%; background-color: #FFFFFF;">
        <form action="" method="POST">
            <div class="grid-container">
                <div class="image">
                    <img src="images/images/products/samsung/UE70TU7172UXXH.jpg" alt="Iphone">
                </div>
                <div class="info">
                    <div class="title">
                        <h1>Iphone 12 PRO MAX 256GB</h1>
                        <h3>Price: 1199.99&euro;</h3>
                        <h4>Available: 6</h4>
                        <h4 style="text-transform: capitalize;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit autem nam eum maiores modi magnam est esse fuga aliquam ex. Ex inventore saepe veniam facere, architecto odit unde tenetur deleniti.</h4>
                        <label for="quantity">Quantity</label>
                        <input type="number" min="1" max="9" step="1" value="1" name="quantity" class="quantity">
                    </div>
                    <div class="buttons">
                        <button class="btn-button"><i class="fas fa-heart"></i><b>Add to Wishlist</b></button>
                        <button class="btn-button add-to-cart"><i class="fas fa-shopping-cart"></i><b>Add to Cart</b></button>
                    </div>
                </div>
            </div>
        </form>
    </div>




<?php

include 'includes/templates/footer.php';

?>