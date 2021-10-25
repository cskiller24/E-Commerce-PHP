<?php
    
    include("../../dbconnection.php");
    include("../../functions/seller/settings.fx.php");

    $_SESSION['seller_info'] = getSellerDetails($conn, $_SESSION['seller_id']);
    
    //**IF THE USER CHANGE THEIR DETAILS */
    if(isset($_POST['change_details'])){
        $email = $_POST['email'];
        $seller_id = $_POST['seller_id'];
        $contact_number = $_POST['contact_number'];
        $password = $_POST['password'];
        $current_password = $_POST['current_password'];

        $result = changeSellerDetails($conn, $seller_id, $email, $contact_number, $password, $current_password);

        if($result == "seller"){
            header("Location: ../../view/seller/settings.php?edit=seller");
            exit();
        }
        if($result == "password"){
            header("Location: ../../view/seller/settings.php?edit=password");

            exit();
        }
        if($result == true){
            header("Location: ../../view/seller/settings.php?edit=success");

            exit();
        }
        if($result == false){
            header("Location: ../../view/seller/settings.php?edit=failed");
            exit();     
        }
        
    }

    //**IF THE USER CHANGE THEIR PASSWORD */
    if(isset($_POST['change_password'])){
        $current_password = $_POST['password'];
        $new_password = $_POST['new_password'];
        $new_passwordConfirm = $_POST['new_passwordConfirm'];
        $seller_id = $_POST['seller_id'];
        $hashed_password = $_POST['hashed_password'];

        //**ERROR TRAPPING */

        if($new_password != $new_passwordConfirm){
            header("Location: ../../view/seller/settings.php?edit=passwordconfirm");
            exit();
        }
        
        $result = changeSellerPassword($conn, $seller_id, $current_password, $hashed_password, $new_password);

        if($result == "current_password"){
            header("Location: ../../view/seller/settings.php?edit=password");
        }
        if($result){
            header("Location: ../../view/seller/settings.php?edit=success");
        }
        if(!$result){
            header("Location: ../../view/seller/settings.php?edit=failed");
        }
    }
