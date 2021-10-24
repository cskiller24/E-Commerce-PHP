<?php
    if(isset($_POST['submit'])){
        $name = $_POST['product_name'];
        $details = $_POST['details'];
        $price = $_POST['price'];
        
        $product_id = $_POST['id'];

        include("../../dbconnection.php");
        include("../../functions/seller/edit-product.fx.php");

        //**ERROR TRAPPING */
        if($name == ''||$details == ''||$price == ''){
            header("Location: ../../view/seller/homepage.php?edit=emp");
            exit();
        }
        if(!is_numeric($price)){
            header("Location: ../../view/seller/homepage.php?edit=price");
            exit();
        }
        
        //**EDIT PRODUCT WITH SAME IMAGE */
        if($_FILES['product_image']['error'] == 4){
            $result = editProductNoPicture($conn, $product_id, $name, $details, $price);
            if($result){
                header("Location: ../../view/seller/homepage.php?edit=successN");
                exit();
            }
            else{
                header("Location: ../../view/seller/homepage.php?edit=failedN");
                exit();
            }
        }
        //**EDIT PRODUCT WITH NEW IMAGE */
        else{
            $current_image = $_POST['current_image'];

            $temp_location = $_FILES['product_image']['tmp_name'];
            $temp_image = $_FILES['product_image']['name'];
            $ext = explode(".",$temp_image);
            $ext = strtolower(end($ext));
            $allowed_file_ext = array("jpg", "jpeg", "png");
            if(!in_array($ext, $allowed_file_ext)){
                header("Location: ../../view/seller/homepage.php?edit=ext");
                exit();
            }
            else{
                $new_image = uniqid().$ext;
                $result = editProductWithPicture($conn, $product_id, $name, $details, $price, $current_image, $new_image, $temp_location);
                if($result){
                    header("Location: ../../view/seller/homepage.php?edit=successW");
                    exit();
                }
                else{
                    header("Location: ../../view/seller/homepage.php?edit=successW");
                    exit();
                }
            }
        }
    }
    else $_SESSION['edit'] = false; exit();