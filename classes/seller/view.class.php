<?php 
    if(isset($_GET['pid'])){
        $product_id = $_GET['pid'];
        
        include("../../dbconnection.php");
        include("../../functions/seller/view.fx.php");

        $_SESSION['view'] = getProductDetails($conn, $product_id);
    }
    else{
        $_SESSION['view'] = false;
    }