<?php
    session_start();

    if(isset($_SESSION)){
        unset($_SESSION);
    }
    session_destroy();
    header("Location: login_register.php");
