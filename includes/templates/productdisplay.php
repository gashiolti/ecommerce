<?php


function component($fname, $prdName, $price, $product_id) 
{
    $layout = "
            <form action='includes/templates/nav.php' method='POST' id='prdForm'>
                <a href='product.php?product_id=$product_id' class='product-a' style='text-decoration: none;'>
                    <div class='product-info'>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <input type='hidden' name='quantity' value='1'>
                        <div class='product-image'>
                            <img src='$fname' alt='$prdName' name='productImage' id='productImage'>
                        </div>
                        <div class='product-description'>
                            <span class='pd-span'>$prdName</span>
                        </div>
                        <div class='product-manipulation'>
                            <h3>$price&euro;</h3>
                            <div class='iconsWrapper'>
                                <input type='submit' name='addFvl' class='product-addFvl' value=\"&#xf004;\" />
                                <input type='submit' name='add' class='product-addShpc' value=\"&#xf07a;\" />
                            </div>
                        </div>
                    </div>  
                </a>
            </form>";
                        // <input type='hidden' name='quantity' value='$quantity'>

    echo $layout;
}

function componentSold($fname, $prdName, $price, $product_id) 
{
    $layout = "
            <form action='includes/templates/nav.php' method='POST' id='prdForm'>
                <a href='product.php?product_id=$product_id' class='product-a' style='text-decoration: none;'>
                    <div class='product-info'>
                        <div class='product-sold'></div>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <input type='hidden' name='quantity' value='1'>
                        <div class='product-image'>
                            <img src='$fname' alt='$prdName' name='productImage' id='productImage'>
                        </div>
                        <div class='product-description'>
                            <span class='pd-span'>$prdName</span>
                        </div>
                        <div class='product-manipulation'>
                            <h3>$price&euro;</h3>
                            <div class='iconsWrapper'>
                                <input type='submit' name='addFvl' class='product-addFvl' value=\"&#xf004;\" />
                                <input type='submit' name='add' class='product-addShpc' value=\"&#xf07a;\" />
                            </div>
                        </div>
                    </div>  
                </a>
            </form>";
                        // <input type='hidden' name='quantity' value='$quantity'>

    echo $layout;
}


//PAGE PRODUCT DISPLAY
function pagePrdDisplay($fname, $prdName, $price, $product_id, $quantity) 
{
    $layout = "
                <form action='includes/templates/nav.php' method='POST' id='myForm'>
                    <div class='grid-container'>

                        <div class='image'>
                            <img src='$fname' alt='$prdName'>
                        </div>

                        <div class='info-prd'>
                            <div class='title-prd'>
                                <h1>$prdName</h1>
                                <h3>Price: $price&euro;</h3>
                                <h4>In Stock: $quantity</h4>
                                <h4 style='text-transform: capitalize;'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, recusandae reprehenderit est, dicta illo expedita vero odio rerum quod voluptas veritatis unde ad praesentium dignissimos, totam atque. Odio, dolorem. Dolores.
                                Nisi nesciunt fugiat tempora aspernatur ad provident enim perferendis quibusdam corrupti deserunt, accusamus sit consequatur nam quo sint in.</h4>
                                <label for='quantity'>Quantity</label>
                                <input type='number' min='1' max='9' step='1' value='1' name='quantity' class='quantity'>
                                <input type='hidden' name='product_id' value='$product_id'>
                            </div>

                            <div class='buttons'>
                                <input type='submit' name='addFvl' class='addToWL' value='&#xf004; Add to WishList' />
                                <input type='submit' name='add' class='addShpc' value='&#xf07a; Add to Cart' />
                            </div>
                        </div>

                    </div>
                </form>";
    echo $layout;
}

function pagePrdDisplaySoldOut($fname, $prdName, $price, $product_id, $quantity) {
    $layout = "
                    <div class='grid-container'>
                        <div class='image'>
                            <img src='$fname' alt='$prdName'>
                            <div class='sold-out'><img src='images/logo/sold-final.png'></div>
                        </div>

                        <div class='info-prd'>
                            <div class='title-prd'>
                                <h1>$prdName</h1>
                                <h3>Price: $price&euro;</h3>
                                <h4>In Stock: $quantity</h4>
                                <h4 style='text-transform: capitalize;'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, recusandae reprehenderit est, dicta illo expedita vero odio rerum quod voluptas veritatis unde ad praesentium dignissimos, totam atque. Odio, dolorem. Dolores.
                                Nisi nesciunt fugiat tempora aspernatur ad provident enim perferendis quibusdam corrupti deserunt, accusamus sit consequatur nam quo sint in.</h4>
                                <label for='quantity'>Quantity</label>
                                <input type='number' min='1' max='9' step='1' value='1' name='quantity' class='quantity'>
                                <input type='hidden' name='product_id' value='$product_id'>
                            </div>

                            <div class='buttons'>
                                <input type='submit' name='addFvl' class='addToWL' value='&#xf004; Add to WishList' />
                                <input type='submit' name='add' class='addShpc' value='&#xf07a; Add to Cart' />
                            </div>
                        </div>

                    </div>";
    echo $layout;
}

//NAV BUTTON 
function navButtonData($conn, $categoryID) {
    $layout = "
            <form action='' method='POST'>
                <li><a href='products.php?categoryid=$categoryID'>$categoryID</a></li>
            </form>";

    echo $layout;
}

//LOGO BUTTONS
function companyLogo($logoName, $image) {

    $layout = "
            <form action='' method='POST'>
                <a href='products.php?logoid=$logoName'>
                    <div class='col-companies'>
                        <img src='$image' alt='$logoName' class='image-company' width='50%'>
                    </div>
                </a>
            </form>";

    echo $layout;

}


