<?php 

if(isset($_POST['submit'])){
    $email = $_POST['Lemail'];
    $password = $_POST['Lpassword'];

    include("../../dbconnection.php");
    include("../../functions/buyer/login_register.fx.php");

    //**ERROR TRAPPING */
    if(!isset($email) || !isset($password)){
        header("Location: ../../view/buyer/login_register.php?err=emp");
        exit();
    }

    $login = login($conn,$email,$password);
    
    if($login === false){
        header("Location: ../../view/buyer/login_register.php?err=invalid");
        exit();
    } 
}
else{
    header("Location: ../../view/buyer/login_register.php?err=emp");
    exit();
}