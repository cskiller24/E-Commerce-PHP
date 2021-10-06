<?php 
session_start();
    include("dbconnection.php");
    include("functions.php");
    $buyer_data = checkloginBuyer($conn);

    var_dump($buyer_data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout_buyer.php">Logout</a>
</body>
</html>