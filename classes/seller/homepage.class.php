<?php 
    include("../../dbconnection.php");
    include("../../functions/seller/homepage.fx.php");  

    $seller_id = $_SESSION['seller_id'];

    $_SESSION['product_seller'] = getProductSeller($conn, $seller_id);
    
