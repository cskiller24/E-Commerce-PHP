<?php 

if(isset($_POST['Lsubmit'])){
    $email = $_POST['Lemail'];
    $password = $_POST['Lpassword'];

    include("../../dbconnection.php");
    include("../../functions/seller/login_register.fx.php");

    //**ERROR TRAPPING */
    if(!isset($email) || !isset($password)){
        header("Location: ../../view/seller/login_register.php?err=empL");
        exit();
    }

    $login = login($conn,$email,$password);
    
    if($login === false){
        header("Location: ../../view/seller/login_register.php?err=invalid");
        exit();
    }
}
else{
    header("Location: ../../view/seller/login_register.php?err=empL");
    exit();
}