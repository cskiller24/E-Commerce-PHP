<?php
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "e-commerce-php");


    $conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if(!$conn){
        echo "Failed to connect to MySQL Database:". mysqli_connect_error();
        die;
    }

?>