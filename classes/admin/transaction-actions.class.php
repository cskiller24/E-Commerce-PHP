<?php 
    //**SHIP */
    include("../../dbconnection.php");
    include("../../functions/admin/transactions.fx.php");
    if(isset($_GET['pid']) && isset($_GET['sid']) && isset($_GET['bid']) && isset($_GET['action']) && $_GET['action']== "ship"){
        $product_id = $_GET['pid'];
        $buyer_id = $_GET['bid'];
        $seller_id = $_GET['sid'];

        $result = shipItem($conn, $seller_id, $buyer_id, $product_id);
        if($result){
            header("Location: ../../view/admin/transactions.php?ship=success");
            exit();
        }
        else{
            header("Location: ../../view/admin/transactions.php?ship=failed");
            exit();
        }
    }
    //**DELIVER */
    if(isset($_GET['pid']) && isset($_GET['sid']) && isset($_GET['bid']) && isset($_GET['action']) && $_GET['action']== "deliver"){
        $product_id = $_GET['pid'];
        $buyer_id = $_GET['bid'];
        $seller_id = $_GET['sid'];
        $result = deliverItem($conn, $seller_id, $buyer_id, $product_id);
        if($result){
            header("Location: ../../view/admin/transactions.php?deliver=success");
            exit();
        }
        else{
            header("Location: ../../view/admin/transactions.php?deliver=failed");
            exit();
        }
    }