<?php 
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        include("../../dbconnection.php");
        include("../../functions/admin/login.fx.php");

        if(!isset($username) || !isset($password)){
            header("Location: ../../view/admin/login.php?err=empty");
        }
        $login = login($conn, $username, $password);

        if($login == false){
            header("Location: ../../view/admin/login.php?err=password");
            exit();
        }
        
    }
    else(header("Location: ../../view/admin/login.php?err=err"));