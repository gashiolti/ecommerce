<?php


    include_once 'includes/templates/adminheader.php';
    include_once 'includes/templates/adminnav.php';

    if(isset($_SESSION['user']) && isset($_SESSION['role'])) {
        if($_SESSION['role'] == 1) {

?>

<?php

    switch(@_GET['page']) {
        case 'category';
            include 'category.php';
            break;
        case 'chat';
            include 'chat.php';
            break;
        case 'company';
            include 'company.php';
            break;
        case 'favouritelist';
            include 'favouritelist.php';
            break;
        case 'order';
            include 'ordertable.php';
            break;
        case 'orderdetails';
            include 'orderdetails.php';
            break;
        case 'payment';
            include 'payment.php';
            break;
        case 'personalinfo';
            include 'personalinfo.php';
            break;
        case 'product';
            include 'producttable.php';
            break;
        case 'productimages';
            include 'productimages.php';
            break;
        case 'role';
            include 'role.php';
            break;
        case 'shoppingcart';
            include 'shoppingcart.php';
            break;
        case 'tracking';
            include 'trackingtable.php';
            break;
        case 'users';
            include 'users.php';
            break;
        default:
            include 'users.php';
            break;
    }

    include_once 'includes/templates/adminfooter.php';

?>

    <!-- <main>
        <div class="title">
            <h2><i class="fa fa-users"></i> Users</h2>


            <a href=""><i class="fas fa-plus"></i> Add Product</a>
        </div>
        <div class="table">
            <table class="tableInfo">
                <tr>
                    <th>Email</th>
                    <th>Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>filan@gmail.com</td>
                    <td>filan123</td>
                    <td>Filan</td>
                    <td>Fisteku</td>
                    <td>1</td>
                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                    <td><a href=""><i class="fas fa-trash"></i></a></td>
                </tr>
            </table>
        </div>
    </main> 
     -->
</body>
</html>

<?php 

    }
} else {
    header("login.php");
    exit();
}