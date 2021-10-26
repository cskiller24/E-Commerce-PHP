<?php
    if(isset($_GET['pid'])){
        $product_id = $_GET['pid'];

        include("../../dbconnection.php");
        include("../../functions/buyer/view.fx.php");

        $_SESSION['view'] = getProductDetails($conn, $product_id);

    }