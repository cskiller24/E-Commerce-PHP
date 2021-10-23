<?php
    
if(isset($_POST['submit'])){
    session_start();
    $seller_id = $_SESSION['seller_id'];
    $product_name = $_POST['product_name'];
    $temp_image = $_FILES['product_image']['name'];
    $error = $_FILES['product_image']['error'];
    $details = $_POST['details'];
    $price = $_POST['price'];

    //Image configuration
    $temp_location = $_FILES['product_image']['tmp_name'];
    $ext = explode(".",$temp_image);
    $ext = strtolower(end($ext));
    $allowed_file_ext = array("jpg", "jpeg", "png");
    
    //**ERROR TRAPPING */
    if(
        !isset($product_name) ||
        !isset($temp_image) ||
        !isset($details)||
        !isset($price)
    ){
        header("Location: ../../view/seller/add-product.php?err=emp");
        exit();
    }

    if($error != 0){
        header("Location: ../../view/seller/add-product.php?err=err");
        exit();
    }
    if(!in_array($ext, $allowed_file_ext)){
        header("Location: ../../view/seller/add-product.php?err=ext");
        exit();
    }
    if(!is_numeric($price)){
        header("Location: ../../view/seller/add-product.php?err=price");
        exit();
    }

    include("../../dbconnection.php");
    include("../../functions/seller/add-product.fx.php");

    $product_image = uniqid().".".$ext;

    if($register = registerProduct($conn, $seller_id, $product_name, $product_image, $details, $price, $temp_location)){
        header("Location: ../../view/seller/add-product.php?success=1");
        exit();
    }
}
else{
    header("Location: ../../view/seller/add-product.php?err=err");
}