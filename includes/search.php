<?php

// require_once 'templates/nav.php';

    if(isset($_POST['searchData']))
    {
        // require_once 'dbh.inc.php';

        echo $_POST['search'];

        // $search = mysqli_real_escape_string($conn, $_POST['search']);
        // $sql = "SELECT product_name FROM product WHERE product_name LIKE '%$search%' OR category_name LIKE '%$search%' OR company_name LIKE '%$search%';";

        // $result = mysqli_query($conn, $sql);
        // $queryRes = mysqli_num_rows($result);

        // if($queryRes > 0) {

        //     echo 
        //     "<div class='products-wrapper'>
        //         <?php
        //             $result = searchProduct($conn);
                    
        //         
        //     </div>"; -->
        
    } else {
            header("location: ../index.php?error=noresultmatchingyoursearch");
            exit();
        }



// require_once 'templates/footer.php';