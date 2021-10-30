<?php 
    if(isset($_GET['pid']) && isset($_GET['bid']) && isset($_GET['sid']) && isset($_GET['action'])){
        $seller_id = $_GET['sid'];
        $buyer_id = $_GET['bid'];
        $product_id = $_GET['pid'];
        var_dump($seller_id, $buyer_id, $product_id);

        //**ADDING INCLUDES */
        include("../../dbconnection.php");
        include("../../functions/buyer/transactions.fx.php");

        if($_GET['action'] == "cancel"){
            $result = transactionCancelItem($conn, $seller_id, $buyer_id, $product_id);
            if($result){
                header("Location: ../../view/buyer/transaction.php?status=cancelS");
                exit();
            }
            else{
                header("Location: ../../view/buyer/transaction.php?status=cancelF");
                exit();
            }
        }
        else{
            header("Location: ../../view/buyer/transaction.php?e=err");
        }
    }