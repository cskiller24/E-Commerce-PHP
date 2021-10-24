<?php
    //**EDIT PRODUCT CHANGING THE PICTURE */
    function editProductWithPicture($conn, $product_id, $name, $details, $price, $current_image, $new_image, $temp_location){
        $path = "../product-image/".$new_image;
        $params = "UPDATE product SET product_name = '$name', product_detail = '$details', price = '$price', image = '$path' WHERE product_id = '$product_id'";
        $query = mysqli_query($conn, $params);
        if($query){
            $destination = "../../view/product-image/".$new_image;
            move_uploaded_file($temp_location, $destination);

            $old_path = "../../view/seller/".$current_image;
            unlink($old_path);

            return true; 
            exit();
        }
        else {
            return false; 
            exit();
        }

    }

    function editProductNoPicture($conn, $product_id, $name, $details, $price){
        $params = "UPDATE product SET product_name = '$name', product_detail = '$details', price = '$price' WHERE product_id = '$product_id'";
        $query = mysqli_query($conn, $params);
        if($query){
            return true; 
            exit();
        }
        else{
            return false; 
            exit();
        }

    }