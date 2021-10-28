<?php 
    $buyer_id = $_SESSION['buyer_id'];

    include("../../dbconnection.php");
    include("../../functions/buyer/settings.fx.php");

    $buyer_details = getBuyerDetails($conn, $buyer_id);