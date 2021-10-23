<?php 
    function registerProduct($conn, $seller_id, $product_name, $product_image, $details, $price, $temp_location){
        $product_id = uniqid();
        $image = "../product-image/".$product_image;
        $params = "INSERT INTO product (product_id, product_name, product_detail, seller_id, price, image) VALUES ('$product_id', '$product_name', '$details', '$seller_id', '$price', '$image')";
        $query = mysqli_query($conn, $params);
        if($query){
            $destination = "../../view/product-image/".$product_image;
            move_uploaded_file($temp_location, $destination);
        }
        return $query;
        exit();
    }