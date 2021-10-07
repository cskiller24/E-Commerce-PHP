<?php
session_start();
include "dbconnection.php";
include "functions.php";

$buyer_data = checkloginBuyer($conn);

$toSql = "SELECT * FROM product";

$result = mysqli_query($conn, $toSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Home</title>
</head>
<body>
    <?php while ($product = mysqli_fetch_assoc($result)){ ?>
        <div class="container">
            <p> <?php echo($product["product_name"]);?></p>
            <img src="<?php echo($product["image"]);?>">
            <p>PHP: <?php echo($product["price"]);?></p>
            <a href="product_details.php?id=<?php echo($product["product_id"]);?>">View</a>
            <a href="#">addtocart</a>
        </div>
    <?php } ?>    
    <a href="logout_buyer.php">Logout</a>
</body>
</html>