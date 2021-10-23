<?php
    require("dbconnection.php");

    if($conn){
        header("Location: view/buyer/login_register.php");
    }
    else(mysqli_connect_error());