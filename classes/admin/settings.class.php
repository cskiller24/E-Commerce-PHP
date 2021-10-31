<?php
    if(isset($_POST['submit'])){
        include("../../dbconnection.php");
        include("../../functions/admin/settings.fx.php");
        include("../../functions/admin/homepage.fx.php");

        $hashed_password = getAdminPassword($conn);
        $password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $new_password_confirm = $_POST['new_password_confirm'];

        $verify = password_verify($password, $hashed_password['admin_password']);

        if($verify && $new_password == $new_password_confirm){
            $result = changeAdminPassword($conn, $new_password);
            if($result){
                header("Location: ../../view/admin/settings.php?password=success");
                exit();
            }
            else{
                header("Location: ../../view/admin/settings.php?password=failed");
                exit();
            }
        }
        else{
            header("Location: ../../view/admin/settings.php?password=invalid");
            exit();
        }
    }