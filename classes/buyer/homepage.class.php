<?php
    include("../../dbconnection.php");
    include("../../functions/buyer/homepage.fx.php");

    //**ADD TO CART FUNCTION OF HOMEPAGE */
    if(isset($_GET['cart']) && isset($_GET['sid']) && isset($_GET['bid'])){
        $buyer_id = $_GET['bid'];
        $product_id = $_GET['cart'];
        $seller_id = $_GET['sid'];
        
        $result = addToCart($conn, $buyer_id, $product_id, $seller_id);
        if($result == true){
            header("Location: ../../view/buyer/homepage.php?cart=success");
            exit();
        }
        else{
            header("Location: ../../view/buyer/homepage.php?cart=failed");
            exit();
        }
    }
    
    //**DISPLAY ALL THE DETAILS AND PAGINATION */
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $results_per_page = 6;
        
        $_SESSION['products'] = getProductsPerPage($conn, $page, $results_per_page);

        $number_of_products = getListOfProducts($conn);
        $_SESSION['pagination'] =  ceil($number_of_products/$results_per_page);
    }