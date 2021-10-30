<?php
    include("../../dbconnection.php");
    include("../../functions/admin/homepage.fx.php");

    //**GET ALL THE SELLERS */
    $result_buyer = getListofBuyers($conn);
    $result_seller = getListofSellers($conn);
    $hashed_password = getAdminPassword($conn);


    if(isset($_POST['buyer_submit'])){
        $seller_id = $_POST['buyer_id'];
        $password = $_POST['adminPassword'];

        $verify = password_verify($password, $hashed_password['admin_password']);

        if($verify){
            $result = deleteSeller($conn, $seller_id);
            if($result){
                header("Location: ../../view/admin/homepage.php?delete=success&view=seller");
                exit();
            }
            else{
                header("Location: ../../view/admin/homepage.php?delete=failed&view=seller");
                exit();
            }
        }
        else{
            header("Location: ../../view/admin/homepage.php?password=failed&view=seller");
                exit();
        }
    }
    if(isset($_POST['seller_submit'])){
        $seller_id = $_POST['buyer_id'];
        $password = $_POST['adminPassword'];

        $verify = password_verify($password, $hashed_password['admin_password']);

        if($verify){
            $result = deleteSeller($conn, $seller_id);
            if($result){
                header("Location: ../../view/admin/homepage.php?delete=success&view=seller");
                exit();
            }
            else{
                header("Location: ../../view/admin/homepage.php?delete=failed&view=seller");
                exit();
            }
        }
        else{
            header("Location: ../../view/admin/homepage.php?password=failed&view=seller");
                exit();
        }
    }