<?php
session_start();
include "dbconnection.php";
include "functions.php";
include "cart_functions.php";

$buyer_data = checkloginBuyer($conn);

$toSql = "SELECT * FROM product";

$result = mysqli_query($conn, $toSql);

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])){
        $id = $_POST['id'];
        $cart = addToCart($conn, $id, $buyer_data['buyer_id']);

        if($cart == "SUCCESS"){
            echo"SUCCESS";
        }
    }   
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
            <a href="view_product.php?id=<?php echo($product["product_id"]);?>">View</a>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo($product['product_id']); ?>">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    <?php } ?>    
    <a href="logout_buyer.php">Logout</a>
    <a href="cart_buyer.php">Cart</a>
    <a href="transaction_buyer.php">Transactions</a>
</body>
</html>