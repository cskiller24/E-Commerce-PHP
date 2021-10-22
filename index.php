<?php
    require("dbconnection.php");

    if (!$conn) {
        echo "Failed to connect to MySQL Database:" . mysqli_connect_error();
        die();
    }
    else header("Location: view/buyer/homepage.php");