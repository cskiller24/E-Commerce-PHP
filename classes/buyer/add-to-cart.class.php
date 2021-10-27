<?php 
    if(isset($_POST['add-to-cart-view'])){
        $product_id = $_POST['product_id'];
        $seller_id = $_POST['seller_id'];
        $buyer_id = $_POST['buyer_id'];

        include("../../dbconnection.php");
        include("../../functions/buyer/add-to-cart.fx.php");

        $result = addToCart($conn, $buyer_id, $product_id, $seller_id);

        if($result){
            header("Location: ../../view/buyer/view.php?pid={$product_id}&cart=success");
            exit();
        }
        else{
            header("Location: ../../view/buyer/view.php?pid={$product_id}&cart=failed");
            exit();
        }
    }

    if(isset($_POST['add-to-cart-homepage'])){
        $product_id = $_POST['product_id'];
        $seller_id = $_POST['seller_id'];
        $buyer_id = $_POST['buyer_id'];
        $page = $_POST['page'];

        include("../../dbconnection.php");
        include("../../functions/buyer/add-to-cart.fx.php");

        $result = addToCart($conn, $buyer_id, $product_id, $seller_id);

        
        if($result){
            header("Location: ../../view/buyer/homepage.php?page=$page&cart=success");
            exit();
        }
        else{
            header("Location: ../../view/buyer/homepage.php?pid=$page&cart=failed");
            exit();
        }
    }
?>