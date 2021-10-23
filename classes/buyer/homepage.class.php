<?php
    include("../../dbconnection.php");
    include("../../functions/buyer/homepage.fx.php");

    $results_per_page = 6;
    
    $page = $_GET['page'];

    $_SESSION['products'] = paginationProduct($conn, $page, $results_per_page);