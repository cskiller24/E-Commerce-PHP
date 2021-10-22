<?php
    if(isset($_SESSION)){
        unset($_SESSION);
    }
    header("Location: login_register.php");