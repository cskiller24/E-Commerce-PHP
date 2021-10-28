<?php 
    include("../../dbconnection.php");
    include("../../functions/buyer/settings.fx.php");

    if(isset($_POST['change_details'])){
        $buyer_id = $_POST['buyer_id'];
        $hashed_password = $_POST['hashed_password'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $contact_number = $_POST['contact_number'];

        $verify = password_verify($password, $hashed_password);

        //**ERROR TRAPPING */
        if(!$verify){
            header("Location: ../../view/buyer/settings.php?password=currentpassword");
            exit();
        }
        if($verify){
            $result = changeBuyerDetails($conn, $buyer_id, $email, $contact_number);
            if($result){
                header("Location: ../../view/buyer/settings.php?details=success");
                exit();
            }
            else{
                header("Location: ../../view/buyer/settings.php?details=failed");
                exit();
            }
        }

    }

    //**CHANGE PASSWORD */
    if(isset($_POST['change_password'])){
        $buyer_id = $_POST['buyer_id'];
        $password = $_POST['password'];
        $hashed_password = $_POST['hashed_password'];
        $new_password = $_POST['newPassword'];
        $new_password_confirm = $_POST['newPasswordConfirm'];

        $verify = password_verify($password, $hashed_password);

        //**ERROR TRAPPING */
        if($new_password != $new_password_confirm){
            header("Location: ../../view/buyer/settings.php?password=password");
            exit();
        }
        if(!$verify){
            header("Location: ../../view/buyer/settings.php?password=currentpassword");
            exit();
        }

        if($new_password == $new_password_confirm && $verify){
            $result = changeBuyerPassword($conn, $buyer_id, $new_password);
            if($result){
                header("Location: ../../view/buyer/settings.php?password=success");
                exit();
            }
            else{
                header("Location: ../../view/buyer/settings.php?password=failed");
                exit();
            }
        }
    }