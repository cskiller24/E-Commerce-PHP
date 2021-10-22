<?php
session_start();
include "dbconnection.php";
include "functions.php";

$admin_data = checkLoginAdmin($conn);

$toSql = "SELECT * FROM sellers";

$result = mysqli_query($conn, $toSql);
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
    <?php while ($seller = mysqli_fetch_assoc($result)) { ?>
        <div class="container">
            <p>Seller Name: <?php echo $seller["seller_name"]; ?></p>
            <p>Email: <?php echo $seller["seller_email"]; ?> </p>
            <p>Registered Date: <?php echo $seller["registered_date"]; ?> </p>

            <a href="delete_seller.php?id=<?php echo $seller["seller_id" ]; ?>">Delete Seller</a>
        </div> 
    <?php } ?>
    <a href="logout_admin.php">Logout</a>
</body>
</html>