//CART PRODUCTS DISPLAY
function cartComponent($prdimage, $prdname, $prdprice, $quantity, $product_id) {
    $layout = "
                        <ul class='shopping-cart-items'>
                            <li class='clearfix'>
                                <img src='$prdimage' alt='$prdname' />
                                <span class='item-name'>$prdname</span>
                                <span class='item-price'>$prdprice&euro;</span>
                                <span class='item-quantity'>x $quantity</span>
                                <input type='hidden' name='prdid' value='$product_id' />
                                <input type='submit' name='removeItem' class='empty-cart remove' value='&#xf1f8;' />
                            </li>
                        </ul>";

    echo $layout;
}

//WISHLIST PRODUT LAYOUT
function wishlistComponent($prdimage, $prdname, $prdprice, $quantity, $product_id) {
    $layout = "
            <form action='includes/templates/nav.php' method='POST'>
                <div class='prdwrapper'>
                    <div class='prdimagewrapper'>
                        <img src='$prdimage' alt='$prdname'>
                    </div>
                    <div class='infowrapper'>
                        <h1>$prdname</h1>
                        <h4>Price: $prdprice</h4>
                        <h5>In Stock: $quantity</h5>
                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum beatae, sapiente minima adipisci tempora earum, explicabo doloremque voluptates culpa blanditiis laborum alias aperiam vero saepe ut fugiat reiciendis deleniti accusantium?
                            Deserunt numquam fugit sit non impedit facilis consequuntur ducimus, ratione distinctio.</h5>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <input type='hidden' name='quantity' value='1'>
                    </div>
                    <div class='removeItem'>
                        <input type='submit' name='addToshp' class='product-addFvl' value='&#xf07a;' />
                        <input type='submit' name='removeItemfl' class='product-addShpc' value='&#xf1f8;' />
                    </div>
                </div>
            </form>";

    echo $layout;
}

//DISPLAY CART ITEMS ON CHECKOUT PAGE
function cartItems($prdname, $prdprice, $quantity) {
    $layout = 
            "<div class='container-product'>
                <p style='color: black;'>$prdname <span>$prdprice&euro; x$quantity</span></p>
            </div>";
    echo $layout;
}


// DISPLAY USER SETTINGS ON USER'S PROFILE
function displayInfo($conn, $email, $fname, $lname, $age, $gender, $address, $city, $country, $postalCode, $phoneNumber) {
    $layout = "<div class='col-83'>
                    <div class='icon'>
                        <div class='icon-holder'>
                            <i class='fas fa-user-circle fa-8x'></i>
                        </div>
                        <div class='name-holder'>
                            <h3>Welcome $fname $lname</h3>
                        </div>
                    </div>

                    <div class='personal-details'>
                        <div class='pd-top'>
                            <h3><i class='fas fa-user'></i> Personal Details</h3>
                            <button class='pd-button' id='editButton' onclick='accountEdit()'><i class='fas fa-edit'></i> Edit</button>
                        </div>
                        <div class='pd-bottom'>
                            <div class='pd-bottom-1'>
                                <span>Name</span>
                                <span>Last Name</span>
                                <span>Age</span>
                                <span>Gender</span>
                                <span>Address</span>
                                <span>City</span>
                                <span>Country</span>
                                <span>Postal Code</span>
                            </div>
                            <div class='pd-bottom-2'>
                                <span>$fname</span>
                                <span>$lname</span>
                                <span>$age</span>
                                <span>$gender</span>
                                <span>$address</span>
                                <span>$city</span>
                                <span>$country</span>
                                <span>$postalCode</span>
                            </div>
                        </div>
                    </div>

                    <div class='money-spent'>
                        <div class='icon-holder'>
                            <i class='fas fa-euro-sign fa-8x'></i>
                        </div>
                        <div class='name-holder'>
                            <h3>You spent a total of 693&euro;</h3>
                        </div>
                    </div>

                    <div class='email'>
                        <div class='pd-top'>
                            <h3><i class='fas fa-envelope-square'></i> Email</h3>
                            <button class='pd-button' id='editButton2' onclick='accountEdit2()''><i class='fas fa-edit'></i> Edit</button>
                        </div>
                        <div class='pd-bottom'>
                            <div class='pd-bottom-1'>
                                <span>Email</span>
                            </div>
                            <div class='pd-bottom-2'>
                                <span>$email</span>
                                
                            </div>
                        </div>
                    </div>

                    <div class='phone-nr'>
                        <div class='pd-top'>
                            <h3><i class='fas fa-phone'></i> Phone Number</h3>
                            <button class='pd-button' id='editButton3' onclick='accountEdit3()'><i class='fas fa-edit'></i> Edit</button>
                        </div>
                        <div class='pd-bottom'>
                            <div class='pd-bottom-1'>
                                <span>Phone Number</span>
                            </div>
                            <div class='pd-bottom-2'>
                                <span>+$phoneNumber</span>
                            </div>
                        </div>
                    </div>

                </div>";

    echo $layout;            
}


// FUNCTIONS TO DISPLAY DATA FOR ADMINISTRATOR==========================================================================

function display($conn, $id, $desc) {
    $layout = "<tr>
                    <td>$id</td>
                    <td>$desc</td>
                    <td><a href=''><i class='fas fa-edit'></i></a></td>
                    <td><a href=''><i class='fas fa-trash'></i></a></td>
                </tr>";
    echo $layout;
}