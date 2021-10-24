<?php
    if(isset($_POST['submit'])){
        $product_id = $_POST['product_id'];
        $seller_id = $_POST['seller_id'];
        $password = $_POST['password'];
        $image = $_POST['image'];

        include("../../dbconnection.php");
        include("../../functions/seller/delete.fx.php");
        
        $result = deleteProduct($conn, $product_id, $seller_id, $password, $image);

        if($result == "seller"){
            header("Location: ../../view/seller/homepage.php?delete=seller");
            exit();
        }
        if($result == "password"){
            header("Location: ../../view/seller/homepage.php?delete=password");
            exit();
        }
        if($result == "success"){
            header("Location: ../../view/seller/homepage.php?delete=success");
            exit();
        }
    }
    else{
        header("Location: ../../view/seller/homepage.php?delete=err");
        exit();
    }
