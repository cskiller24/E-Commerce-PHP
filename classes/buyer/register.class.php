<?php

if(isset($_POST['Rsubmit'])){
    $name = $_POST['Rfullname'];
    $email = $_POST['Remail'];
    $contact_number = $_POST['Rcontact_number'];
    $password = $_POST['Rpassword'];
    $confirm_password = $_POST['Rconfirm_password'];
    
    include("../../dbconnection.php");
    include("../../functions/buyer/login_register.fx.php");
    
    //**ERROR TRAPPING */
    if(
        !isset($name) ||
        !isset($email) ||
        !isset($contact_number) ||
        !isset($password) ||
        !isset($confirm_password)
    ){
        header("Location: ../../view/buyer/login_register.php?err=empR");
        exit();
    }
    
    if($checkEmail = checkEmail($conn, $email)){
        header("Location: ../../view/buyer/login_register.php?err=email");
        exit();
    }

    if($password != $confirm_password){
        header("Location: ../../view/buyer/login_register.php?err=password");
        exit();
    }

    if($register = register($conn,$name,$email,$contact_number, $password)){
        header("Location: ../../view/buyer/login_register.php?err=success");
        exit();
    }
    
}
else{
    header("Location: ../../view/buyer/login_register.php?err=err");
    exit();
}