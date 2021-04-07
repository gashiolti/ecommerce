<?php
    session_start();
    require_once (dirname(__FILE__) .'/../dbh.inc.php');
    include (dirname(__FILE__) .'/productdisplay.php');
    require_once (dirname(__FILE__) .'/../functions/prddata.func.php');
    require_once (dirname(__FILE__) .'/../functions/prdinsert.func.php');
    require_once (dirname(__FILE__) .'/../functions/prdremove.func.php');
    require_once (dirname(__FILE__) .'/../functions.inc.php');


    if(isset($_POST['add'])) {
        if(isset($_SESSION['userID'])) {
            $quantity = $_POST['quantity'];
            insertInCart($conn, $_SESSION['userID'], $_POST['product_id'], $quantity);
            header("location: ../../index.php?error=productsavedinthecart");
        } else {
            header("location: ../../login.php");
        }
    } 
    if(isset($_POST['emptyCart'])) {
        clearCart($conn, $_POST['userID']);
        header("location: index.php?error=productremovedfromthecart");
    }

    if(isset($_POST['removeItem'])) {
        // print_r($_POST['prdid']);
        $prdid = $_POST['prdid'];
        removeProduct($conn, $prdid);
        header("location: index.php?error=productremovedfromthecart");
    }

    if(isset($_POST['addFvl'])) {
        if(isset($_SESSION['userID'])) {
            insertInFavouriteList($conn, $_SESSION['userID'], $_POST['product_id']);
            header("location: ../../index.php?error=productaddedinfavouritelist");
        } else {
            header("location: ../../login.php");
        }
    }

    if(isset($_POST['addToshp'])) {
        insertInCart($conn, $_SESSION['userID'], $_POST['product_id'], $quantity);
        header("location: wishlist.php?error=productsavedinthecart");
    }

    if(isset($_POST['removeItemfl'])) {
        removePrdFl($conn, $prdid);
        header("location: wishlist.php?error=productremoved");
    }


    if(isset($_POST['message'])) {
        if(!empty($_POST['message'])) {
            $message = $_POST['message'];
            $time = date("h:i:sa");
            // $timeStamp = date('G:i', strtotime($time));

            // require_once 'dbh.inc.php';
            // require_once 'functions.inc.php';

            insertMessage($conn, $_SESSION['userID'], $message, $time);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Tech Guys</title>
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="Style/pageStyle.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="Style/checkout.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="fontawesome/css/all.css?v=<?php echo time(); ?>"> 
    <script src="JS/jquery-3.5.1.js"></script>
    <!-- <script src="JS/chatnoreload.js"></script> -->
    <!-- <script src="fontawesome/js/all.js"></script> -->
    
</head>
<body>

    <!-- TOP -->
    <div class="container">
        
        <div class="wrapper">

            <!-- <div class="header"> -->
                <div class="firstPart-logo">
                    <img src="images/logo/LogoWb.png" alt="Logo" width="100px" onclick="location.href='index.php';" style="cursor: pointer;">
                </div>
                
                    <form action="pageSearch.php" method="POST">
                        <div class="secondPart-searchBar">
                            <div class="searchbar-wrapper">
                                <input type="search" id="search" class="search" name="search" placeholder="What are you looking for?">
                                <!-- <input type="submit" name="submit" class="btn" value="submit"/> -->
                                <button type="submit" name="searchData" class="btn" id="searchData">
                                    <i class="fas fa-search"></i> 
                                </button>
                                <!-- <div class="btn" id="searchData" name="searchData">
                                    <input type="submit" class="btn btn-success" value="&#xf011;"/>
                                </div> -->
                                <!-- <input type="submit" name="submit" value="Submit"> -->
                                <!-- onClick="document.forms['searchForm'].submit();" -->
                            </div>
                        </div>
                    </form>

                <div class="thirdPart-logIn">
                    <ul class="thirdPart-list">
                        <?php 
                            // count products in cart
                            // $numOfPrds = 0;

                            if(!isset($_SESSION["userID"]) && !isset($_SESSION["role"])) 
                            {
                                echo '<li id="login"><a href="login.php"><i class="fas fa-sign-in-alt"></i> Log In</a></li>';
                                echo '<li><button id="cart" class="shoppingCart" onclick="cartPopUp()"></button><span class="badge">0</span></a></li>';
                            }
                            else
                            {
                                $numOfPrds = numOfPrds($conn, $_SESSION["userID"]);
                                if($_SESSION["role"] == 1) {
                                    echo '<li><a href="addProduct.php">Add Product</a></li>';
                                    echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                                }
                                if($_SESSION["role"] == 2) {
                                    echo '<li><button id="account" class="userAccount" onclick="accountPopUp()"></button></li>';
                                    echo '<li><a href="helpagentchat.php"><i class="fas fa-bell"></i></a><span class="notification">0</span></a></li>';
                                }
                                if($_SESSION["role"] == 3) {
                                    echo '<li><button id="account" class="userAccount" onclick="accountPopUp()"></button></li>';
                                    echo ' <li><button id="cart" class="shoppingCart" onclick="cartPopUp()"></button></i><span class="badge">'.$numOfPrds.'</span></li>';
                                }
                            }
                        ?>
                        
                    </ul>
                </div>
            <!-- </div> -->
            </form>
        </div>
    </div>

    <!-- account info dropdown============================================================================================================ -->
    <!-- <div class="wrapper-account" id="wrapper-account"> -->
        <div class="account-info" id="accountinfo" style="display:none;">
            <div class="info">
                <span class="close"><i class="fas fa-times-circle"></i></span>
                <ul>
                    <li><a href="account.php">Account Settings</a></li>
                    <li><a href="wishlist.php">Favourite List</a></li>
                    <li><a href="myorders.php">My Orders</a></li>
                </ul>
            </div>
            <div class="account-logout">
                <ul>
                    <li><a href="includes/logout.inc.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                </ul>
            </div>
        </div>

    <!-- </div> -->

    <!-- shopping cart dropdown========================================================================================================= -->
    <!-- <div class="shoppingCart-container"> -->
        <form action="" method='POST'>
            <div class='shopping-cart' id='shoppingcart' style="display:none;">
                <div class='product-wrapper'>
                    <span class="closeCart"><i class="fas fa-times-circle"></i></span>
                    <div class='shopping-cart-header'>
                        <div class='shopping-cart-empty'>
                            <?php 
                                if(isset($_SESSION['userID'])) {
                                    echo "<input type='submit' name='emptyCart' class='empty-cart' value='&#xf1f8; Empty Cart' />";
                                }
                            ?>
                                <!-- <i class='fa fa-shopping-cart cart-icon'></i><span class='badge'>3</span> -->
                            <!-- <input type='submit' name='emptyCart' class='empty-cart' value='&#xf1f8; Empty Cart' /> -->
                        </div>
                        <div class='shopping-cart-total'>
                            <span class='lighter-text'>Total:
                            <?php
                                if(isset($_SESSION['userID'])) {
                                    $totalPrice = totalPrice($conn, $_SESSION['userID']);
                                    echo "$totalPrice&euro;";
                                } else {
                                    echo "0&euro;";
                                }
                            ?>
                            </span>
                        </div>
                    </div> <!--end shopping-cart-header -->
                    <br>
                            <!-- <span class='empty-schp'>The shopping cart is empty</span> -->
                        

            <?php
                if(isset($_SESSION['userID'])) {
                    $iduser = $_SESSION['userID'];
                    $sql = "SELECT u.fname, shp.productID, shp.quantity, p.product_name, p.price, pri.fname, p.productID
                            FROM user_ u, product p, product_images pri, shoppingCart shp
                            WHERE u.userID = shp.userID AND p.productID = shp.productID AND p.productID = pri.product_id AND shp.userID = $iduser;";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        // $result = getPrdData($conn);
                        while($row = mysqli_fetch_assoc($result)) {
                            cartComponent($row['fname'], $row['product_name'], $row['price'], $row['quantity'], $row['productID']);
                        }
                        echo "<a href='checkout.php' class='button'>Checkout <i class='fas fa-arrow-alt-circle-right'></i></a>";  
                    } else {
                        echo "<div>The shopping cart is empty.</div>";
                    }
                } else {
                    echo "<div>The shopping cart is empty.</div>";
                }
            ?>
                </div>
                
            </div>    
        </form>            
    <!-- </div> -->

    <!-- NAVIGATION================================================================================================================= -->
    <nav id="header-nav" style="background-color: #FFFFFF; border-bottom: 1px solid #EBEBEB;">
        
        <div class="list-wrapper">
            <form action='test.php' method='POST' id='navBtnForm'>
                <ul>
                    <?php
                        $result = selectProduct($conn);
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            navButtonData($conn, $row['category_name']);
                        }
                        //component("uploads/5fd930457925c3.25928189.jpg", "Iphone", 999);
                    ?>
                </ul>
            </form>
        </div>
    </nav>


    <?php 
        if(isset($_SESSION['userID']) && isset($_SESSION['role'])) {
            if($_SESSION['role'] == 3) {
                $userID = $_SESSION['userID'];
                
    ?>
    <!-- CHAT =========================================================================================================================== -->
    <div class="open-button" id="chatIcon" onclick="openForm()">NEED HELP? <i class="fab fa-facebook-messenger"></i></div>
    <div class="chat-popup" id="myForm">
        <div class="msg-header">
            <div class="acc-info">
                <div class="img"></div>
                <div class="name"><h4>HELP AGENT</h4></div>
            </div>
            <div class="minimize" onclick="closeForm()">
                <span style="color: white;"><i class="fas fa-window-minimize"></i></span>
            </div>
        </div>
            <div class="chat-page">
                <div class="msg-inbox">
                    <div class="chats">
                        <div id="msg-page"> 

                        <?php 

                            include 'includes/gethelpagentmessage.inc.php';

                        ?>

                            <!-- <div class="welcome"><p>How may we help you?</p></div> -->

                            <!-- <div class="received-chats">
                                <div class="received-chats-img">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="received-msg">
                                    <div class="received-msg-inbox">
                                        <p>Hello there, how may I help you?</p>
                                        <span class="time">12:32 PM</span>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="outgoing-chats"> -->
                                <!-- <div class="outgoing-chats-img">
                                    <img src="images/icons/chat/msg-acc1.png" alt="account image">
                                </div> -->
                                <!-- <div class="outgoing-chats-msg">
                                        <p>Hi, i've bought a product a few days ago, but it still didn't arrive?</p>
                                        <span class="time">12:42 PM</span>
                                </div>
                            </div> -->

                            <!-- <div class="received-chats">
                                <div class="received-chats-img">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="received-msg">
                                    <div class="received-msg-inbox">
                                        <p>When did you order it, sir?</p>
                                        <span class="time">12:45 PM</span>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="outgoing-chats"> -->
                                <!-- <div class="outgoing-chats-img">
                                    <img src="images/icons/chat/msg-acc1.png" alt="account image">
                                </div> -->
                                <!-- <div class="outgoing-chats-msg">
                                            <p>Last week</p>
                                            <span class="time">12:54 PM</span>
                                </div>
                            </div> -->

                        </div>
                    </div> 

                    <form class="myFormName" autocomplete="off">
                        <div class="msg-bottom">
                            <div class="input-group">
                                <input type="number" name="userid" id="" value="<?php echo $userID; ?>" hidden> 
                                <!-- <input type="number" name="incoming_id" id="" hidden> -->
                                <input type="text" id="message" name="message" class="form-control" placeholder="Type message...">
                                <div class="input-group-append">
                                    <input type="submit" class="submit" name="submit" value="&#xf1d8;">
                                    <!-- <button type="submit" name="send">submit</button> -->
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
    </div>

    <?php 
            }
        }
    ?>

    <script src="JS/chatnoreload.js"></script>
    <!-- <script type="text/javascript" src="JS/noreload.js"></script> -->