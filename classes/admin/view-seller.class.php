<?php
    if(isset($_GET['sid'])){
        $seller_id = $_GET['sid'];
        
        include("../../dbconnection.php");
        include("../../functions/admin/view.fx.php");

        $result = getSellerDetails($conn, $seller_id);
    }   
    else{
        $result = false;
    }

    if(isset($_POST['submit'])){
        
        include("../../functions/admin/homepage.fx.php");
        include("../../functions/admin/delete.fx.php");
        
        $seller_id = $_POST['seller_id'];
        $password = $_POST['password'];
        $hashed_password = getAdminPassword($conn);

        $verify = password_verify($password, $hashed_password['admin_password']);

        if($verify){
            $delete = deleteSeller($conn, $seller_id);
            if($delete){
                header("Location: ../../view/admin/homepage.php?delete=success&view=none");
                exit();
            }
            else{
                header("Location: ../../view/admin/homepage.php?delete=failed&view=none");
                exit();
            }
        }
        else{
            header("Location: ../../view/admin/view-seller.php?sid={$seller_id}&password=invalid");
            exit();
        }
    }