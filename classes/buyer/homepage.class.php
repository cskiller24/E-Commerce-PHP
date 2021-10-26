<?php
    include("../../dbconnection.php");
    include("../../functions/buyer/homepage.fx.php");
    
    //**DISPLAY ALL THE DETAILS AND PAGINATION */
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $results_per_page = 6;
        
        $_SESSION['products'] = getProductsPerPage($conn, $page, $results_per_page);

        $number_of_products = getListOfProducts($conn);
        $_SESSION['pagination'] =  ceil($number_of_products/$results_per_page);
    }