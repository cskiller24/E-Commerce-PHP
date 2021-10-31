<?php
    include("../../dbconnection.php");
    if(isset($_GET['bid'])){
        $buyer_id = $_GET['bid'];
        
        include("../../functions/admin/view.fx.php");

        $result = getBuyerDetails($conn, $buyer_id);
    }   
    else{
        $result = false;
    }

    if(isset($_POST['submit'])){
        
        include("../../functions/admin/homepage.fx.php");
        include("../../functions/admin/delete.fx.php");
        
        $buyer_id = $_POST['buyer_id'];
        $password = $_POST['password'];
        $hashed_password = getAdminPassword($conn);

        $verify = password_verify($password, $hashed_password['admin_password']);

        if($verify){
            $delete = deleteBuyer($conn, $buyer_id);
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
            header("Location: ../../view/admin/view-buyer.php?bid={$buyer_id}&password=invalid");
            exit();
        }
    }