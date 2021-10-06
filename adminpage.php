<?php
session_start();
    include("dbconnection.php");
    include("functions.php");

    $admin_data = checkLoginAdmin($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Admin Page</title>
</head>
<body>
    <a href="logout_admin.php">Logout</a>
</body>
</html>